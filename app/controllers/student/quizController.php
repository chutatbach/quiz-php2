<?php
namespace App\Controllers\student;
use App\Models\Quiz;
use App\Models\User;
class QuizController
{
    function index($subject_id){
        $user = User::Where('id', $_SESSION['login']['id'])->get();

        foreach($user as $val){
            $save_name = $val->name;
        }

        $quizs= Quiz::Where('subject_id',$subject_id)->get();

        // include_once __st_view__ ."quiz.php";
        return view('student.quiz',[
            'user' => $user,
            'save_name' => $save_name,
            'quizs' => $quizs,
        ]);
    }
}
?>