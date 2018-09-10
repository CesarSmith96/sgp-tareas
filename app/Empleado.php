<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 't_empleado';
    protected $primaryKey = 'emp_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'emp_nom', 'emp_dni', 'emp_tel', 'emp_dir'
  		];
  	public function Facturas()
  	{
  		return $this->hasMany('sgp\Factura','emp_id');
  	}
}
