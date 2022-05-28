<?php

namespace App\Controllers\teacher;
use App\Models\user;
use App\Models\Quiz;

class Quiz_gvController
{

    function insert()
    {
      
        if (isset($_POST['insert_quiz'])) {
            // var_dump($_POST);
            // $quiz = new Quiz();
            // $quiz->name = $_POST['name_quiz'];
            // $quiz->subject_id = $_POST['subject_id'];
            // $quiz->duration_minutes = $_POST['time'];
            // $quiz->start_time = $_POST['start'];
            // $quiz->end_time = $_POST['end'];
            // $quiz->status = $_POST['status'];
            // $quiz->is_shuffle = $_POST['shuffle'];
            // $quiz->save();
            Quiz::create([
                'name' => $_POST['name_quiz'],
                'subject_id' => $_POST['subject_id'],
                'duration_minutes' => $_POST['time'],
                'start_time' => $_POST['start'],
                'end_time' => $_POST['end'],
                'status' => $_POST['status'],
                'is_shuffle' => $_POST['shuffle']
            ]);
            header("location:" . __URL__ . "admin/quiz_teacher/" . $_POST['subject_id']);
        }
    }
    
    function update($param)
    {
        if (isset($_POST['quiz_update'])) {
            $a = Quiz::find($_POST['quiz_id'])->first();
            echo '<pre>';
            var_dump($a);
            $a->name = $_POST['name_quiz'];
            $a->duration_minutes =  $_POST['time'];
            $a->start_time = $_POST['start'];
            $a->end_time = $_POST['end'];
            $a->status =  $_POST['status'];
            $a->is_shuffle =  $_POST['is_shuffle'];
            $a->save();
            header("location:" . __URL__ . "admin/quiz_teacher/$param");
        }
    }
    function delete($id_quiz,$param)
    {
       Quiz::destroy($id_quiz);
       header("location:" . __URL__ . "admin/quiz_teacher/$param");
    }
    function index($id_subject)
    {
        $users = user::Where('id', '=', $_SESSION['login']['id'])->get();
        
        $quizs = Quiz::Where('subject_id','=',$id_subject)->get();

        if (isset($_GET['id_up'])) {
            $quiz_up = Quiz::Where('id', '=', $_GET['id_up'])->get();
        }

        return view('teacher.quiz_gv',[
            'id_subject' => $id_subject,
            'users' => $users,
            'quizs' => $quizs,
            'quiz_up' => isset($_GET['id_up'])?$quiz_up:''
        ]);
        // include_once __tc_view__ . "quiz_gv.php";
    }
}
