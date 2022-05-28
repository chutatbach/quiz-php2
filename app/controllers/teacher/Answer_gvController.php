<?php

namespace App\Controllers\teacher;

use App\Models\answer;
use App\Models\Question;
use App\Models\User;

class Answer_gvController
{

    function insert()
    {
        if (isset($_POST['add_aswer'])) {
            $image = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            move_uploaded_file($image, 'public/img/' . $image_name);
            answer::create([
                'content' => $_POST['content'],
                'question_id' => $_POST['question_id'],
                'is_correct' => $_POST['is_correct'],
                'img' => $image_name,
            ]);
            header("location:" . __URL__ . "admin/answer_teacher/" . $_POST['question_id']);
        }
    }
    function update($param)
    {
        if (isset($_POST['update_answer'])) {
            $image = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            move_uploaded_file($image, 'public/img/' . $image_name);
            $a = answer::find($_POST['answer_id'])->first();
            $a->content =  $_POST['content'];
            $a->is_correct = $_POST['is_correct'];
            $a->img = $image_name;
            $a->save();
            header("location:" . __URL__ . "admin/answer_teacher/$param");
        }
    }
    function delete($id_answer, $param)
    {
        answer::destroy($id_answer);
        header("location:" . __URL__ . "admin/answer_teacher/$param");
    }
    function index($id_question)
    {
        $users = User::Where('id', '=', $_SESSION['login']['id'])->get();
        $answers = answer::Where('question_id', '=', $id_question)->get();
        if (isset($_GET['id_up'])) {
            $answer_up = answer::Where('id', '=', $_GET['id_up'])->get();
        }
        // include_once __tc_view__ . "answer_gv.php";
        return view('teacher.Answer_gv', [
            'id_question' => $id_question,
            'users' => $users,
            'answers' => $answers,
            'answer_up' => isset($_GET['id_up']) ? $answer_up : ''
        ]);
    }
}
