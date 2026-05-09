<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'capacity',
    ];
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'eventId');
    }
    
}
