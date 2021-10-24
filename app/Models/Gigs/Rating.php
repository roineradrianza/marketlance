<?php

namespace App\Models\Gigs;

use App\Models\Gigs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    
    public function gig() 
    {
        return $this->belongsTo(Gig::class);
    }
}
