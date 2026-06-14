<!-- Page Title Start -->
<div class="page-title-head">
    <h4 class="page-main-title">{{ $title }}</h4>
    <div class="hidden items-center gap-1.25 text-sm md:flex">
        <a class="text-sm" href="{{ route('dashboard') }}">Dashboard</a>
        @if (!empty($subtitle))
            <i class="iconify tabler--chevron-right text-sm rtl:rotate-180"></i>
            @if (!empty($subtitleUrl))
                <a class="text-sm" href="{{ $subtitleUrl }}">{{ $subtitle }}</a>
            @else
                <span class="text-sm">{{ $subtitle }}</span>
            @endif
        @endif
        <i class="iconify tabler--chevron-right text-sm rtl:rotate-180"></i>
        <span aria-current="page" class="text-default-400 text-sm">{{ $title }}</span>
    </div>
</div>
<!-- Page Title End -->
