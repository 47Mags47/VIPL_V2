<?php

namespace App\Http\Controllers\web\package;

use App\Http\Controllers\Controller;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(CalendarEvent $event)
    {
        $packages = $event->packages()->search()->sort()->paginate(100);
        return view('pages.payment.package.index', compact('packages'));
    }

    public function show(Request $request, Package $package){
        return $request->user()->can('package-view', $package)
            ? redirect()->route('payment.file.index', compact('package'))
            : back()->with('sys_error', 'Доступ заблокирован');
    }
}
