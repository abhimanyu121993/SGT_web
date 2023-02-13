<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory,softDeletes;
    protected $guarded=[];

    public function statusInfo()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function currencyInfo()
    {
        return $this->belongsTo(Currency::class, 'currency', 'id');
    }
}