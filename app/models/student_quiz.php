<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;
class student_quiz extends Model{
    protected $table = "student_quizs";
    protected $fillable = ['student_id','quiz_id','start_time','end_time','score'];
   
    public $timestamps = false;
}
?>