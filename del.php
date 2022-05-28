
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
        
            
    <?php
        require('./settings.php');
        $hasValidCredentials = 1;
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if(isset($_POST["id"]) and is_numeric($_POST["id"]))
        {
            $del_id = $_POST["id"];
            $sql_AttemptTable = "attempt";
            $sql_StudentTable = "studentss";
            $query = "delete from $sql_AttemptTable where student_id = $del_id";
            $query = "delete from $sql_StudentTable where student_id = $del_id";
            $delResultAttempt = mysqli_query($conn, $query);
            

            if($delResultAttempt)
            {
                $delResultStudent = mysqli_query($conn, $query);
                if($delResultStudent)
                {
                    echo "<h1 class=\"title\">Delete Successfully</h1>";
                    sleep(10);
                    header("location: ./manage.php?login=bG9naW5zdWNjZXNzZnVsbHl0b21hbmFnZWhhdGVjb3MxMDAyNmZ1Y2t0aGVkZWFkbGluZWFuZGRhbmllbA==");
                }
            }
            else 
            {
                echo "<h1 class=\"title\">Delete Fail</h1>";
                sleep(10);
                header("location: ./delete.php");
            }
        }
        else 
        {

        }
    ?>
        
    </main>
</body>
</html>

<!-- $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
select make, model, price FROM cars ORDER BY make, model -->