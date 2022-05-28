<?php

namespace App\Controllers\teacher;

use App\Models\Subject;
use App\Models\user;

class Subject_gvController
{
    function insert()
    {
        if (isset($_POST['add-subject'])) {
            // Subject::create([
            //     'name' => $_POST['subject_name'],
            //     'author_id' => $_POST['id_author'],
            // ]);
            $subject = new Subject();
            $subject->name = $_POST['subject_name'];
            $subject->author_id = $_POST['id_author'];
            $subject->save();
            header("location:" . __URL__ . "admin/subject_teacher");
        }
    }

    function update()
    {

        if (isset($_POST['update-subject'])) {
            $a = Subject::find($_POST['subject_id'])->first();
            $a->name = $_POST['name'];
            $a->save();
            header("location:" . __URL__ . "admin/subject_teacher");
        } else {
            header("location:" . __URL__ . "admin/subject_teacher");
        }
    }

    function delete($id_subject, $permanance = false)
    {
        if ($permanance == false) {
            Subject::destroy($id_subject);
            header("location:" . __URL__ . "admin/subject_teacher");
        } else {
            header("location:" . __URL__ . "admin/subject_teacher");
        }
    }

    function index()
    {
        $users = user::Where('id', '=', $_SESSION['login']['id'])->get();

        $subjects = Subject::Where('author_id', '=', $_SESSION['login']['id'])->get();

        if (isset($_GET['id_up'])) {
            $subjects_up = Subject::Where('id', $_GET['id_up'])->get();
        }

        // include_once __tc_view__ . "subject_gv.blade.php";
        return view('teacher.subject_gv', [
            'users' => $users,
            'subjects' => $subjects, //de view su dung data nay (key la ten bien)
            'subjects_up' => isset($_GET['id_up'])?$subjects_up:''
        ]);
    }
}
