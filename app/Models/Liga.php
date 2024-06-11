<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Liga extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ligas';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function getGambarUrlAttribute()
    {
        $gambar = $this->attributes['gambar'];

        return $gambar ? Storage::url($gambar) : null;
    }

    /**
     * Get all of the products for the Liga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'liga_id', 'id');
    }
}
