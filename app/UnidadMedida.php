<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 't_unidadmedida';
    protected $primaryKey = 'um_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'um_desc', 'um_abr'
  		];
  	public function FacturaDetalles()
  	{
  		return $this->hasMany('sgp\FacturaDetalle','um_id');
  	}
}
