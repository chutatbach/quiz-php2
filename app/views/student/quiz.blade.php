@extends('student.layout.main')
@section('main')
    <main class="container mt-5 card p-3">
        <div class="main__title">
            <i class="ti-bookmark-alt"></i>
            <span class=""><?=$save_name?></span>
        </div>
        <?php foreach ($quizs as $quiz) : ?>
            <div class="btn d-flex mt-3">

                <div class="">
                    <i class="ti-angle-right"></i>
                </div>
                <div class="mx-3">
                    <a href="<?=__URL__.'user/quiz_load_student/'.$quiz->id?>">
                        <span>Quiz <?= $quiz->name ?></span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
    @endsection