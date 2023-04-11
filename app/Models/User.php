<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\hasOne;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function religion(): hasOne
    {
        return $this->hasOne(Religion::class, 'id', 'religion');
    }

    // points for possible improvement depending on scope and needs:
    // - instead of writing out each param, loop through (validated) input and use that as query params.
    // - cache on often used parameters. Ie location.
    // - create protected function to return the query depending on injected param. This would probably improve readability.

    public function scopeFilter($query)
    {
        $query->when(
            request('name'), fn ($query) => $query->where('name', 'LIKE', '%'.request('name').'%')
        );

        $query->when(
            request('age'), fn ($query) => $query->where('age', request('age'))
        );

        $query->when(
            request('gender'), fn ($query) => $query->where('gender', request('gender'))
        );

        $query->when(
            request('religion'), fn ($query) => $query->where('religion', request('religion'))
        );

        $query->when(
            request('city'), fn ($query) => $query->where('city', request('city'))
        );

        $query->when(
            request('order'), fn ($query) => $query->orderBy(request('order'), request('sort') ?? 'asc')
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

      /**
     * The attributes that should be eager-loaded with the model.
     *
     * @var array<int, string>
     */
    protected $with = [
        'religion'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
