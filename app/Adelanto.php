<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Adelanto extends Model
{
	protected $table = 't_adelanto';
    protected $primaryKey = 'adel_id';
    protected $hidden = [
      'created_at', 'updated_at',
  	];
  	protected $fillable = [
  		'adel_mat', 'adel_cd', 'adel_est', 'pro_id'
  		];
  	public function Proyecto()
  	{
  		return $this->belongsTo('sgp\Proyecto','pro_id');
  	}
  	public function Adelantos()
  	{
  		return $this->hasMany('sgp\Ingreso','adel_id');
  	}
}
