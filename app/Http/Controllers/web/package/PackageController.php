<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Package;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function check(CalendarEvent $event)
    {
        return Auth::user()->isAdministration()
            ? redirect()->route('payment.package.index', compact('event'))
            : redirect()->route('payment.file.index', [
                'package' => Package::firstOrCreate([
                    'event_id' => $event->id,
                    'division_code' => Auth::user()->division_code
                ], [
                    'status_code' => 'created'
                ])
            ]);
    }

    public function index(CalendarEvent $event)
    {
        $packages = $event->packages()->search()->sort()->paginate(100);
        return view('pages.payment.package.index', compact('packages'));
    }
}
