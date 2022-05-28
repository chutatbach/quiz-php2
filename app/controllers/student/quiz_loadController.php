<?php

namespace App\Controllers\student;

use App\Models\Quiz;
use App\Models\User;
use App\Models\student_quiz;

class Quiz_loadController
{
    function index($quiz_id)
    {
        $user = User::Where('id', $_SESSION['login']['id'])->get();
        foreach ($user as $val) {
            $save_name = $val->name;
        }

        $quiz = Quiz::Where('quizs.id', $quiz_id)->get();

        $student_quiz = student_quiz::all();
        foreach ($student_quiz as $quiz_st) :
            if ($quiz_st->student_id == $_SESSION['login']['id'] && $quiz_st->quiz_id == $quiz_id) {
                $kiemtra = true;
                $point = $quiz_st->score;
            }
        endforeach;

        return view('student.quiz_load', [
            'quiz_id' => $quiz_id,
            'user' => $user,
            'kiemtra' => isset($kiemtra) ? $kiemtra : "",
            'student_quiz' => $student_quiz,
            'point' => isset($point) ? $point : "",
            'quiz' => $quiz
        ]);
    }
}
