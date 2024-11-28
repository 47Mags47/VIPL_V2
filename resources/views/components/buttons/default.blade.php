<button {{ $attributes->merge(['type' => 'button']) }}>
    {{ $title ?? $slot }}
</button>
