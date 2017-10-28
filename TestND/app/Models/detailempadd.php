<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailempadd extends Model
{
    protected $table = 'detailempadd';
    protected $primaryKey = 'id_detailempadd';
    protected $fillable = [
                            'id_detailempadd',
                            'id_employee',
                            'id_address'
                          ];



    public function employee()
    {
        return $this-> hasOne('App\Models\employee','id_employee','id_employee');
    }

    public function address()
    {
        return $this-> hasOne('App\Models\address','id_address','id_address');
    }
}
