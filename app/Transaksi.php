<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_marketplace_transaksi';

    protected $primaryKey = 'id_transaksi_online';

    protected $fillable = [
        'id_transaksi_online','id_user', 'harga_pengiriman', 'harga_total', 'id_bengkel','tanggal_transaksi','id_desa',
        'code_transaksi', 'transaksi_status','resi', 'nama_penerima', 'alamat_penerima', 'nohp_penerima', 'id_kabupaten', 'kurir_pengiriman'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function Desa(){
        return $this->hasOne(DesaBaru::class, 'id_desa', 'id_desa');
    }

    public function Detailtransaksi(){
        return $this->belongsToMany(Sparepart::class, 'tb_marketplace_detail_transaksi', 'id_transaksi_online', 'id_sparepart')->withPivot('id_detail_transaksi','jumlah_produk','rating', 'review'
        , 'code_detail_transaksi');
    }
    

    
}
