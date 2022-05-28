@extends('teacher.layout.main')
@section('main')
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách môn học</h3>

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
                                    <td>Môn học</td>
                                    <td>Chi tiết môn học</td>
                                    <td>Sửa</td>
                                    <td>Xóa</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>{{$subject->name}}</td>
                                        <td>
                                            <a href="{{__URL__ }}admin/quiz_teacher/{{$subject->id }}">
                                                <button class="btn-blue">
                                                    Chi tiết
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/subject_teacher?id_up={{ $subject->id }}">
                                                <button class="btn-blue">
                                                    Sửa
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ __URL__ }}admin/subject_teacher/delete/{{$subject->id }}">
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
            @foreach ($users as $item)
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm môn học</h3>

                        <button>bách chu<span class="las la-arrow-right">
                            </span></button>
                    </div>

                    <div class="card-body login">
                        <form action="{{ __URL__ }}admin/subject_teacher/insert" method="post" enctype="multipart/form-data">
                            <span class="title_input">Tên môn học</span>
                            <input type="text" name="subject_name" placeholder="Tên môn học..." class="input-blue">
                            <input type="number" name="id_author" hidden value="{{$item->id }}">
                            <button type="submit" name="add-subject" class="btn-blue">Thêm môn học</button>
                        </form>
                    </div>
                </div>
                @endforeach
            @endif

            @if (isset($_GET['id_up']))
                @foreach ($subjects_up as $val)
                    <div class="card" style="margin-top: 5%;">
                        <div class="card-header">
                            <h3>Sửa môn học: <?= $val->name ?></h3>
                            <button>bách chu<span class="las la-arrow-right">
                                </span></button>
                        </div>

                        <div class="card-body login">
                            <form action="{{ __URL__ }}admin/subject_teacher/update" method="post">
                                <span class="title_input">Tên môn học</span>
                                <input type="text" placeholder="Tên môn học..." name="name" class="input-blue" value="<?= $val->name ?>">
                                <input type="number" name="subject_id" hidden value="{{ isset($_GET['id_up']) ? $_GET['id_up'] : "" }}">
                                <button type="submit" class="btn-blue" name="update-subject">Sửa tên môn học</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
