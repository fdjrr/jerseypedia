<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pesanans';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function getTotalHargaFormattedAttribute()
    {
        $total_harga = $this->attributes['total_harga'];

        return $total_harga ? number_format($total_harga, 0, ',', '.') : null;
    }

    public function getKodeUnikFormattedAttribute()
    {
        $kode_unik = $this->attributes['kode_unik'];

        return $kode_unik ? number_format($kode_unik, 0, ',', '.') : null;
    }

    /**
     * Get all of the pesanan_details for the Pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan_details(): HasMany
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }

    /**
     * Get the user that owns the Pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
