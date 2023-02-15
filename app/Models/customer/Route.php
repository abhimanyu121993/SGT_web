<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    public function checkpoint()
    {
        return $this->belongsTo(Checkpoint::class, 'checkpoint_id');
    }
}
