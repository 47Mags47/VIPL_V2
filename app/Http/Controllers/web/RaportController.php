<?php

namespace App\Http\Controllers\web;

use App\Core\Writers\XMLWriter;
use App\Core\Writers\ZIPWriter;
use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Package;
use App\Models\Main\PackageFile;
use App\Models\Main\Raport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RaportController extends Controller
{
    public function index(){
        $raports = Raport::all();
        return view('pages.raport.index', compact('raports'));
    }

    public function download(Request $request, Raport $raport){
        return Storage::disk('raports')->download($raport->path);
    }

    public function file(Request $request, PackageFile $file){
        $xml_path = XMLWriter::write($file);
        $xml_name = $file->package->event->payment_code . '_' . $file->package->division_code . '_' . $file->bank_code . '.xml';

        Raport::create([
            'name' => $xml_path,
            'path' => $xml_name,
        ]);

        return Storage::disk('raports')->download($xml_path, $xml_name);
    }

    public function package(Request $request, Package $package){
        $files = [];
        foreach ($package->files as $file) {
            $files[] = XMLWriter::write($file);
        }

        $zip_name = $package->event->payment_code . '_' . $package->division_code . '.zip';
        $zip_path = $package->event->payment_code . '/' . $package->division_code;

        ZIPWriter::write($files, $zip_name, $zip_path);

        Raport::create([
            'name' => $zip_name,
            'path' => $zip_path,
        ]);

        return Storage::disk('raports')->download($zip_path . '/' . $zip_name, $zip_name);
    }

    public function event(Request $request, CalendarEvent $event){
        $files = [];
        foreach ($event->packages as $package) {
            foreach ($package->files as $file) {
                if($file->bank->contract == null) continue;
                $files[] = XMLWriter::write($file);
            }
        }

        $zip_name = $event->payment_code . '.zip';
        $zip_path = $event->payment_code;

        ZIPWriter::write($files, $zip_name, $zip_path);
        Raport::create([
            'name' => $zip_name,
            'path' => $zip_path,
        ]);

        return Storage::disk('raports')->download($zip_path . '/' . $zip_name, $zip_name);
    }

}
