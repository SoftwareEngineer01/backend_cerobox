<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'identification',
        'email',
        'phone_number',
        'observations',
    ];

    public $timestamps = false;

    public function services() {
        return $this->hasMany(Service::class);
    }

}
