<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    protected $table = 't_facturadetalle';
    protected $primaryKey = 'facd_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'facd_desc', 'facd_cant', 'facd_punit'.'fac_id', 'gtip_id', 'um_id'
  		];
  	public function Factura()
  	{
  		return $this->belongsTo('sgp\Factura','fac_id');
  	}
  	public function GastoTipo()
  	{
  		return $this->belongsTo('sgp\GastoTipo','gtip_id');
  	}
  	public function UnidadMedida()
  	{
  		return $this->belongsTo('sgp\UnidadMedida','um_id');
  	}
}
