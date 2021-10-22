<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Gigs\Requirement;
use App\Models\Gigs\Faq;
use App\Models\Gigs\Tag;


class Gig extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
    
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
        
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
