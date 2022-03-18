<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'image',
        'short_name',
        'no',
        'type'
    ];
}
