<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_marketplace_transaksi';

    protected $primaryKey = 'id_transaksi_online';

    protected $fillable = [
        'id_transaksi_online','id_user', 'harga_pengiriman', 'harga_total', 
        'code_transaksi', 'transaksi_status','resi', 'nama_penerima', 'alamat_penerima', 'nohp_penerima', 'id_kabupaten', 'kurir_pengiriman'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
