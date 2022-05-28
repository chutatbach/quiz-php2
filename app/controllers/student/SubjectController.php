<?php

namespace App\Controllers\student;

use App\Models\Subject; // object in namespace
use App\Models\user;
class SubjectController
{

    function index()
    {
        $user = user::Where('id', $_SESSION['login']['id'])->get();
        $subjects = Subject::all();
        
        // include_once __st_view__ . "subject.php";
        return view('student.subject',[
            'user' => $user,
            'subjects' => $subjects,
        ]);
    }
}
