<?php

namespace App\Controllers\student;

use App\Models\Question;
use App\Models\Answer;
use App\Models\student_quiz;
use App\Models\quiz;

class question_answerController
{
    public function answer($question_id)
    {
        $answers = Answer::Where('question_id', $question_id)
            ->get();
        return $answers;
    }

    public function insert()
    {
        $model_studen_quiz = new student_quiz();


        if (isset($_POST['submit'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $quiz_id = $_POST['quiz_id'];
            $_SESSION['start_time'] = date('y-m-d h:i:s');
            $end_time = date('y-m-d h:i:s');
            $score = 0;

            $question_id = $_POST['question_id'];
            foreach ($question_id as $key => $questionid) :
                $tong[$key] = "$key";
                if (isset($_POST["answer_" . $questionid])) :
                    if ($_POST["answer_" . $questionid] == 1) {
                        $score++;
                    }
                endif;
            endforeach;

            $score = round(($score / count($tong)) * 10, 2);
            echo  $score;

            $model_studen_quiz::create([
                'student_id' => $_SESSION['login']['id'],
                'quiz_id' => $quiz_id,
                'start_time' =>  $_SESSION['start_time'],
                'end_time' => $end_time,
                'score' => $score
            ]);
        }
        header('location:' . __URL__ . 'user/quiz_load_student/' . $_POST['quiz_id']);
    }

    function index($quiz_id)
    {
        $user = Question::Where('id', $_SESSION['login']['id'],)
            ->get();
        foreach ($user as $val) {
            $save_name = $val->name;
        }
        $quizs =  quiz::Where('id', $quiz_id)->get();
        $i = 1;
        $questions = Question::Where('quiz_id', $quiz_id)
            ->get();
        $arr = [];
        foreach ($questions as $id) {
            $arr[$id->id] = $this->answer($id->id);
        }

        // var_dump($arr);
        return view('student.question_answer', [
            'i' => $i ,
            'quiz_id' =>  $quiz_id,
            'user' => $user,
            'quizs' => $quizs,
            'arr' => $arr,
            'questions' => $questions,
            'save_name' => $save_name
        ]);
        // include_once __st_view__ . "question_answer.php";
    }
}
