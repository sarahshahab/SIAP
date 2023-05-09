<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    public $timestamps = false;
    protected $table = 'counters';
    protected $fillable = ['tanggal','operator'];
    public $incrementing = false;

    public function kantor() { 
        return $this->belongsTo('App\Kantor', 'id_kantor'); 
        }

    public function layanan() { 
        return $this->belongsTo('App\Layanan', 'id_layanan'); 
        }   
}
