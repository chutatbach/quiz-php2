@extends('teacher.layout.main')
@section('main')
    <!--Tabla-->
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách quiz</h3>
                    
                    <button class="btn_red">Xóa tất cả theo click <span class="las la-arrow-right">
                        </span></button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>
                                        <div class="card-header"><button>Chọn hết <span class="las la-arrow-right">
                                                </span></button></div>
                                    </td>
                                    <td>Tên quiz</td>
                                    <td>Hạn bắt đầu</td>
                                    <td>Hạn kết thúc</td>
                                    <td>Thời gian</td>
                                    <td>Trạng thái</td>
                                    <td>Chi tiết quiz</td>
                                    <td>Cập nhật</td>
                                    <td>Xóa</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizs as $quiz)
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>Quiz {{$quiz->name }}</td>
                                        <td>{{$quiz->start_time }}</td>
                                        <td>{{$quiz->end_time }}</td>
                                        <td>{{$quiz->duration_minutes }}</td>
                                        <td>{{$quiz->status }}</td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/question_teacher/{{$quiz->id }}">
                                                <button class="btn-blue">
                                                    Chi tiết
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/quiz_teacher/{{ $id_subject }}?id_up={{ $quiz->id }}">
                                                <button class="btn-blue">
                                                    Sửa
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/quiz_teacher/delete/{{ $quiz->id }}/{{ $id_subject }}">
                                                <button class="btn-delete">
                                                    Xóa
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="customers">

            @if (!isset($_GET['id_up'])) :
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm quiz</h3>

                        <button>bách chu<span class="las la-arrow-right">
                            </span></button>
                    </div>

                    <div class="card-body login">
                        <form action="{{__URL__ }}admin/quiz_teacher/insert" method="post" enctype="multipart/form-data">
                            <span class="title_input">Tên quiz</span>
                            <input type="text" placeholder="Tên quiz..." class="input-blue" name="name_quiz">
                            <input type="number" name="subject_id" hidden value="{{$id_subject}}">
                            <span class="title_input">Hạn quiz bắt đầu</span>
                            <input type="datetime-local" placeholder="hạn quiz bắt đầu..." class="input-blue" name="start">
                            <span class="title_input">Hạn quiz kết thúc</span>
                            <input type="datetime-local" placeholder="hạn quiz kết thúc..." class="input-blue" name="end">
                            <span class="title_input">Thời gian làm quiz</span>
                            <input type="number" placeholder="thời gian làm quiz..." class="input-blue" name="time">
                            <span class="title_input">Trang thái</span>
                            <div class="input-blue radio-input">
                                <span> Trạng thái: </span>
                                <span class="status green"></span><span> open </span> <input type="radio" name="status" value="0">
                                <span class="status red"></span> <span> close </span> <input type="radio" name="status" value="1">
                            </div>
                            <span class="title_input">Tráo câu</span>
                            <input type="text" placeholder="tráo trộn quiz..." class="input-blue" name="shuffle">
                            <button type="submit" class="btn-blue" name="insert_quiz">Thêm quiz</button>
                        </form>
                    </div>
                </div>
            @endif


            @if (isset($_GET['id_up'])) 
                @foreach ($quiz_up as $val)
                    <div class="card" style="margin-top: 5%;">
                        <div class="card-header">
                            <h3>Sửa quiz {{$val->name }}</h3>

                            <button>bách chu<span class="las la-arrow-right">
                                </span></button>
                        </div>

                        <div class="card-body login">
                            <form action="{{__URL__ }}admin/quiz_teacher/update/{{$id_subject }}" method="post">
                                <span class="title_input">Tên quiz {{$val->name }}</span>
                                <input type="text" placeholder="Tên quiz..." class="input-blue" name="name_quiz" value="{{$val->name }}">
                                <input type="number" name="quiz_id" hidden value="<?=isset($_GET['id_up']) ? $_GET['id_up'] : ""; ?>">
                                <input type="number" name="subject_id" hidden value="<?=isset($id_subject) ? $id_subject : ""; ?>">
                                <span class="title_input">Hạn quiz bắt đầu</span>
                                <input type="datetime-local" placeholder="hạn quiz bắt đầu..." class="input-blue" name="start" value="{{str_replace(' ', 'T', $val->start_time) }}">
                                <span class="title_input">Hạn quiz kết thúc</span>
                                <input type="datetime-local" placeholder="hạn quiz kết thúc..." class="input-blue" name="end" value="{{str_replace(' ', 'T', $val->start_time) }}">
                                <span class="title_input">Thời gian làm quiz</span>
                                <input type="number" placeholder="thời gian làm quiz..." class="input-blue" name="time" value="{{$val->duration_minutes }}">
                                <span class="title_input">Trang thái</span>
                                <div class="input-blue radio-input">
                                    <span> Trạng thái: </span>
                                    <span class="status green"></span><span> open </span> <input type="radio" name="status" value="0">
                                    <span class="status red"></span> <span> close </span> <input type="radio" name="status" value="1">
                                </div>
                                <span class="title_input">Tráo câu</span>
                                <input type="text" placeholder="tráo trộn quiz..." class="input-blue" value="is_shuffle">
                                <button type="submit" class="btn-blue" name="quiz_update">Sửa quiz</button>
                            </form>
                        </div>
                    </div>
                @endforeach;
            @endif;
        </div>
    </div>
    @endsection