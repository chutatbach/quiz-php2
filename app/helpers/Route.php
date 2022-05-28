<?php

namespace App\helpers;

use App\Controllers\LoginController;
use App\Controllers\student\SubjectController;
use App\controllers\student\QuizController;
use App\controllers\student\quiz_loadController;
use App\controllers\student\question_answerController;

use App\controllers\teacher\Subject_gvController;
use App\controllers\teacher\Quiz_gvController;
use App\controllers\teacher\Question_gvController;
use App\controllers\teacher\Answer_gvController;
use App\controllers\teacher\thongke;

use \Phroute\Phroute\RouteCollector;

class Route
{
    public static function run($url)
    {
        $router = new RouteCollector();
        // $router->get("/",function(){
        //     return "hello";
        // });


        $router->filter('alo', function () {
            if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
                header("location:" . __URL__ . "login-resiter");
            }
        });


        $router->get("", [LoginController::class, 'index']);
        //-----------------------login--------------------//
        $router->group(['prefix' => 'login-resiter'], function ($router) {
            $router->get("", [LoginController::class, 'index']);
            $router->post("insert", [LoginController::class, 'register']);
            $router->post("save", [LoginController::class, 'login']);
            $router->any("logout", [LoginController::class, 'logout']);
        });
        //-----------------------user--------------------//
        $router->group(['prefix' => 'user', 'before' => 'alo'], function ($router) { //nhom cac tien to o dau duong dan 
            $router->get("/", [SubjectController::class, 'index']);
            $router->get("subject_student", [SubjectController::class, 'index']);
            $router->get("quiz_student/{subject_id}", [QuizController::class, 'index']);
            $router->get("quiz_load_student/{quiz_id}", [quiz_loadController::class, 'index']);
            $router->get("question_answer_student/{quiz_id}", [question_answerController::class, 'index']);
            $router->post("question_answer_student/insert", [question_answerController::class, 'insert']);
        });

        //---------------------admin----------------------//
        $router->group(['prefix' => 'admin', 'before' => 'alo'], function ($router) {

            $router->group(['prefix' => 'subject_teacher'], function ($router) {
                $router->get("", [Subject_gvController::class, 'index']);
                $router->post("insert", [Subject_gvController::class, 'insert']);
                $router->post("update", [Subject_gvController::class, 'update']);
                $router->get("delete/{id_subject}", [Subject_gvController::class, 'delete']);
            });
            //------
            $router->group(['prefix' => 'quiz_teacher', 'before' => 'alo'], function ($router) {
                $router->get("{id_subject}", [Quiz_gvController::class, 'index']);
                $router->post("insert", [Quiz_gvController::class, 'insert']);
                $router->post("update/{param}", [Quiz_gvController::class, 'update']);
                $router->get("delete/{id_quiz}/{param}", [Quiz_gvController::class, 'delete']);
            });
            //------
            $router->group(['prefix' => 'question_teacher', 'before' => 'alo'], function ($router) {
                $router->get("{id_quiz}", [Question_gvController::class, 'index']);
                $router->post("insert", [Question_gvController::class, 'insert']);
                $router->post("update/{param}", [Question_gvController::class, 'update']);
                $router->get("delete/{id_question}/{param}", [Question_gvController::class, 'delete']);
            });
            //------
            $router->group(['prefix' => 'answer_teacher', 'before' => 'alo'], function ($router) {
                $router->get("{id_question}", [Answer_gvController::class, 'index']);
                $router->post("insert", [Answer_gvController::class, 'insert']);
                $router->post("update/{param}", [Answer_gvController::class, 'update']);
                $router->get("delete/{id_answer}/{param}", [Answer_gvController::class, 'delete']);
            });
        });

        //thong ke
        $router->get("point_student", [thongke::class, 'index']);

        # NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
        $dispatcher = new \Phroute\Phroute\Dispatcher($router->getData());

        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));

        // Print out the value returned from the dispatched function
        echo $response;
    }
}
