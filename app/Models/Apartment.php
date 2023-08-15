<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $table = "apartments";

    protected $fillable = [
        'building',
        'name',
        'floor',
        'room',
        'price',
        'rental',
        'surface',
        'bedrooms',
        'reserver',
        'type',
        'tour',
        'side',
    ];
}
