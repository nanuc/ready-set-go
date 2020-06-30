<div x-data="{ tab: '{{ $active }}' }">
    <div class="border-b border-gray-200 mb-2">
        @stack('tab-nav' . $tabsId)
    </div>
    @stack('tab-items' . $tabsId)
</div>