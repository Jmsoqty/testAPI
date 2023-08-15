<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crudsample extends Model
{
    use HasFactory;

    protected $table = 'crudsamples';

    protected $fillable = [
        'name',
        'section',
        'email',
        'contact_num'
    ];

}
