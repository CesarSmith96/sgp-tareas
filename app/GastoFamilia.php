<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class GastoFamilia extends Model
{
  protected $table = 't_gastofamilia';
  protected $primaryKey = 'gfam_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'gfam_nom',
  ];
  public function GastoCategorias()
  {
      return $this->hasMany('sgp\GastoCategoria','gfam_id');
  }
}
