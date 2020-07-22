<div x-data="{ isOpen: false }">
    @if($triggerButtonLabel)
        <button
            onclick="showModal('{{ $id }}')"
            type="button"
            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
        >
            {{ $triggerButtonLabel }}
        </button>
    @endif

    @if($triggerLinkLabel)
        <a
           onclick="showModal('{{ $id }}')"href="#"
           class="text-indigo-600 hover:text-indigo-900">{{ $triggerLinkLabel }}
        </a>
    @endif

    <div x-show="isOpen" x-on:show-modal.window="if($event.detail.id == '{{ $id }}') { isOpen = true }" x-cloak class="fixed bottom-0 inset-x-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center z-50">
        <div
            x-show.transition.opacity.duration.300ms="isOpen"
            class="fixed inset-0 transition-opacity"
            @click="isOpen = false"
        >
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div
            x-show="isOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-xl sm:w-full sm:p-6"
            role="dialog"
            aria-modal="true"
            aria-labelledby="modal-headline"
        >

            @if($title)
                <div>
                    <h3 class="text-xl leading-6 font-medium text-gray-900 mb-4">
                        {{ $title }}
                    </h3>
                </div>
            @endif

            {{ $slot }}

            @if($type == 'confirm-danger')
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                      <button
                              @click="isOpen = false; "
                              @if($wireAction) wire:click="{{ $wireAction }}" @endif
                              type="button"
                              class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        {{ $confirmButtonLabel ?? 'Delete' }}
                      </button>
                    </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                      <button @click="isOpen = false" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                      </button>
                    </span>
                </div>
            @elseif($type == 'confirm')
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                  <button
                          @click="isOpen = false; "
                          @if($wireAction) wire:click="{{ $wireAction }}" @endif
                          type="button"
                          class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    {{ $confirmButtonLabel ?? __('OK') }}
                  </button>
                </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                  <button @click="isOpen = false" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Cancel
                  </button>
                </span>
                </div>
            @endif
        </div>
    </div>
</div>