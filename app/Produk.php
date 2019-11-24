<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
     public function relasikategori() {
    	return $this->belongsTo('App\MasterKat', 'kategori_id');
    }

    public function relasimatauang() {
    	return $this->belongsTo('App\MasterCurr', 'mata_uang_id');
    }
    
    public function relasiunit() {
    	return $this->belongsTo('App\MasterUnit', 'unit_id');
    }
    
    public function relasilaba() {
    	return $this->belongsTo('App\MasterPersenjual', 'unit_id');
    }
}
