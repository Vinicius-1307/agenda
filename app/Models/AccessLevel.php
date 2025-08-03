<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AccessLevel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public $timestamps = false;

    /**
     * Get the users associated with the access level.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'access_level_id');
    }

    /**
     * Get the screens associated with the access level.
     */
    public function screens(): BelongsToMany
    {
        return $this->belongsToMany(Screen::class, 'access_level_screen');
    }
}
