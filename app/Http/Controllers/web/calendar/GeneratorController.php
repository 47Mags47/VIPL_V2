<?php

namespace App\Http\Controllers\web\calendar;

use App\Http\Controllers\Controller;
use App\Models\Glossary\CalendarGeneratorCalculation;
use App\Models\Main\CalendarGenerator;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function index(){
        $rules = CalendarGenerator::all();
        $create_dialog = $this->create();
        return view('pages.calendar.generator.index', compact('rules', 'create_dialog'));
    }

    public function create(){
        $calculations = CalendarGeneratorCalculation::all();
        return view('pages.calendar.generator.create', compact('calculations'));
    }
}
