<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request, CalendarEvent $event){
        $packages = $event->packages;

        return view('pages.payment.package.index', compact('packages', 'event'));
    }
}
