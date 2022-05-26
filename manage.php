
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
    <nav class="left-pane">
        <form class="search-pane" method="get" action="./login.php">
            <input type="text" placeholder="Search">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <div class="menu-button">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span>Dashboard</span>
        </div>
        <div class="menu-button">
            <i class="fa-solid fa-filter"></i>
            <span>Filter</span>
        </div>
        <div class="menu-button">
            <i class="fa-solid fa-chart-line"></i>
            <span>Chart</span>
        </div>
    </nav>
    <div class="background-image"></div>
    <main class="main">
    <table class="big-table">
        <tr class="head-row">
    <?php
        require('./settings.php');
        $hasValidCredentials = 1;
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
                        $student_array[$student_row["student_id"]] = $student;
                        $student_row = mysqli_fetch_assoc($student_result);
                    }
                }

                if($attempt_result)
                {
                    $attempt_row = mysqli_fetch_assoc($attempt_result);
                    if($attempt_row)
                    {
                        echo "<th class=\"head\">ID</th>\n<th class=\"head\">Student ID</th>\n<th class=\"head\">First Name</th>\n<th class=\"head\">Last Name</th>\n<th class=\"head\">Score</th>\n<th class=\"head\">Date Taken</th>\n";
                        echo"</tr>\n";
                        while($attempt_row)
                        {
                            echo"<tr class=\"row\">\n";
                            echo"<td class=\"data\">", $attempt_row["attempt_id"], "</td>\n";
                            echo"<td class=\"id\">", $attempt_row["student_id"], "</td>\n";
                            echo"<td class=\"name\">", ucfirst($student_array[$attempt_row["student_id"]]["firstName"]), "</td>\n";
                            echo"<td class=\"name\">", ucfirst($student_array[$attempt_row["student_id"]]["lastName"]), "</td>\n";
                            echo"<td class=\"data\">", $attempt_row["score"], "</td>\n";
                            echo"<td class=\"date\">", $attempt_row["date_joined"], "</td>\n";
                            
                            echo"</tr>\n";

                            $attempt_row = mysqli_fetch_assoc($attempt_result);
                        }
                    }
                    else {
                        echo "<p>No</p>";
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