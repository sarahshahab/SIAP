<?php

namespace App;

use App\User;
use App\Kantor;
use App\Layanan;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    protected $table = 'antreans';
    public $timestamps = false;

    public function user(){
    return $this->belongsTo(User::class, 'id_operator');
    }

    public function kantor()
    {
        return $this->belongsTo('App\Kantor', 'id_kantor');
    }
    
    public function layanan() {
        return $this->belongsTo('App\Layanan', 'id_layanan');
    }

    // public function counter(){
    //     return $this->belongsTo('App\Counter', 'id_layanan');
    // }
    // public function layanan(){
    //     return $this->hasOne(Layanan::class, 'id_layanan');
    //     }

}
