<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= __URL__.'public/'?>css/st.css">
</head>

<body>
    <?php foreach($user as $use):?>
    <nav class="navbar navbar-expand-sm bg-white">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
            <img src="<?=__IMG__?>logo-fpt-polytechnic-inkythuatso-09-13-08-21.jpg" alt="logo" style="width: 120px;">
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="d-flex justify-content-between w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?=$use->name?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Tài khoản của tôi</a>
                            <a class="dropdown-item" href="<?=__URL__?>login-resiter/logout">Đăng xuất</a>
                        </div>
                    </li>
                </ul>


                <form class="form-inline">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <?php endforeach;?>

    {{-- main --}}
    @yield('main')
 {{-- main --}}

</body>
@yield('page-script')
</html>
