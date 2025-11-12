<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'pesantren_name',
        'position',
        'whatsapp_number',
        'email',
    ];
}
