@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-form.box sbm="Загрузить" :action="route('payment.file.store', ['package' => session()->get('package')])" center file>
        <x-input.select name="bank_code" label="Банк">
            @foreach ($banks as $bank)
                <x-input.option :value="$bank->code" :title="$bank->code . ' - ' . $bank->name" p-name="bank_code" />
            @endforeach
        </x-input.select>
        <x-input.input name="file" type="file" label="Файл" />
    </x-form.box>
@endsection
