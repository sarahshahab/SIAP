<?php

namespace App;

use App\Antrean;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
protected $table = 'kantors';
    protected $fillable = ['lokasi', 'kantor']; // all field fillable
    // protected $guarded = ['id_kantor'];
    public $timestamps = false;
    protected $primaryKey = 'id_kantor';

    public function antrean(){
        return $this->hasMany(Antrean::class);
        }

    // public function kantor(){
    //     return $this->belongsTo('App\Models\Kantor', 'id_kantor');
    //     }

    }
