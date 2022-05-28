@extends('student.layout.main')
@section('main')
    <main class="container mt-5">
        <div class="main__title">
            <span class="">My Courses</span>
        </div>
        <div class="mt-3">
        <?php foreach($subjects as $subject):?>
            <div class="card d-flex flex-row justify-content-between mt-3">
                <div class="d-flex mx-5">
                    <a href="">
                        <img src="<?=__IMG__?>asset-v1_FPOLY+ENT1225+2022_SP+type@asset+block@Por-que-devo-aprender-inglês.jpg"
                            alt="" class="" width="250px">
                    </a>
                    <div class="d-flex flex-column mt-3 mx-3">
                        <span class="title">{{$subject->user->name}}</span>
                        <span>{{$subject->name}}</span>
                        <span class="date">Started - Jan 3, 2022</span>
                    </div>
                </div>
                <div class="d-flex align-items-center mx-5">
                    <div class="mx-3">
                        <i class="ti-settings"></i>
                    </div>
                    <a href="{{__URL__.'user/quiz_student/'.$subject->id}}" class="btn btn-outline-primary">
                        <span class="">View Course</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
    @endsection
