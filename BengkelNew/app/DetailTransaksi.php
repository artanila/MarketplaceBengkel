<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'tb_marketplace_detail_transaksi';

    protected $primaryKey = 'id_detail_transaksi';

    protected $fillable = [
        'id_detail_transaksi','id_transaksi_online', 'id_sparepart', 'jumlah_produk', 'id_review'
        , 'code_detail_transaksi', 'status'
    ];

    public function Sparepart(){
        return $this->hasOne(Sparepart::class, 'id_sparepart', 'id_sparepart');
    }
    public function Transaksi(){
        return $this->Transaksi(Sparepart::class, 'id_transaksi_online', 'id_transaksi_online');
    }
}
