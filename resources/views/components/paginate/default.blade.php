<div class="default-paginator">
    @php
        $left_page = 1;
        $current_page = $paginator->currentPage();
        $right_page = $paginator->lastPage();
        $range = 2;

        if ($current_page >= $left_page + $range && $current_page <= $right_page - $range) {
            // Текущая страница внутри диапазона
            $page_start = $current_page - $range;
            $page_end = $current_page + $range;
        } elseif ($current_page <= $range) {
            // Текущая страница в начале
            $page_start = 1;
            $page_end = $current_page + ($range + (1 + $range - $current_page));
        } else {
            // Текущая страница в конце
            $page_start = $current_page - ($range + ($range - ($right_page - $current_page)));
            $page_end = $right_page;
        }

        if ($right_page - ($range * 2 + 1) <= 0) {
            $page_start = 1;
            $page_end = $right_page;
        }
    @endphp

    <x-link.blue-button :href="$paginator->url(1)">
        <i class="fa-solid fa-angles-left"></i>
    </x-link.blue-button>
    @for ($i = $page_start; $i <= $page_end; $i++)
        @if ($i == $current_page)
            <x-link.blue-button href="" class="current">
                {{ $i }}
            </x-link.blue-button>
        @else
            <x-link.blue-button :href="$paginator->url($i)">
                {{ $i }}
            </x-link.blue-button>
        @endif
    @endfor
    <x-link.blue-button :href="$paginator->url($paginator->lastPage())">
        <i class="fa-solid fa-angles-right"></i>
    </x-link.blue-button>
</div>
