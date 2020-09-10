<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'courses';
  public $timestamps = true;

  public function subject() {
       return $this->belongsTo('App\Subject', 'idsubject');
   }



}
