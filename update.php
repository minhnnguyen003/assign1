
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="./styles/manage.css">
    <meta name="author" content="Minh Nhat Nguyen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</head>
<body>
    <?php
        require('./admin_navbar.inc');
        require('./left_pane.inc');
    ?> 
    

    <div class="background-image"></div>
    <main class="main">
        <h1 class="title">Update</h1>
        
            
    <?php
        require('./settings.php');
        $updateQueryAttempt = "Update";
        $updateQueryStudent = "Update";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if($conn)
            {
                $sql_AttemptTable = "attempt";
                $sql_StudentTable = "studentss";
                
                if(isset($_POST["id"]) and $_POST["id"] != "")
                {
                    $newScore = $_POST["new-score"];
                    $id = $_POST["id"];
                    $updateQueryAttempt .= " $sql_AttemptTable SET score=$newScore WHERE attempt_id= $id";

                    $updateQueryStudent1 = "Update $sql_StudentTable SET first_score=$newScore WHERE id_attempt1= $id";
                    $updateQueryStudent2 = "Update $sql_StudentTable SET first_score=$newScore WHERE id_attempt2= $id";
                    $updateAttemptTableResult = mysqli_query($conn, $updateQueryAttempt);
                    $updateQueryStudent1Result = mysqli_query($conn, $updateQueryStudent1);
                    $updateQueryStudent2Result = mysqli_query($conn, $updateQueryStudent2);
                    if($updateAttemptTableResult and ($updateQueryStudent1Result or $updateQueryStudent2Result))
                    {
                        echo "<h1 class=\"title\">Update Successful<br>Return to Manage Admin page in 3 seconds...</h1>";
                        // sleep(10);
                        header("location: ./manage.php");
                    }
                    else
                    {
                        echo "<h1 class=\"title\">Update Fail<br>Return to Update page in 3 seconds...</h1>";
                        // sleep(10);
                        header("location: ./update.php");
                    }
                }
                elseif(isset($_POST["a_id"]) and isset($_POST["s_id"]) and isset($_POST["new-score"]))
                {
                    $newScore = $_POST["new-score"];
                    $attemptIDQuery = "Select";
                    $a_id = $_POST["a_id"];
                    $s_id = $_POST["s_id"];
                    if((int)$a_id == 1)
                    {
                        $updateQueryStudent .= " $sql_StudentTable SET first_score=$newScore WHERE student_id= $s_id";
                        $attemptIDQuery .= " id_attempt1 from $sql_StudentTable where student_id= $s_id";
                    }
                    else {
                        $updateQueryStudent .= " $sql_StudentTable SET last_score=$newScore WHERE student_id= $s_id";
                        $attemptIDQuery .= " id_attempt2 from $sql_StudentTable where student_id= $s_id";
                    }
                    
                    
                    $updateQueryStudentResult = mysqli_query($conn, $updateQueryStudent);
                    echo "<p> $attemptIDQuery </p>";
                    // Find attemptID
                    $attemptIDResult = mysqli_query($conn, $attemptIDQuery);
                    $id = 0;
                    if($attemptIDResult) {
                        $attemptIDRow = mysqli_fetch_array($attemptIDResult, MYSQLI_NUM);
                        $id = $attemptIDRow[0];
                    }
                    
                    $updateQueryAttempt .= " $sql_AttemptTable SET score=$newScore WHERE attempt_id= $id";
                    $updateAttemptTableResult = mysqli_query($conn, $updateQueryAttempt);
                    
                    if($updateAttemptTableResult and $updateQueryStudentResult)
                    {
                        echo "<h1 class=\"title\">Update Successful<br>Return to Manage Admin page in 3 seconds...</h1>";
                        sleep(10);
                        header("location: ./manage.php");
                    }
                    else
                    {
                        echo "<h1 class=\"title\">Update Fail<br>Return to Update page in 3 seconds...</h1>";
                        sleep(10);
                        header("location: ./update.php");
                    }
                }
                else {
                    header("location: ./update.php");
                }
            }
            else
            {
                echo "<p>Somethings is wrong with the database connection</p>";
                http_response_code(500);
            }
        

        // else {
        //     header("location: ./login.php");
        // }



    ?>
        
    </main>
</body>
</html>

<!-- $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
select make, model, price FROM cars ORDER BY make, model -->