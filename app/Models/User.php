<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Gig;
use App\Models\UserMeta;
use App\Models\Gigs\{Order, Rating};

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function metas()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function gigs()
    {
        return $this->hasMany(Gig::class);
    }
    
    public function buyer_orders()
    {
        return $this->hasMany(Order::class, 'id', 'buyer_id');
    }
    
    public function seller_orders()
    {
        return $this->hasMany(Order::class, 'id', 'seller_id');
    }

    public function buyer_ratings()
    {
        return $this->hasMany(Rating::class, 'buyer_id', 'id');
    } 

    public function seller_ratings()
    {
        return $this->hasMany(Rating::class, 'seller_id', 'id');
    }
}
