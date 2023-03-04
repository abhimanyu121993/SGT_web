<?php

namespace App\Models;

use App\Models\customer\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuardDuty extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function properties()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
