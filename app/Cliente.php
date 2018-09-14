<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table = 't_cliente';
  protected $primaryKey = 'cli_id';
 protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'cli_nom',
  ];
  public function Proyectos()
  {
      return $this->hasMany('sgp\Proyecto','cli_id');
  }
}

