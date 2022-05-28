<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;
class Answer extends Model{
    protected $table = "answers";
    protected $fillable = ['content','question_id','is_correct','img'];
    public $timestamps = false;
}                                                                                                                                                                                                                                                                                                                                                               
?>