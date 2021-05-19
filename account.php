<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>M.Quizzes || STUDENT</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>


    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <!--alert message-->
    <?php if (@$_GET['w']) {
        echo '<script>alert("' . @$_GET['w'] . '");</script>';
    }
    ?>
    <!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
    <div class="row">
        <div class="col-lg-6">
            <span class="logo">M.Quizzes</span></div>
    </div>
</div>
<div class="bg">

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
                    <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?> ><a href="account.php?q=1"><span
                                    class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span
                                    class="sr-only">(current)</span></a></li>
                    <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="account.php?q=2"><span
                                    class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a>
                    </li>
                    <!--		<li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>-->
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
    </nav><!--navigation menu closed-->
    <div class="container"><!--container start-->
        <div class="row">
            <div class="col-md-12">

                <!--home start-->
                <?php if (@$_GET['q'] == 1) {

                    $result = mysqli_query($con, "SELECT * FROM quiz WHERE status=true ORDER BY date DESC") or die('Error');
                    echo '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><td></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['sahi'];
                        $time = $row['time'];
                        $eid = $row['eid'];
                        $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
                        $rowcount = mysqli_num_rows($q12);

                        if ($rowcount == 0) {
                            echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td>
	<td><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1"style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1" ><b>Start</b></span></a></b></td></tr>';


                        } else {
                            echo '<tr style="color:#99cc32"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td>
	<td><b><a href="update.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;
	<span class="title1"><b>Restart</b></span></a></b></td></tr>';
                        }

                    }
                    $c = 0;
                    echo '</table></div></div>';

                } ?>

                <!--timer added-->

                <div class="col-lg-12">


                    <script>
                        var seconds = 120;

                        function secondPassed() {

                            var minutes = Math.round((seconds - 30) / 60);
                            var remainingSeconds = seconds % 60;
                            if (remainingSeconds < 10) {
                                remainingSeconds = "0" + remainingSeconds;
                            }
                            document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;

                            if (seconds == 0) {
                                clearInterval(countdownTimer);
                                document.getElementById('countdown').innerHTML = "** - Time is over - **";
                            } else {
                                seconds--;
                            }

                        }

                        var countdownTimer = setInterval('secondPassed()', 1000);

                    </script>
                </div>
                <!--home closed-->


                <!--quiz start-->
                <?php

                if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
                    $eid = @$_GET['eid'];
                    $sn = @$_GET['n'];
                    $total = @$_GET['t'];
                    $opt = @$_GET['opt'];
                    $option = @$_GET['option'];

                    $exty = mysqli_query($con, "SELECT Qst FROM questions WHERE eid='$eid' AND sn='$sn' ");
                    while ($row = mysqli_fetch_array($exty)) {
                        $Qst = $row['Qst'];
//                  echo '<b>Qst.' . $Qst . '</b><br /><br />';
                    }
