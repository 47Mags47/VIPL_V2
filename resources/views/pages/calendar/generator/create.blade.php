<x-dialog.box>
    <x-dialog.modal header="Новое правило" id="create-generator-dialog">
        <x-slot:content>
            <x-form.box :action="route('calendar.generator.store')" sbm="Добавить">
                <x-input.input name="date_start" type="date" label="Время начала" />
                <x-input.input name="date_start" type="date" label="Время Окончания" />
                <x-input.select name="calculation_code" label="Периодичность">

                </x-input.select>
                <x-input.area name="title" label="Описание события" ph="Здесь описываются события для календаря" />
            </x-form.box>
        </x-slot:content>
    </x-dialog.modal>
</x-dialog.box>