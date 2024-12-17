<?php

namespace App\Http\Controllers\web;

use App\Core\Writer\Base\ZIP;
use App\Http\Controllers\Controller;
use App\Models\Glossary\Bank;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Raport;
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

    public function event(CalendarEvent $event)
    {
        $bank_codes = CalendarEvent::select('bank.*')
            ->whereKey($event->id)
            ->joinRelation('packages.files.bank as bank')
            ->groupBy('bank.code')
            ->get()
            ->pluck('code');

        $raport_paths = $bank_codes->map(function ($code) use ($event) {
            $bank = Bank::whereKey($code)->first();
            $data = $event->files()->where('bank_code', $code)->get()->map(function ($file) {
                return $file->data;
            })->collapse();

            $raport = $bank->writeRaport($event, $data);
            return $raport->localPath();
        })->toArray();

        $zip_path = Storage::disk('raports')->path($event->date->format('Y-m-d')) . '.zip';
        ZIP::make($zip_path, $raport_paths, 'raports');

        return Storage::disk('raports')->download($event->date->format('Y-m-d') . '.zip');
    }
}
