<x-rsg-layouts:app>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div class="text-center bg-white p-4 shadow-md rounded-lg">
            <h1 class="font-bold text-center mb-4">
                {{ __('Change password') }}
            </h1>
            <livewire:profile.change-password />
        </div>

        <div class="text-center bg-white p-4 shadow-md rounded-lg">
            <h1 class="font-bold text-center mb-4">
                {{ __('Change email address') }}
            </h1>
            <livewire:profile.change-email-address />
        </div>

        <div class="text-center bg-white p-4 shadow-md rounded-lg">
            <h1 class="font-bold text-center mb-4">
                {{ __('Change name') }}
            </h1>
            <livewire:profile.change-name />
        </div>

        {{--
        <div class="text-center bg-white p-4 shadow-md rounded-lg">
            <h1 class="font-bold text-center mb-4">
                {{ __('Change avatar') }}
            </h1>
            <livewire:profile.change-avatar />
        </div>
        --}}
    </div>
</x-app-layout>
