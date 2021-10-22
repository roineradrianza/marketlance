<?php

namespace App\Models\Gigs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Gig;


class Faq extends Model
{
    use HasFactory;

    public function gig() 
    {
        return $this->belongsTo(Gig::class);
    }
}
