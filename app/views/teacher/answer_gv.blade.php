@extends('teacher.layout.main')
@section('main')
    <!--Tabla-->
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Câu trả lời</h3>

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
                                    <td>câu trả lời</td>
                                    <td>Ảnh</td>
                                    <td>Trạng thái</td>
                                    <td>Chi tiết câu trả lời</td>
                                    <td>Cập nhật</td>
                                    <td>Xóa</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($answers as $answer) 
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>{{ $answer->content }}</td>
                                        <td><img src="{{ __IMG__ . $answer->img }}" width="100px" alt=""></td>
                                        <td><span class="status {{ $answer->is_correct == 0 ? "green" : "red" }}"></span><span> {{ $answer->is_correct == 0 ? "true" : "false" }} </span></td>
                                        <td>
                                            <a href="{{ __URL__ . 'admin/answer_teacher/'.$id_question . '?id_up=' . $answer->id }}">
                                                <button class="btn-blue">
                                                    Sửa
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ $answer->id }}">
                                                <button class="btn-blue">
                                                    Chi tiết
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/answer_teacher/delete/{{ $answer->id }}/{{ $id_question }}">
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
            @if (!isset($_GET['id_up']))
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm câu hỏi</h3>

                        <button>bách chu<span class="las la-arrow-right">
                            </span></button>
                    </div>

                    <div class="card-body login">
                        <form action="{{ __URL__ }}admin/answer_teacher/insert" method="post" enctype="multipart/form-data">
                            <span class="title_input">nội dung câu trả lời</span>
                            <input type="text" placeholder="câu trả lời..." class="input-blue" name="content">
                            <input type="number" name="question_id" hidden value="{{ $id_question }}">
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
            @endif

            @if (isset($_GET['id_up'])) :
                @foreach ($answer_up as $val)
                    <div class="card" style="margin-top: 5%;">
                        <div class="card-header">
                            <h3>Sửa câu trả lời {{ $val->content }}</h3>

                            <button>bách chu<span class="las la-arrow-right">
                                </span></button>
                        </div>

                        <div class="card-body login">
                            <form action="{{ __URL__ }}admin/answer_teacher/update/{{$id_question}}" method="post" enctype="multipart/form-data">
                                <span class="title_input">nội dung câu trả lời</span>
                                <input type="text" placeholder="câu trả lời..." class="input-blue" name="content" value="{{ $val->content }}">
                                <input type="number" name="question_id" hidden value="{{ $id_question }}">
                                <input type="number" name="answer_id" hidden value="{{ $_GET['id_up'] }}">
                                <span class="title_input">ảnh câu trả lời</span>
                                <input type="file" class="input-blue" name="image">
                                <span class="title_input">ảnh</span>
                                <img src="{{ __IMG__ . $val->img }}" alt="" width="100px">
                                <span class="title_input">Trang thái</span>
                                <div class="input-blue radio-input">
                                    <span> Trạng thái: </span>
                                    <span class="status green"></span><span> Đúng </span> <input type="radio" name="is_correct" name="radio" value="0">
                                    <span class="status red"></span> <span> Sai </span> <input type="radio" name="is_correct" name="radio" value="1">
                                </div>
                                <button type="submit" class="btn-blue" name="update_answer">Sửa câu trả lời</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
    @endsection