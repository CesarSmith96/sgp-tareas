<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Valorizacionc extends Model
{
  protected $table = 't_valorizacionc';
  protected $primaryKey = 'valc_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'valc_nro','valc_cd','valc_fechin','valc_fechfin','valc_tipo','valc_gg','valc_uti','valc_pro','valc_est','pro_id',
  ];
  public function Proyecto()
  {
      return $this->belongsTo('sgp\Proyecto','pro_id');
  }
}
