<form>
    <x-input.input name="search" ph="Найти..." :value="$search ?? ''" />

    <label for="search_btn">
        <x-buttons.ico class="blue-button">
            <i class="fa-solid fa-magnifying-glass"></i>
        </x-buttons.ico>
        <input type="submit" id="search_btn">
    </label>
</form>
