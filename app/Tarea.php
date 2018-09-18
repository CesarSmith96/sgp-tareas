<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
  protected $table = 't_tarea';
  protected $primaryKey = 'tar_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'tar_nom','tar_descripcion','tar_fechin','tar_fechin','tar_prio','tar_est','tar_idpadre','pro_id','usu_id',
  ];
   public function Proyecto()
  {
      return $this->belongsTo('sgp\Proyecto','pro_id');
  }
   public function Usuario()
  {
      return $this->belongsTo('sgp\Usuario','usu_id');
  }
   public function Tarea()
  {
      return $this->belongsTo('sgp\Tarea','tar_idpadre');
  }
}
