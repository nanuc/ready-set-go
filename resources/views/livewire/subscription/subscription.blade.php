<div>
    @foreach($subscriptionProducts as $subscriptionProduct)
        <div class="bg-white shadow overflow-hidden sm:rounded-md mt-6">
            <ul>
                @foreach($subscriptionProduct->plans as $plan)
                    <li @if(!$loop->first) class="border-t border-gray-200" @endif>
                        <div class="block hover:bg-gray-50 @if(false) bg-gray-50 @endif focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-xl leading-5 font-medium text-indigo-600 truncate">
                                        {{ $plan->name }}
                                        @if(false)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium leading-5 bg-green-100 text-green-800">
                                            {{ __('Your current plan') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <div class="mr-6 flex items-center text-base leading-5 text-gray-500">
                                            {{ number_format($plan->price_yearly / 100, 2) }} {{ $currency }} / year
                                        </div>
                                    </div>
                                    @if(false)
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                            Choose
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
    {{--
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul>
            @foreach($plans as $plan)
                <li @if(!$loop->first) class="border-t border-gray-200" @endif>
                    <div class="block hover:bg-gray-50 @if($plan['subscribed']) bg-gray-50 @endif focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="text-xl leading-5 font-medium text-indigo-600 truncate">
                                    {{ $plan['name'] }}
                                    @if($plan['subscribed'])
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium leading-5 bg-green-100 text-green-800">
                                            {{ __('Your current plan') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <div class="mr-6 flex items-center text-base leading-5 text-gray-500">
                                        {{ $plan['price'] }} {{ $currency }} / {{ $plan['interval'] }}
                                    </div>
                                </div>
                                @if(!$plan['subscribed'])
                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                        <x-paddle-button :url="$plan['paylink']" class="px-8 py-4 text-sm">
                                            {{ __('Choose') }}
                                        </x-paddle-button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    --}}
</div>
