<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 't_ingreso';
  	protected $primaryKey = 'ing_id';
  	protected $hidden = [
     	 'created_at', 'updated_at',
 	 ];
 	protected $fillable = [
        'ing_monto','ing_tipo','ing_fech','valr_id','adel_id','pro_id'
 	 ];
 	 public function Valorizacionr()
 	 {
 	 	return $this->belongsTo('sgp\Valorizacionr','valr_id')
 	 }
 	 public function Adelanto()
 	 {
 	 	return $this->belongsTo('sgp\Adelanto','adel_id')
 	 }
  	public function Proyecto()
 	 {
  	    return $this->belongsTo('sgp\Proyecto','pro_id');
  	 }
}
