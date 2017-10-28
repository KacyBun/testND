<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id_employee';
    protected $fillable =
        [
            'name',
            'email',
            'bithDate'
        ];

    protected function detailempapp()
    {
        return $this->hasMany('App\Models\detailempadd','id_employee','id_employee');
    }

}
