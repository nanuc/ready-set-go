<?php

namespace Nanuc\ReadySetGo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Nanuc\ReadySetGo\Models\SubscriptionProduct;
use ProtoneMedia\LaravelPaddle\Paddle;

class SubscriptionController extends Controller
{
    public function index()
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

        return view('rsg::subscription.subscription', compact('subscriptionProducts', 'currency'));
    }
}
