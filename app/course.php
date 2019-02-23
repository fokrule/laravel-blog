<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table = "course";
    protected $primaryKey = "course_id";
    protected $fillable = ['course_title','course_code','course_credit'];
}
