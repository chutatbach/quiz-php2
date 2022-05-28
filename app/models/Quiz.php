<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;
class Quiz extends Model{
    protected $table = "quizs";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'subject_id',
        'duration_minutes',
        'start_time',
        'end_time',
        'status',
        'is_shuffle'
    ];
    public function subject(){
        return $this->belongsTo(subject::class,'subject_id');
    }
}
