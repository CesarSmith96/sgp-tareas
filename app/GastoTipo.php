<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class GastoTipo extends Model
{
  protected $table = 't_gastotipo';
  protected $primaryKey = 'gtip_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'gcat_nom','pro_id','gcat_id', 
  ];
    public function GastoCategoria()
  {
      return $this->belongsTo('sgp\GastoCategoria','gcat_id');
  }
  public function Proyectos()
  {
      return $this->hasMany('sgp\Proyecto','gtip_id');
  }
}

