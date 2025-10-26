<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationPhones extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationPhonesFactory> */
    use HasFactory;

    protected $fillable = ['organization_id', 'phone'];

    public function organization(){
        return $this->belongsTo(Organization::class);
    }
}
