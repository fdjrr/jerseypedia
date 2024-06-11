<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function getHargaNamesetFormattedAttribute()
    {
        $harga_nameset = $this->attributes['harga_nameset'];

        return $harga_nameset ? number_format($harga_nameset, 0, ',', '.') : 0;
    }

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? null;

        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            });
        });
    }

    public function getGambarUrlAttribute()
    {
        $gambar = $this->attributes['gambar'];

        return $gambar ? Storage::url($gambar) : null;
    }

    public function getHargaFormattedAttribute()
    {
        $harga = $this->attributes['harga'];

        return $harga ? number_format($harga, 0, ',', '.') : 0;
    }

    /**
     * Get the liga that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function liga(): BelongsTo
    {
        return $this->belongsTo(Liga::class, 'liga_id', 'id');
    }

    /**
     * Get all of the pesanan_details for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan_details(): HasMany
    {
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }
}
