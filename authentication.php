<?php
    require("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if($conn)
    {
        $table = 'manage';
        if(isset($_POST["username"]) and isset($_POST["pass"]))
        {
            $username = $_POST["username"];
            $pass = $_POST["pass"];

            $query = "select * from $table where username = '$username' and pass = '$pass'";

            $result = mysqli_query($conn, $query);
            $row = mysqli_num_rows($result);
            if($row != 0)
            {
                header('location: ./manage.php?login=bG9naW5zdWNjZXNzZnVsbHl0b21hbmFnZWhhdGVjb3MxMDAyNmZ1Y2t0aGVkZWFkbGluZWFuZGRhbmllbA==');
            }
            else header("location: ./login.php");

        }
        else {
            echo "<p>Did not enter all require information</p>";
        }
    }
?>