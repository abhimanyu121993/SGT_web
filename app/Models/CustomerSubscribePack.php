<?php

namespace App\Models;

use App\Models\customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscribePack extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscribe_id');
    }
}
