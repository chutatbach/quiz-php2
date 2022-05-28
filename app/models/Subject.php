<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;
class Subject extends Model{
    protected $table = "subjects";
    public $timestamps = false;
    
    // public function quizs(){
    //     return $this->hasMany(Quiz::class,'subject_id');
    // }
    protected $fillable = [
        'name','author_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'author_id');
         // thuoc ve (table lien quan,khoa phu)
    }

    public function quizs(){
        return $this->hasMany(Quiz::class,'subject_id');
    }
}
?>