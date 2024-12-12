@extends('layouts.web')
@section('page-name', 'Выплаты')

@section('content')
    <x-form.box :action="route('payment.file.store', array_merge(compact('package'), ['file' => request()->file]))" sbm="Отправить" class="form-table">
        <x-table.box>
            <x-slot:thead>
                <x-table.row>
                    <x-table.hcell title="№ п/п" w=50 rowspan=2 />
                    <x-table.hcell title="Столбец 1" />
                    <x-table.hcell title="Столбец 2" />
                    <x-table.hcell title="Столбец 3" />
                    <x-table.hcell title="Столбец 4" />
                    <x-table.hcell title="Столбец 5" />
                    <x-table.hcell title="Столбец 6" />
                    <x-table.hcell title="Столбец 7" />
                    <x-table.hcell title="Столбец 8" />
                    <x-table.hcell title="Столбец 9" />
                </x-table.row>
                <x-table.row>
                    <x-table.hcell>
                        <x-input.select name="column[1]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="first_name" p-name="column[1]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[2]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="last_name" p-name="column[2]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[3]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="middle_name"
                                    p-name="column[3]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[4]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="account" p-name="column[4]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[5]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="summ" p-name="column[5]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[6]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="pasp" p-name="column[6]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[7]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="birth" p-name="column[7]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[8]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="kbk" p-name="column[8]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                    <x-table.hcell>
                        <x-input.select name="column[9]">
                            @foreach ($columns as $column)
                                <x-input.option :title="$column->name" :value="$column->code" select="snils" p-name="column[9]" />
                            @endforeach
                        </x-input.select>
                    </x-table.hcell>
                </x-table.row>
            </x-slot:thead>
            <x-slot:tbody>
                @foreach ($reader->getPreviewData() as $row)
                    <x-table.row>
                        @foreach ($row as $item)
                            <x-table.cell :title="$item" />
                        @endforeach
                    </x-table.row>
                @endforeach
                @if ($reader->rowCount > 6)
                    <x-table.row>
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                        <x-table.cell title="..." center />
                    </x-table.row>
                    <x-table.row>
                        @foreach ($reader->getLastRow() as $item)
                            <x-table.cell :title="$item" />
                        @endforeach
                    </x-table.row>
                @endif
            </x-slot:tbody>
        </x-table.box>
    </x-form.box>

@endsection
