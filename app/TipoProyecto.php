<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model
{
  protected $table = 't_tipoproyecto';
  protected $primaryKey = 'tpro_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'tpro_nom', 
  ];
  public function Proyecto()
  {
      return $this->hasMany('sgp\Proyecto','tpro_id');
  }
}


