@push('tab-nav' . $tabsId)
    <button
        :class="{ 'border-indigo-700 text-indigo-700 focus:text-indigo-800 focus:border-indigo-700': tab === '{{ $id }}' }"
        class="tab-link mr-8 whitespace-no-wrap py-2 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
        @click="tab = '{{  $id }}'">
        {{ $caption }}
    </button>
@endpush

@push('tab-items' . $tabsId)
    <div x-show="tab === '{{ $id }}'">
        {!! $slot !!}
    </div>
@endpush


