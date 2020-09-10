<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
  protected $table = 'enrollments';
  public $timestamps = true;

  public function course() {
       return $this->belongsTo('App\Course', 'idcourse');
   }

  public function subject() {
        return $this->belongsTo('App\Subject', 'idsubject');
    }


}
