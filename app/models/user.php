<?php
namespace App\Models;
use  Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = "users";
    public $timestamps = false;
    public function subjects(){
        return $this->hasMany(Subject::class,'author_id');
        // table chinh -> co nhieu? (table lien quan,khoa phu)
    }
}
?>