<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'pivot'
    ];
}
