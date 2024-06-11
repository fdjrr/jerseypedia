<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesananDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pesanan_details';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function scopeFilter($query, array $filters)
    {
        $user_id = $filters['user_id'] ?? null;

        $query->when($user_id, function ($query, $user_id) {
            $query->whereHas('pesanan', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            });
        });
    }

    public function getTotalHargaFormattedAttribute()
    {
        $total_harga = $this->attributes['total_harga'];

        return $total_harga ? number_format($total_harga, 0, ',', '.') : null;
    }

    /**
     * Get the pesanan that owns the PesananDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    /**
     * Get the product that owns the PesananDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
