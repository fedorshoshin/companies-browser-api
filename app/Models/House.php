<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    /** @use HasFactory<\Database\Factories\HouseFactory> */
    use HasFactory;

    protected $fillable = ['address', 'latitude', 'longitude'];

    public function organizations()
    {
        return $this->hasMany(Organization::class,'house_id');
    }
}
