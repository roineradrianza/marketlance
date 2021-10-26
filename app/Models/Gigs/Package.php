<?php

namespace App\Models\Gigs;

use App\Models\Gig;
use App\Models\Gigs\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'excerpt',
        'delivery_time',
        'price',
        'revisions',
        'gig_id',
    ];

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
