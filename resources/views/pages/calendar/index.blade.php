@extends('layouts.web')
@section('page-name', 'Календарь')

@section('content')
    <x-calenar.box :$weeks />
@endsection
