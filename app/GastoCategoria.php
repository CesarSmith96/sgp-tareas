<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class GastoCategoria extends Model
{
  protected $table = 't_gastocategoria';
  protected $primaryKey = 'gcat_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'gcat_nom', 'gfam_id',
  ];
  public function GastoFamilia()
  {
      return $this->belongsTo('sgp\GastoFamilia','gfam_id');
  }
  public function GastoTipos()
  {
      return $this->hasMany('sgp\TipoGasto','gcat_id');
  }

}

