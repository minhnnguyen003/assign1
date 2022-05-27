
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Admin</title>
    <link rel="stylesheet" href="./styles/manage.css">
    <meta name="author" content="Minh Nhat Nguyen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php
        require('./admin_navbar.inc');
        require('./left_pane.inc');
    ?> 
    
    

    <div class="background-image"></div>
    <main class="main">
        <div class="title">
            <h2>Table of student with full marks</h2>
            <h2>Table of attempts: </h2>
        </div>
    <?php
        require('./settings.php');
        $hasValidCredentials = 1;
        if($hasValidCredentials)
        {
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if($conn)
            {
                $students_array = array();
                $sql_AttemptTable = "attempt";
                $sql_StudentTable = "students";
                

                # Enhancement
                $stringQuery = $_SERVER['QUERY_STRING'];
                $queryArray = array();
                parse_str($stringQuery, $queryArray);
                // echo "<p>", $queryArray["searchContent"], "</p>";

                $attempt_query = "select * from $sql_AttemptTable";

                $query_10 = "select * from $sql_AttemptTable where score = 10";

                $student_query = "select * from $sql_StudentTable";

                
                $student_result = mysqli_query($conn, $student_query);
                $ten_result = mysqli_query($conn, $query_10);
                
                

                if(!$student_result)
                {
                    echo"<p>Error with student queries</p>";
                }
                else {
                    $student_row = mysqli_fetch_assoc($student_result);
                    while($student_row)
                    {
                        $student = array();
                        $student["firstName"] = $student_row["first_name"];
                        $student["lastName"] =  $student_row["last_name"];
                        $student["age"] = $student_row["age"];
                        $student["idAttempt1"] = $student_row["id_attempt1"];
                        $student["idAttempt2"] = $student_row["id_attempt2"];
                        $student["firstScore"] = $student_row["first_score"];
                        $student["lastScore"] = $student_row["last_score"];
                        $student["id"] = $student_row["student_id"];
                        $students_array[$student_row["student_id"]] = $student;
                        $student_row = mysqli_fetch_assoc($student_result);
                    }
                }

                if(isset($queryArray["searchContent"])) 
                {
                    $searchContent = $queryArray["searchContent"];
                    if(is_numeric($queryArray["searchContent"]))
                    {
                        $attempt_query = "select * from $sql_AttemptTable where student_id = \"$searchContent\"";
                    }
                    else
                    {
                        $student_id = array();
                        foreach($students_array as $student_array) {
                            if(preg_match("/$searchContent/", $student_array["firstName"]) or preg_match("/$searchContent/", $student_array["lastName"]))
                            {
                                array_push($student_id, $student_array["id"]); 
                            }
                        }
                        if(count($student_id) > 0)
                        {
                            
                            $attempt_query = "select * from $sql_AttemptTable where student_id IN (";
                            for($x = 0; $x < count($student_id); $x++) {
                                $attempt_query .= $student_id[$x];
                                if($x < (count($student_id) - 1)) $attempt_query .= ",";
                                else $attempt_query .= ")";
                            }
                        }
                        else $attempt_query = "select * from $sql_AttemptTable where student_id=0";
                    }
                }


                $attempt_result = mysqli_query($conn, $attempt_query);

                if(!$ten_result)
                {
                    echo"<p>Error with Ten queries</p>";
                }
                else {
                    $ten_row = mysqli_fetch_assoc($ten_result);
                    if($ten_row)
                    {
                        echo "<table class=\"table-10\">\n<tr class=\"head-row\"><th class=\"head\">ID</th>\n<th class=\"head\">Student ID</th>\n<th class=\"head\">First Name</th>\n<th class=\"head\">Last Name</th>\n<th class=\"head\">Score</th>\n<th class=\"head\">Date Taken</th>\n";
                        echo"</tr>\n";
                        while($ten_row)
                        {
                            echo"<tr class=\"row\">\n";
                            echo"<td class=\"data\">", $ten_row["attempt_id"], "</td>\n";
                            echo"<td class=\"id\">", $ten_row["student_id"], "</td>\n";
                            echo"<td class=\"name\">", ucfirst($students_array[$ten_row["student_id"]]["firstName"]), "</td>\n";
                            echo"<td class=\"name\">", ucfirst($students_array[$ten_row["student_id"]]["lastName"]), "</td>\n";
                            echo"<td class=\"data\">", $ten_row["score"], "</td>\n";
                            echo"<td class=\"date\">", $ten_row["date_joined"], "</td>\n";
                            
                            echo"</tr>\n";

                            $ten_row = mysqli_fetch_assoc($ten_result);
                        }
                    }
                    else {
                        echo "<th class=\"head\">No</th>";
                        echo"</tr>\n</table>";
                    }
                }

                if($attempt_result)
                {
                    $attempt_row = mysqli_fetch_assoc($attempt_result);
                    if($attempt_row)
                    {
                        echo "<table class=\"big-table\">\n<tr class=\"head-row\"><th class=\"head\">ID</th>\n<th class=\"head\">Student ID</th>\n<th class=\"head\">First Name</th>\n<th class=\"head\">Last Name</th>\n<th class=\"head\">Score</th>\n<th class=\"head\">Date Taken</th>\n";
                        echo"</tr>\n";
                        while($attempt_row)
                        {
                            echo"<tr class=\"row\">\n";
                            echo"<td class=\"data\">", $attempt_row["attempt_id"], "</td>\n";
                            echo"<td class=\"id\">", $attempt_row["student_id"], "</td>\n";
                            echo"<td class=\"name\">", ucfirst($students_array[$attempt_row["student_id"]]["firstName"]), "</td>\n";
                            echo"<td class=\"name\">", ucfirst($students_array[$attempt_row["student_id"]]["lastName"]), "</td>\n";
                            echo"<td class=\"data\">", $attempt_row["score"], "</td>\n";
                            echo"<td class=\"date\">", $attempt_row["date_joined"], "</td>\n";
                            
                            echo"</tr>\n";

                            $attempt_row = mysqli_fetch_assoc($attempt_result);
                        }
                    }
                    else {
                        echo "<th class=\"head\">No</th>";
                        echo"</tr>\n";
                    }
                }
                else {
                    echo "<p>Something is wrong with $attempt_query</p>";
                }
            }
            else
            {
                echo "<p>Somethings is wrong with the database connection</p>";
                http_response_code(500);
            }
        }
        // else {
        //     header("location: ./login.php");
        // }



    ?>
    </table>
    
    </main>
    

    <!-- <table class="big-table">
            <th class="head"></th>
            <th class="head"></th>
        </tr>
        <tr class="row">
        </tr>
    </table> -->

</body>
</html>

<!-- $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
select make, model, price FROM cars ORDER BY make, model -->