<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NeuroVida | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">

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

    <script src="assets/js/modernizr/modernizr.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f7; /* Light background for contrast */
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: black; /* Primary blue background */
            border: none; /* Remove border */
            padding: 15px 20px; /* Add padding for a spacious feel */
        }

        .navbar .navbar-brand {
            font-size: 24px; /* Larger brand font size */
            color: #fff; /* White text color */
            font-weight: bold; /* Bold text */
        }

        .navbar .navbar-brand:hover {
            color: #e0e0e0; /* Lighter text on hover */
        }

        .navbar .nav>li>a {
            padding: 15px 20px; /* Consistent link padding */
            color: #fff; /* White text for links */
            transition: background-color 0.3s, color 0.3s; /* Smooth transitions */
        }

        .navbar .nav>li>a:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent hover background */
            color: #fff; /* Keep text white on hover */
        }

        .navbar .nav .active a {
            background-color: rgba(255, 255, 255, 0.2); /* Active link background */
        }

        .navbar .nav .dropdown-menu {
            background-color: #007bff; /* Dropdown background */
        }

        .navbar .nav .dropdown-menu a {
            color: #fff; /* Dropdown link color */
        }

        .navbar .nav .dropdown-menu a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Dropdown hover effect */
        }

        .navbar .navbar-toggle {
            border-color: rgba(255, 255, 255, 0.2); /* Border for toggle button */
        }

        .navbar .navbar-toggle .icon-bar {
            background-color: #fff; /* Toggle button color */
        }

        .errorWrap, .succWrap {
            padding: 15px; /* Increased padding */
            margin: 20px 0; /* Consistent margin */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .errorWrap {
            background: #fff;
            border-left: 4px solid #dd3d36; /* Error color */
            color: #dd3d36; /* Text color */
        }

        .succWrap {
            background: #fff;
            border-left: 4px solid #5cb85c; /* Success color */
            color: #5cb85c; /* Text color */
        }

        /* Button styles */
        .btn {
            border-radius: 5px; /* Rounded buttons */
            transition: background-color 0.3s, color 0.3s; /* Smooth transitions */
            font-weight: bold; /* Bold text */
        }

        .btn-primary {
            background-color: #0056b3; /* Darker primary button color */
            color: #fff; /* Text color */
        }

        .btn-primary:hover {
            background-color: #004494; /* Even darker on hover */
        }
    </style>
</head>

<body class="top-navbar-fixed">
    <div id="page"></div>
    <div id="loading"></div>

    <div class="main-wrapper">
        <nav class="navbar top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <a class="navbar-brand" href="#" target="_blank">NeuroVida</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- /.navbar-header -->

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
                        </ul>
                        <!-- /.nav navbar-nav -->

                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="logout.php" class="text-center"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
                            </li>
                        </ul>
                        <!-- /.nav navbar-nav navbar-right -->
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Rest of your content goes here -->
    </div>
</body>
</html>
