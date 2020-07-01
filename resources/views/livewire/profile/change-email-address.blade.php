<div>
    <form wire:submit.prevent="setEmailAddress">
        <label for="email-address" class="block text-sm font-medium leading-5 text-gray-700">
            {{ __('Email address') }}
        </label>
        <div class="mt-1 rounded-md shadow-sm">
            <input id="email-address" wire:model.lazy="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
        </div>
        @error('email')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror


        <div class="mt-6">
          <span class="block rounded-md shadow-sm float-right">
            <input type="submit" type="submit" value="{{ __('Update') }}" class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">

          </span>
        </div>
    </form>
</div>
