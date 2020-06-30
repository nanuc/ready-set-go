<div class="{{ $class ?? '' }}">
    <label for="{{ $field }}" class="block text-sm font-medium leading-5 text-gray-700">{{ $caption }}
    </label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <textarea wire:model="{{ $field }}" id="{{ $field }}" rows="{{ $rows ?? 3 }}" class="form-input block w-full sm:text-sm sm:leading-5"></textarea>
    </div>
    @error($field)
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
