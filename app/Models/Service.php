<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'image',
        'id_type_service',
        'start_date',
        'end_date',
        'observations',
    ];

    public $timestamps = false;

}
