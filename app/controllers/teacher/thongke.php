<?php
namespace App\controllers\teacher;
use App\Models\User;
use App\Models\Subject;
class thongke{
    function index(){

        $users = User::rawQuery("SELECT * FROM users")
        ->Where([
            'id', '=', $_SESSION['login']['id'],
        ])
        ->get();
        $id = $_GET['subject_id'];
        $quizs = Subject::rawQuery("
        SELECT student_quizs.quiz_id,quizs.`name`,COUNT(student_quizs.student_id) as so_hs, ROUND(AVG(student_quizs.score),1) as diem_tb  FROM student_quizs 
        INNER JOIN quizs ON quizs.id = student_quizs.quiz_id AND quizs.subject_id = $id
        GROUP BY student_quizs.quiz_id
        ")->get();

        include_once __tc_view__ . "header_footer/header.php";
        include_once __tc_view__ . "student_point.php";
        include_once __tc_view__ . "header_footer/footer.php";
    }
}
?>