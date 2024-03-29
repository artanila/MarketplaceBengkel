<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kemasan extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_master_kemasan";

    protected $primaryKey = 'id_kemasan';

    protected $fillable = [
        'nama_kemasan',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;
}
