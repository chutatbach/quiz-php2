<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ __URL__ . 'public/'}}css/tc.css">

    <style>
        .add_answer {
            position: fixed;
            top: 30%;
            background-color: #98ffd9;
            color: black;
            width: 50%;
            height: 50%;
            opacity: 0;
            z-index: -1;
            transition: 0.3s;
        }
    </style>
</head>

<body>
    @foreach ($users as $user)
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class="las la-clinic-medical"></span> <span>Hospital</span></h2>
            </div>
            <!--Secciones-del-tablero-->
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{__URL__ . 'point_student' }}"><span class="las la-home"></span>
                            <span>Thông tin</span></a>
                    </li>
                    <li>
                        <a href="" class="active"><span class="las la-stethoscope"></span>
                            <span>Môn học</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{__URL__ }}login-resiter/logout"><span class="las la-user-injured">
                                Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label> Tablero
                </h2>

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Buscar aquí" />
                </div>
                <div class="user-wrapper">

                    <img src="{{ __IMG__ . $user->avatar }}" width="40px" height="40px" alt="">
                    <div>
                        <h4>{{$user->name }}</h4>
                        <small>Super Admin</small>
                    </div>

                </div>
            </header>
        @endforeach
        <main>
            <!--Tabla-->
            <div class="">
                <a href="{{ __URL__ . "admin/subject_teacher" }}">Môn học</a>
                <?php
                // if (isset($_GET['subject_id'])) {
                //     $_SESSION['id_link']['subject'] = $_GET['subject_id'];
                //     unset($_SESSION['id_link']['quiz'], $_SESSION['id_link']['question']);
                // } else if (isset($_GET['quiz_id'])) {
                //     $_SESSION['id_link']['quiz'] = $_GET['quiz_id'];
                //     unset($_SESSION['id_link']['question']);
                // } else if (isset($_GET['question_id'])) {
                //     $_SESSION['id_link']['question'] = $_GET['question_id'];
                // } else {
                //     unset($_SESSION['id_link']);
                // }
                ?>

                <?php

                // if (isset($_SESSION['id_link']['subject'])) {
                //     echo "<a href='" . __URL__ . "admin/quiz_teacher?subject_id=" . $_SESSION['id_link']['subject'] . "'>>>Quiz</a>";
                // }
                // if (isset($_SESSION['id_link']['quiz'])) {
                //     echo "<a href='" . __URL__ . "admin/question_teacher?quiz_id=" .  $_SESSION['id_link']['quiz'] . "'>>>Question</a>";
                // }
                // if (isset($_SESSION['id_link']['question'])) {
                //     echo "<a href='" . __URL__ . "admin/answer_teacher?question_id=" . $_SESSION['id_link']['question'] . "'>>>Answer</a>";
                // }
                ?>
            </div>
            <!-- main -->
            @yield('main')
            <!-- end main -->
        </main>
        </div>
</body>

</html>