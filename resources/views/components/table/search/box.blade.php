<form>
    <x-input.input name="search" ph="Найти..." :value="request()->get('search') ?? ''" />

    <label for="search_btn">
        <x-buttons.ico class="blue-button" glass />
        <input type="submit" id="search_btn">
    </label>
</form>
