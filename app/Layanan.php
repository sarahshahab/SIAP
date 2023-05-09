<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    //protected $primaryKey = 'id_lay';
    public $timestamps = false;
    protected $table = 'layanans';
    protected $fillable = ['id_layanan','pelayanan']; // all field fillable
    protected $primaryKey = 'id_layanan';

    public function layanan(){
        return $this->belongsTo('App\Models\Layanan', 'id_layanan');
        }

        public function antrean(){
            return $this->belongsTo('App\Models\Antrean', 'id_layanan');
            }
    
}
