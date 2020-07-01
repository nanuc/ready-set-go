<?php

namespace Nanuc\ReadySetGo\Models;

use Illuminate\Database\Eloquent\Model;
use Nanuc\ReadySetGo\Scopes\ActiveScope;

class SubscriptionProduct extends Model
{
    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope());
    }

    public function plans()
    {
        return $this->hasMany(SubscriptionProductPlan::class);
    }
}
