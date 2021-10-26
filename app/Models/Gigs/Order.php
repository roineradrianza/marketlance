<?php

namespace App\Models\Gigs;

use App\Models\Gig;
use App\Models\User;
use App\Models\Gig\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'amount',
        'seller_id',
        'buyer_id',
        'package_id',
        'gig_id',
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