//                    Unlock question
                    if ($Qst == 'A') {

                        $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
                        echo '<div class="panel" style="margin:5%">';
                        while ($row = mysqli_fetch_array($q)) {
                            $qns = $row['qns'];
                            $qid = $row['qid'];

                            echo '<b>Question &nbsp;' . $sn . '&nbsp;::<br />' . $qns . '</b><br /><br />';

                        }
                        $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");

                        //  get question , option id
                        //get option id
                        //$opt = $row['optionid'];
//                     $qns = 0;
//                     $opt = 0;

                        $z = mysqli_query($con, "SELECT qns FROM questions WHERE eid='$eid' AND qid='$qid' ");
                        $x = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid'");

                        //   $opnum = [' (1) ', ' (2) ', ' (3) ', ' (4) ', ' (5) ',];
                        $p = 0;

                        while ($row = mysqli_fetch_array($x)) {
                            $opt = $row['optionid'];
                            $option = $row['option'];

                            // echo $opt;
                            // echo $opnum[$p];
                            //    echo $opnum[$x[$p]];
                            // echo $option

                            if ($row = mysqli_fetch_array($x) == 2) {
                                $opt = $row['optionid'];
                                break;
                            }
//                           $p++;

                            $x++;
                            // echo $option;
                        }
                        //  $x++;

                        while ($row = mysqli_fetch_array($z)) {
                            $qns = $row['qns'];
//                        echo "$qns<br><br>";
                        }
                        $z++;


                        echo '<span id="countdown" class="timer" style="background: linear-gradient(to bottom, #3399ff 0%, #ffffff 100%); font-size: 150%;"></span>';

                        echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '&opt=' . $opt . '&qns=' . $qns . '&option=' . $option . '" method="POST"  class="form-horizontal"><br />';

//##################################################################
                        $num = [' (a) ', ' (b) ', ' (c) ', ' (d) ', ' (e) '];
                        $i = 0;

                        while ($row = mysqli_fetch_array($q)) {
                            $option = $row['option'];
                            $optionid = $row['optionid'];

                            echo '<input type="radio" class="qu_radio" name="ans" value="' . $optionid . '">' . $num[$i] . $option . '<br /><br />';
                            $i++;

//echo'<input type="text" name="ans1" id="in_ans" class="qu_radio">'.$option.'<br><br>';

                        }

                        //  $selectedRadio = $_POST['qu_radio'];

                        echo '<br /><button type="submit" class="btn btn-primary" id="quiz_sub" ><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button>
</form>
</div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");

                        ###awnser###
                        $anstest = mysqli_query($con, "SELECT option1 FROM answer WHERE qid='$qid'") or die('Error');

                        while ($row = mysqli_fetch_array($anstest)) {
                            $awn = $row['option1'];

                            echo '<span style="background: linear-gradient(to bottom, #66ccff 0%, #ffff00 100%); font-size: 200%;" id="awnser_id">Awnser is : - ' . $awn . '</span><br><br>';
                        }

                        $view_rw = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND qid='$qid' ");

                        while ($row = mysqli_fetch_array($view_rw)) {
                            $ref = $row['ref'];

                            echo '<div>
<span style="background: darkseagreen; font-size: 150%;">Refrerences :- ' . $ref . '</span>
</div>';
                        }


                    }
                }
                //result display

                if (@$_GET['q'] == 'result' && @$_GET['eid']) {
                    $eid = @$_GET['eid'];
                    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error157');
                    echo '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                    while ($row = mysqli_fetch_array($q)) {
                        $s = $row['score'];
                        $w = $row['wrong'];
                        $r = $row['sahi'];
                        $qa = $row['level'];
                        echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>' . $qa . '</td></tr>
      <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' . $r . '</td></tr> 
	  <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' . $w . '</td></tr>
	  <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
                    }
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE  email='$email' ") or die('Error157');
                    while ($row = mysqli_fetch_array($q)) {
                        $s = $row['score'];
                        echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
                    }
                    echo '</table></div>';

                }
                ?>
                <!--quiz end-->
                <?php
                //history start
                if (@$_GET['q'] == 2) {
                    $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC ") or die('Error197');
                    echo '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
                    $c = 0;
                    while ($row = mysqli_fetch_array($q)) {
                        $eid = $row['eid'];
                        $s = $row['score'];
                        $w = $row['wrong'];
                        $r = $row['sahi'];
                        $qa = $row['level'];
                        $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
                        while ($row = mysqli_fetch_array($q23)) {
                            $title = $row['title'];
                        }
                        $c++;
                        echo '<tr><td>' . $c . '</td><td>' . $title . '</td><td>' . $qa . '</td><td>' . $r . '</td><td>' . $w . '</td><td>' . $s . '</td></tr>';
                    }
                    echo '</table></div>';
                }

                //ranking start
                if (@$_GET['q'] == 3) {
                    $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
                    echo '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
                    $c = 0;
                    while ($row = mysqli_fetch_array($q)) {
                        $e = $row['email'];
                        $s = $row['score'];
                        $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
                        while ($row = mysqli_fetch_array($q12)) {
                            $name = $row['name'];
                            $gender = $row['gender'];
                            $college = $row['college'];
                        }
                        $c++;
                        echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
                    }
                    echo '</table></div></div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>

<!-- /.modal -->
<!--footer end-->
</body>
</html>

<script>
    $('document').ready(function () {

        $('input').attr('disabled', false);
        $('#awnser_id').attr('hidden', true);

        setTimeout("$('input').attr('disabled',true),$('#awnser_id').attr('hidden',false)", 120000);

    });

</script>
