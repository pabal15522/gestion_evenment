<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'eventId',
        'firstName',
        'lastName',
        'email',
    ];
    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'eventId');           
    }
}
