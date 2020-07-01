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
        return view('rsg::subscription.subscription');
    }
}
