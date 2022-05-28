<?php

namespace App\Controllers\teacher;

use App\Models\user;
use App\Models\Question;

class Question_gvController
{
    function insert()
    {
        if(isset($_POST['submit'])){
            $image = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            move_uploaded_file($image, 'public/img/' . $image_name);
            Question::create([
                'name' => $_POST['name_question'],
                'quiz_id' => $_POST['quiz_id'],
                'img' => $image_name,
            ]);
            header("location:" . __URL__ . "admin/question_teacher/" . $_POST['quiz_id']);
        }
        
    }

    function update($param)
    {
        if (isset($_POST['update_question'])) {
            $image = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            move_uploaded_file($image,'public/img/' . $image_name);
            $a = question::find($_POST['question_id'])->first();
            $a->name =  $_POST['name_question'];
            $a->img = $image_name;
            $a->save();
            header("location:" . __URL__ . "admin/question_teacher/$param");
        }
    }

    function delete($id_question, $param)
    {
        Question::destroy($id_question);
        header("location:" . __URL__ . "admin/question_teacher/$param");
    }

    function index($id_quiz)
    {
        $users = user::Where('id', '=', $_SESSION['login']['id'])->get();

        $questions = Question::Where('quiz_id', '=', $id_quiz)->get();

        if (isset($_GET['id_up'])) {
            $question_up = Question::Where('id', '=', $_GET['id_up'])->get();
        }
        // include_once __tc_view__ . "question_gv.php";
        return view('teacher.question_gv', [
            'id_quiz' => $id_quiz,
            'users' => $users,
            'questions' =>  $questions,
            'question_up' => isset($_GET['id_up'])?$question_up:""
        ]);
    }
}
