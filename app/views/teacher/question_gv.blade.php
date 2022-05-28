<!--Tabla-->
@extends('teacher.layout.main')
@section('main')
<div class="add_answer">
    <div class="card">
        <div class="card-header">
            <h3>Thêm câu trả lời</h3>

            <button>bách chu<span class="las la-arrow-right">
                </span></button>
        </div>

        <div class="card-body login">
            <form action="{{ __URL__ }}admin/answer_teacher/insert" method="post" enctype="multipart/form-data">
                <span class="title_input">nội dung câu trả lời</span>
                <input type="text" placeholder="câu trả lời..." class="input-blue" name="content">
                <input type="number" name="question_id" hidden value="{{ $_GET['question_id'] }}">
                <span class="title_input">ảnh câu trả lời</span>
                <input type="file" class="input-blue" name="image">
                <span class="title_input">Trang thái</span>
                <div class="input-blue radio-input">
                    <span> Trạng thái: </span>
                    <span class="status green"></span><span> Đúng </span> <input type="radio" name="is_correct" value="0">
                    <span class="status red"></span> <span> Sai </span> <input type="radio" name="is_correct" value="1">
                </div>
                <button type="submit" class="btn-blue" name="add_aswer">Thêm câu trả lời</button>
            </form>
        </div>
    </div>
</div>
<td>
    <button class="btn-delete start_add_answer">
        Thêm câu trả lời
    </button>

<td>
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách câu hỏi</h3>

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
                                    <td>câu hỏi</td>
                                    <td>Ảnh</td>
                                    <td>Chi tiết câu hỏi</td>
                                    <!-- <td>Add answer</td> -->
                                    <td>Cập nhật</td>
                                    <td>Xóa</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>{{ $question->name }}</td>
                                        <td><img src="{{__IMG__ . $question->img }}" width="100px" alt=""></td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/answer_teacher/{{ $question->id }}">
                                                <button class="btn-blue">
                                                    Chi tiết
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/question_teacher/{{ $id_quiz }}?id_up={{ $question->id }}">
                                                <button class="btn-blue">
                                                    Sửa
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/question_teacher/delete/{{ $question->id }}/{{ $id_quiz }}">
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
                        <h3>Thêm câu hỏi</h3>

                        <button>Thêm ô nhập câu hỏi<span class="las la-arrow-right">
                            </span></button>
                    </div>
                    <div class="card-body login">
                        <form action="{{ __URL__ }}admin/question_teacher/insert" method="post" enctype="multipart/form-data">
                            <!-- <div class=""> -->
                                <span class="card-header">thêm 1 câu hỏi</span>
                                <span class="title_input">Tiêu đề câu hỏi</span>
                                <input type="text" placeholder="Tên quiz..." class="input-blue" name="name_question">
                                <input type="number" name="quiz_id" hidden value="{{$id_quiz}}">
                                <span class="title_input">ảnh câu hỏi</span>
                                <input type="file" class="input-blue" name="image">
                            <!-- </div> -->
                            <button type="submit" name="submit" class="btn-blue">Thêm câu hỏi</button>
                        </form>
                    </div>
                </div>
            @endif

            @if (isset($_GET['id_up']))
                @foreach ($question_up as $val)
                    <div class="card" style="margin-top: 5%;">
                        <div class="card-header">
                            <h3>Sửa câu hỏi {{ $val->name }}</h3>

                            <button>bách chu<span class="las la-arrow-right">
                                </span></button>
                        </div>

                        <div class="card-body login">
                            <form action="{{ __URL__ }}admin/question_teacher/update/{{$id_quiz}}" method="post" enctype="multipart/form-data">

                                <span class="title_input">Tiêu đề câu hỏi</span>
                                <input type="text" placeholder="Tên câu hỏi..." class="input-blue" name="name_question" value="{{ $val->name }}">
                                <input type="number" name="quiz_id" hidden value="{{ isset($_GET['quiz_id']) ? $_GET['quiz_id'] : '' }}">
                                <input type="number" name="question_id" hidden value="{{ $val->id }}">
                                <span class="title_input">ảnh câu hỏi</span>
                                <input type="file" class="input-blue" name="image">
                                <span class="title_input">ảnh</span>
                                <img src="{{ __IMG__ . $val->img }}" alt="" width="100px">
                                <button type="submit" class="btn-blue" name="update_question">sửa câu hỏi</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
  @endsection