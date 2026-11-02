<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'image', 'title', 'slug', 'description', 'location',
        'price', 'rating', 'reviews', 'category', 'status', 'submitted_by',
    ];

    public function submittedBy()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
}
