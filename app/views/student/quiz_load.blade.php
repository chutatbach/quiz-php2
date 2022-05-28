@extends('student.layout.main')
@section('main') 
@foreach ($quiz as $val) :
    <main class="container mt-5 card p-3">
        <div class="main__title">
            <i class="ti-bookmark-alt"></i>
            <span class="">Môn: <?= $val->subject->name ?></span>
        </div>
        <div class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Success!</strong> Quiz đã mở, học sinh vào làm trước khi hết thời gian
        </div>
        <div class="card">
            @if (isset($kiemtra))
                <a href="" class="btn">
                    Hiện kết quả của bài kiểm tra
                </a>
            @endif
        </div>
        <div class="btn d-flex flex-column align-items-start mt-3">
            @if ($kiemtra != true)
                <a href="<?= __URL__ . 'user/question_answer_student/' . $quiz_id ?>" class="btn btn-success">
                    Làm bài kiểm tra
                </a>
            @endif


            <div class="main__title">
                <span class="text-primary">Thuộc tính chung</span>
            </div>

            <div class="">
                <div class="">
                    <span class="title-quiz">Tác giả</span>
                    <span class="mx-3"><?= $val->subject->user->name ?> (FPOLY HN)</span>
                </div>
                <div class="d-flex">
                    <span class="title-quiz">Tiêu đề</span>
                    <span class="mx-3">Quiz <?= $val->name ?></span>
                </div>
                <div class="d-flex align-items-center">
                    <span class="title-quiz">Điểm</span>
                    <span class="mx-3"><?php if (isset($kiemtra)) { ?>
                            <a href="" class="btn">
                                <?= $point ?>
                            </a>
                        <?php } else {
                                            echo "bạn chưa làm bài";
                                        } ?>
                    </span>
                </div>
            </div>
        </div>
    </main>
@endforeach
@endsection