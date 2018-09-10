<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 't_proveedor';
    protected $primaryKey = 'prov_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'prov_nom', 'prov_ruc'
  		];
  	public function Facturas()
  	{
  		return $this->hasMany('sgp\Factura','prov_id');
  	}
}
