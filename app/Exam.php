<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //若符合慣例可以不用設定這些

    protected $table      = 'exams';
    protected $primaryKey = 'id';
}
