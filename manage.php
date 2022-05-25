
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Admin</title>
    <link rel="stylesheet" href="./styles/style.css">
    <meta name="author" content="Minh Nhat Nguyen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php
    require('./admin_navbar.inc');
    ?> 
    
    <?php
        require('./settings.php');

        if($hasValidCredentials)
        {
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if($conn)
            {
                $student_array = array();
                $sql_AttemptTable = "attempt";
                $sql_StudentTable = "students";
                $attempt_query = "select * from $sql_AttemptTable";
                $student_query = "select * from $sql_StudentTable";

                $attempt_result = mysqli_query($conn, $attempt_query);
                $student_result = mysqli_query($conn, $student_query);

                if(!$student_result)
                {
                    echo"<p>Error with student queries</p>";
                }
                else {
                    $student_row = mysqli_fetch_assoc($attempt_query);
                    while($student_row)
                    {
                        $student = array();
                        $student["firstName"] = $student_row["first_name"];
                        $student["lastName"] =  $student_row["last_name"];
                        $student["age"] = $student_row["age"];
                        $student["idAttempt1"] = $student_row["id_attempt1"];
                        $student["idAttempt2"] = $student_row["id_attempt2"];
                        $student["firstScore"] = $student_row["first_score"];
                        $student["lastName"] = $student_row["last_score"];
                        $student_array[$student_row["student_id"]] = $student;
                        $student_row = mysqli_fetch_assoc($attempt_query);
                    }

                }

                if($attempt_result)
                {
                    if(!mysqli_fetch_assoc($attempt_query))
                    {
                        echo "<p>No</p>";
                    }
                    else {
                        echo "<table class=\"big-table\">\n<tr class=\"row\">\n";
                        echo "<th class=\"head\">Attempt ID</th>\n<th class=\"head\">Date Taken</th>\n<th class=\"head\">Student ID</th>\n<th class=\"head\">Score</th>\n<th class=\"head\">First Name</th>\n<th class=\"head\">Last Name</th>\n";
                        echo"</tr>\n";
                    }
                }
                else {
                    echo "<p>Something is wrong with $attempt_result</p>";
                }
            }
            else
            {
                echo "<p>Somethings is wrong with the database connection</p>";
                http_response_code(500);
            }
        }
        else {
            
            header("location: ./login.php");
        }



    ?>

    <table class="big-table">
            <th class="head"></th>
            <th class="head"></th>
        </tr>
        <tr class="row">
        </tr>
    </table>

    <?php
    require('./footer.inc');
    ?>

    <hr id="copyright-line">
    <div class="footer-bottom">
      <p class="copyright">Mark up by: <a href="mailto:103831821@student.swin.edu.au"
          class="footer-list-anchor white link" target="_blank">Minh Nhat Nguyen</a></p>
    </div>
</body>
</html>

<!-- $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
select make, model, price FROM cars ORDER BY make, model -->