<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ __URL__.'public/'}}css/login.css">
</head>
<body>
    <div class="mainForm">

        <form action="{{__URL__}}login-resiter/save" method="POST" class="form form--login">
            <h3 class="heading">Thành viên đăng nhập</h3>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>
            <button class="form-submit" type="submit" name="login">Đăng nhập</button>
            <div class="form-link">
                <span class="btn btn--register">Chuyển qua đăng ký</span>
            </div>
        </form>
        
        <form action="{{__URL__}}login-resiter/insert" method="POST" class="form form--register" enctype="multipart/form-data">
            <h3 class="heading">Thành viên đăng ký</h3>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name_dk" name="name" type="text" placeholder="VD:Chu tat bach" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email_dk" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password_dk" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Chọn ảnh</label>
                <input id="image" name="avatar" type="file" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group-avatar">
            </div>
            
            <button class="form-submit" type="submit" name="register">Đăng ký</button>
            <div class="form-link">
                <span class="btn btn--login">Chuyển qua đăng nhập</span>
            </div>
        </form>

    </div>

</body>
<script src="<?=__JS__?>khaibao.js"></script>
<script src="<?=__JS__?>lg-dk.js"></script>
<script src="<?=__JS__?>filter.js"></script>
</html>