<?php

namespace App\Models\Gigs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Gig;

class Requirement extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function gig() 
    {
        return $this->belongsTo(Gig::class);
    }
}
