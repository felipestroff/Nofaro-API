<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'specie_id'
    ];


	public function specie()
    {
        return $this->belongsTo(Specie::class, 'specie_id');
	}

    public function cares()
    {
        return $this->hasMany(Care::class);
	}
}
