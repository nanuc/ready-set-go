<?php

namespace Nanuc\ReadySetGo\Http\Livewire\Subscription;

use Nanuc\ReadySetGo\Http\Livewire\BaseComponent;
use Nanuc\ReadySetGo\Models\SubscriptionProduct;

class Subscription extends BaseComponent
{
    public function mount()
    {

    }

    public function render()
    {
        /*
        $subscription = auth()->user()->subscription();

        $subscribedPlanId = $subscription ? $subscription->paddle_plan : Arr::first(config('ready-set-go.subscription.plans'));
loggy($subscribedPlanId);
        $currency = config('cashier.currency');

        $paddlePlans = Paddle::subscription()->listPlans()->send();

        $paddlePlans = collect($paddlePlans)->mapWithKeys(function($plan) {
            return [
                $plan['id'] => $plan
            ];
        });

        foreach(config('ready-set-go.subscription.plans') as $planId) {
            $plans[] = [
                'name' => Arr::get($paddlePlans, $planId . '.name'),
                'price' => Arr::get($paddlePlans, $planId . '.recurring_price.' . $currency),
                'interval' => Arr::get($paddlePlans, $planId . '.billing_type'),
                'paylink' => auth()->user()
                    ->newSubscription('default', $planId)
                    ->returnTo(route('subscription'))
                    ->create([
                        'email' => auth()->user()->email
                    ]),
                'subscribed' => $planId == $subscribedPlanId
            ];
        }
        */
        $currency = 'USD';
        $subscriptionProducts = SubscriptionProduct::all();

        return view('rsg::livewire.subscription.subscription', compact('subscriptionProducts', 'currency'));

    }
}
