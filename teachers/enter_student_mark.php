<?php include("header.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Enter Student Marks</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/fav.ico" />

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<?php

$success = "";

if(isset($_POST['enter'])){
    $st_id = $_GET['studentid'];
    $student_id = $_GET['id'];
    $subject = $_GET['s'];
    $year = $_POST['year'];
    $term = $_POST['term'];
    $teacher = $_POST['teacher'];
    $competency = $_POST['competency'];
    $skills = $_POST['skills'];
    $remarks = $_POST['remarks'];
    $descriptor = $_POST['descriptor'];

    $bot = $_POST['bot'];
    $mid = $_POST['mid'];
    $end = $_POST['end'];

    // echo $subject_id . "<br>";
    // echo $subject . "<br>";
    // echo $_GET['id'] . "<br>";
    // echo $year . "<br>";
    // echo $term . "<br>";
    // echo $teacher . "<br>";
    // echo $bot . "<br>";
    // echo $mid . "<br>";
    // echo "khfghj" . $st_id . "<br>";

    

    $checker = "SELECT * FROM marks_old WHERE student = '$student_id' AND subject = '$subject' ";
    $result4 = mysqli_query($con, $checker);

    if($result4->num_rows > 0){
        echo '
            <div style="margin: 0 50px" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR !</strong> &nbsp Marks already entered.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                <span aria-hidden="true" >
                    &times;
                </span>
            </button>
            </div>
        ';
    }else{
        $insert_marks = "INSERT INTO marks_old(student, teacher, subject, bot, mid, end, term, year, competency, skills, remarks, descriptor) VALUES('$student_id', '$teacher', '$subject', '$bot', '$mid', '$end', '$term', '$year', '$competency', '$skills', '$remarks', '$descriptor' )";


        $exc = mysqli_query($con, $insert_marks);

        if($exc){
            $success = "true";
            header("Location: marks.php");
            // exit;
            // echo "Great";
        }else{
            $success = "false";
        }
    }

}

?>


    <div class="container">

        <!-- Outer Row -->
        <div  class="justify-content-center">

            <div class="">

                <div class="card o-hidden border-0 shadow-lg my-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div >
                            <div class="">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div>
                                            <h1 id="message" ></h1>
                                        </div>
                                        <div class="container a-alert">
                                            
                                        </div>
                                        <?php if($success == "true") { 
                                                echo '
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>SUCCESS !</strong> &nbsp Student Marks added successfully.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                                    <span aria-hidden="true" >
                                                        &times;
                                                    </span>
                                                </button>
                                                </div>
                                                ';
                                             }elseif($success == "false") { 
                                                echo '
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>ERROR !</strong> &nbsp Something went wrong !.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                                    <span aria-hidden="true" >
                                                        &times;
                                                    </span>
                                                </button>
                                                </div>
                                                ';
                                            } ?>
                                        <h1 class="h4 text-danger mb-2">*----Enter Student Marks----*</h1>
                                        <table style="border-collapse:collapse ; width: 100%;">
                                            <thead style="color: #fff;background-color: gray; text-align: left;" >
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>CLASS</th>
                                            </thead>
                                            <tbody style="text-align:left">
                                                <?php
                                                    $id = $_GET['id'];
                                                    $student_details = "SELECT * from students WHERE student_id = '$id'";
                                                    $result3 = mysqli_query($con, $student_details);

                                                    $row = mysqli_fetch_assoc($result3);

                                                    $name = $row['first_name'] . $row['last_name'];
                                                    $class = $row['class'];
                                                ?>
                                                <td>
                                                    <?php echo $id?>
                                                </td>
                                                <td>
                                                    <?php echo $name ?>
                                                </td>
                                                <td>
                                                    <?php echo $class ?>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><br>
                                    <form action="" method="POST">
                                    <input type="hidden" name="student_id" value=<?php echo $student_id ?>>
                                    <input type="hidden" name="subject" value=<?php echo $subject ?>>
                                    <input type="hidden" name="year" value=<?php echo $current_year ?>>
                                    <input type="hidden" name="term" value=<?php echo $current_term ?>>
                                    <input type="hidden" name="teacher" value=<?php echo $teacher_username ?>>
                                        <table style="border-collapse:collapse ; width: 100%;">
                                            <thead>
                                                <th>B.O.T</th>
                                                <th>MID</th>
                                                <th>END</th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <div class="form-group">
                                                        <input required type="number" max="3" min="0" class="form-control form-control-user" name="bot"
                                                            id="bot"
                                                            placeholder="BOT">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input required type="number" max="3" min="0"  class="form-control form-control-user" name="mid"
                                                            id="mid"
                                                            placeholder="MID">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input required type="number" max="3" min="0"  class="form-control form-control-user" name="end"
                                                            id="end"
                                                            placeholder="END">
                                                    </div>
                                                </td>
                                            </tbody>
                                        </table>

                                        <br>

                                        <div class="form-group">
                                        <h4 style="color:red" for="competency">Competency : </h4>

                                                        <textarea class="form-control form-control-user" name="competency"
                                                            id="competency"
                                                            placeholder="e.g Uses decimal place value to develop understanding of numbers written in other bases"></textarea>
                                        </div>

                                        <br>

                                        <div class="form-group">
                                        <h4 style="color:red" for="skills">Generic skills : </h4>

                                                        <textarea class="form-control form-control-user" name="skills"
                                                            id="skills"
                                                            placeholder="e.g Rita is able to share appropriate and relevant mathematical information, which adds to classrooom discussions"></textarea>
                                        </div>

                                        <div class="form-group">
                                        <h4 style="color:red" for="remarks">General remarks by subject teacher : </h4>

                                                        <textarea class="form-control form-control-user" name="remarks"
                                                            id="remarks"
                                                            placeholder="e.g Uses decimal place value to develop understanding of numbers written in other bases"></textarea>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="btn btn-primary btn-user form-group col-sm-12" name="descriptor" id="">
                                                    <option value="">Select Descriptor</option>
                                                    <option value="Basic">Basic</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input name="enter" type="submit" class="btn btn-primary btn-user btn-block" value="Submit Marks" />
                                                    
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="enter_marks.php?s=<?php echo $subject ?>">Not sure ? Go back!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>

<?php include("footer.php") ?>