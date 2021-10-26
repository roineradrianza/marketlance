<?php

namespace App\Models\Gigs;

use App\Models\Gigs\Order;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'rating_type',
        'rating',
        'seller_id',
        'buyer_id',
        'order_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function order() 
    {
        return $this->belongsTo(Order::class);
    }
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function buyer()
    {
        return $this->hasMany(User::class, 'id', 'buyer_id');
    } 

    public function seller()
    {
        return $this->hasMany(User::class, 'id', 'seller_id');
    }
}
