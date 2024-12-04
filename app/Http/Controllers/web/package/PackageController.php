<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function index(Request $request, CalendarEvent $event){
        $packages = $event->packages()->search($request->search)->sort($request)->paginate(100);
        return view('pages.payment.package.index', [
            'event' => $event,
            'search' => $request->search ?? '',
            'packages' => $packages,
        ]);
    }
}
