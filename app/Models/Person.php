<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    // if i want to eager load a relation to whole model
    /*         protected $with = ['business'];        */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'business_id',
    ];
    public function business()
    {
        return $this->belongsTo(Business::class)->withTrashed()/*->withDefault(['business_name' => 'No Business'])*/;
    }
}
