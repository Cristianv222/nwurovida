<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NeuroVida | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="assets/css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="assets/css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="assets/css/main.css" media="screen">
    <link rel="stylesheet" href="assets/css/prism/prism.css" media="screen">

    <!-- Scripts -->
    <script src="assets/js/modernizr/modernizr.min.js"></script>

    <!-- Inline CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: black;
            border: none;
            padding: 15px 20px;
        }

        .navbar .navbar-brand {
            font-size: 24px;
            color: #fff;
            font-weight: bold;
        }

        .navbar .navbar-brand:hover {
            color: #e0e0e0;
        }

        .navbar .nav>li>a {
            padding: 15px 20px;
            color: #fff;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar .nav>li>a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .navbar .nav .active a {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .navbar .nav .dropdown-menu {
            background-color: #007bff;
        }

        .navbar .nav .dropdown-menu a {
            color: #fff;
        }

        .navbar .nav .dropdown-menu a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .navbar .navbar-toggle {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .navbar .navbar-toggle .icon-bar {
            background-color: #fff;
        }

        .errorWrap,
        .succWrap {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .errorWrap {
            background: #fff;
            border-left: 4px solid #dd3d36;
            color: #dd3d36;
        }

        .succWrap {
            background: #fff;
            border-left: 4px solid #5cb85c;
            color: #5cb85c;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #0056b3;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #004494;
        }
    </style>
</head>

<body class="top-navbar-fixed">
    <div id="page"></div>
    <div id="loading"></div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Top Navbar -->
        <nav class="navbar top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <!-- Brand Name -->
                        <a class="navbar-brand" href="#" target="_blank">NeuroVida</a>

                        <!-- Toggle Buttons for Mobile -->

                        <button type="button" class="navbar-toggle collapsed mobile-nav-toggle" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>
                    </div>
                    <!-- /.navbar-header -->

                    <!-- Navbar Collapse -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
                        </ul>

                        <!-- Right Navbar Links -->
                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="logout.php" class="text-center"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- End Top Navbar -->

        <!-- Rest of your content goes here -->
    </div>
</body>

</html>