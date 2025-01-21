<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicRegistration extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'lucky_draw_number'];
}

