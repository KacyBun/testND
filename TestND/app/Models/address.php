<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected  $table = 'address';
    protected  $primaryKey = 'id_address';
    protected  $fillable = [
        'id_address',
        'alias',
        'address'
    ];

    protected function detailempapp()
    {
        return $this->belongsTo('App\Models\detailempadd','id_address','id_address');
    }

}
