<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationFactory> */
    use HasFactory;

    protected $fillable = ['name','house_id'];
    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function phones()
    {
        return $this->hasMany(OrganizationPhones::class);
    }

    public function occupations()
    {
        return $this->belongsToMany(Occupation::class, 'organization_occupations','organization_id','occupation_id');
    }
}
