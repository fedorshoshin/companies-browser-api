<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    protected $fillable = ['name','parent_id'];

    public function parent(){
        return $this->belongsTo(Occupation::class,'parent_id');
    }
    public function children(){
        return $this->hasMany(Occupation::class,'parent_id');
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class,'organization_occupations','occupation_id','organization_id');
    }

    public function getDepthAttribute(): int
    {
        $depth = 0;
        $current = $this->parent;
        while ($current) {
            $depth++;
            $current = $current->parent;
        }
        return $depth;
    }

    protected static function booted()
    {
        static::creating(function ($occupation) {
            if ($occupation->parent_id) {
                $parent = Occupation::find($occupation->parent_id);
                if ($parent && $parent->depth >= 2) {
                    throw new Exception('Occupation hierarchy cannot exceed 3 levels.');
                }
            }
        });
    }

    public static function findOrCreate(string $name, ?int $parent_id = null): self
    {
        return static::firstOrCreate(
            ['name' => $name, 'parent_id' => $parent_id]
        );
    }
}
