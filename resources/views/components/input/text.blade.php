<div class="{{ $class ?? '' }}">
    <label for="{{ $field }}" class="block text-sm font-medium leading-5 text-gray-700">{{ $caption }}</label>
    <div class="mt-1 flex rounded-md shadow-sm">
        @if($prefix)
            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                {{ $prefix }}
            </span>
        @endif
        <input wire:model="{{ $field }}" id="{{ $field }}" class="form-input block w-full sm:text-sm sm:leading-5 rounded-none @if(!$prefix) rounded-l-md @endif @if(!$suffix) rounded-r-md @endif"/>
        @if($suffix)
            <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                {{ $suffix }}
            </span>
        @endif
    </div>
    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
