<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>M.Quizzes || SUMMARY </title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js" type="text/javascript"></script>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>



    <script>
        $(function () {
            $(document).on('scroll', function () {
                console.log('scroll top : ' + $(window).scrollTop());
                if ($(window).scrollTop() >= $(".logo").height()) {
                    $(".navbar").addClass("navbar-fixed-top");
                }

                if ($(window).scrollTop() < $(".logo").height()) {
                    $(".navbar").removeClass("navbar-fixed-top");
                }
            });
        });</script>
</head>
<body style="background:#eee;">
<div class="header">
    <div class="row">
        <div class="col-lg-6">
            <span class="logo">M.Quizzes</span>
        </div>
    </div>
</div>
<!-- header close-->
<!--navigation menu-->
<nav class="navbar navbar-default title1">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>><a href="dash.php?q=0">Home<span
                                class="sr-only">(current)</span></a></li>
                <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="dash.php?q=1">User</a></li>
                <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
                <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>
                <li class="dropdown <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo 'active"'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Quiz<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="dash.php?q=4">Add Quiz</a></li>
                        <li><a href="dash.php?q=5">Remove Quiz</a></li>
                    </ul>
            </ul>
            <?php
            include_once 'dbConnection.php';
            session_start();
            $email = $_SESSION['email'];
            if (!(isset($_SESSION['email']))) {
                header("location:index.php");

            } else {
                $name = $_SESSION['name'];;

                include_once 'dbConnection.php';
                echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;</span> <a href="dash.php" class="log log1">' . $name . '</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
            } ?>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->

<div class="container">
    <div class="row">
        <form action="file_upbox.php" method="post" enctype="multipart/form-data" >
            <h3>Upload File</h3>
            <input type="file" name="myfile"> <br>
            <button type="submit" name="save">upload</button>
        </form>
    </div>
</div>
<?php if (@$_GET['summary'] == 1) {
    $eid = @$_GET['eid'];
    $qid = @$_GET['qid'];
    $email = @$_GET['email'];
    $optionid = @$_GET['optionid'];
    ?>
</body>
</html>