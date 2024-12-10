@extends('layouts.auth')
@section('page-name', 'Вход')

@section('content')
    <x-form.box method="POST" header="Вход" sbm="Войти" center>
        <x-input.input name="email" label="Логин" />
        <x-input.input name="password" label="Пароль" type="password" />
    </x-form.box>
@endsection
