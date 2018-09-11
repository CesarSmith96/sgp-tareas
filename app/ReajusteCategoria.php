<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class ReajusteCategoria extends Model
{
  protected $table = 't_reajustecategoria';
  protected $primaryKey = 'reac_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'reac_nom','reaf_id',
  ];
  public function ReajusteFamilia()
  {
      return $this->belongsTo('sgp\ReajusteFamilia','reaf_id');
  }
  public function Reajustes()
  {
      return $this->hasMany('sgp\Reajuste','reac_id');
  }
}
