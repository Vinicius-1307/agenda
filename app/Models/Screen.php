<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    public $timestamps = false;

    /**
     * Get the access levels associated with the screen.
     */
    public function accessLevels()
    {
        return $this->belongsToMany(AccessLevel::class, 'access_level_screen');
    }
}
