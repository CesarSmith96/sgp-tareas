<?php

namespace sgp;

use Illuminate\Database\Eloquent\Model;

class Valorizacionr extends Model
{
  protected $table = 't_valorizacionr';
  protected $primaryKey = 'valr_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'valr_nro','valr_cd','valr_fechin','valr_fechfin','valr_tipo','valr_gg','valr_uti','valr_pro','valr_est'
  ];
}
