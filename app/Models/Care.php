<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Care extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pet_id',
        'description',
        'cared_at'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
	}
}
