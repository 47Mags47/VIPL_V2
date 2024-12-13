<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Package;
use App\Models\Main\PackageFile;
use App\Models\Main\Raport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RaportController extends Controller
{
    public function index()
    {
        $raports = Raport::all();
        return view('pages.raport.index', compact('raports'));
    }

    public function download(Raport $raport)
    {
        return Storage::disk('raports')->download($raport->path . '/' . $raport->name);
    }

    public function file(PackageFile $file)
    {
        $raport = $file->write();
        return $raport !== false
            ? Storage::disk('raports')->download($raport->path . '/' . $raport->name)
            : back()->with('errors', 'Произошла ошибка при формировании отчета');
    }

    public function package(Request $request, Package $package)
    {
        // $files = [];
        // foreach ($package->files as $file) {
        //     $files[] = XMLWriter::write($file);
        // }

        // $zip_name = $package->event->payment_code . '_' . $package->division_code . '.zip';
        // $zip_path = $package->event->payment_code . '/' . $package->division_code;

        // ZIPWriter::write($files, $zip_name, $zip_path);

        // Raport::create([
        //     'name' => $zip_name,
        //     'path' => $zip_path,
        // ]);

        // return Storage::disk('raports')->download($zip_path . '/' . $zip_name, $zip_name);
    }

    public function event(Request $request, CalendarEvent $event)
    {
        // $files = [];
        // foreach ($event->packages as $package) {
        //     foreach ($package->files as $file) {
        //         if($file->bank->contract == null) continue;
        //         $files[] = XMLWriter::write($file);
        //     }
        // }

        // $zip_name = $event->payment_code . '.zip';
        // $zip_path = $event->payment_code;

        // ZIPWriter::write($files, $zip_name, $zip_path);
        // Raport::create([
        //     'name' => $zip_name,
        //     'path' => $zip_path,
        // ]);

        // return Storage::disk('raports')->download($zip_path . '/' . $zip_name, $zip_name);
    }
}
