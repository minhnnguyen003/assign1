
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
        if($hasValidCredentials)
        {
            $stringQuery = $_SERVER['QUERY_STRING'];
            $queryArray = array();
            parse_str($stringQuery, $queryArray);
            
            if(isset($queryArray["id"]) && is_numeric($queryArray["id"]))
            {
                $id = $queryArray["id"];
                echo "<h1 class=\"title\">Editor</h1>";
                echo "<form action=\"./update.php\" method=\"POST\" class=\"update-form\">";
                echo "<label for=\"id\">Attempt ID</label>";
                echo "<input type=\"text\" name=\"id\" id=\"id\" class=\"form-control\" value=\"$id\">";
                echo "<label for=\"new-score\">Update Score</label>";
                echo "<input type=\"number\" name=\"new-score\" id=\"new-score\" class=\"form-control\">";
                echo "<button type=\"submit\" value=\"Submit\" class=\"btn btn-primary container\" style=\"margin-top: 20px;\">Update</button>";
                echo "</form>";
            }
            else {
                echo "<h1 class=\"title\">Editor</h1>";
                echo "<form action=\"./update.php\" method=\"POST\" class=\"update-form\">";
                echo "<label for=\"a_id\">Attempt Number</label>";
                echo "<input type=\"number\" pattern=\"[0-9]{1,2}\" name=\"a_id\" id=\"a_id\" class=\"form-control\" required>";
                echo "<label for=\"s_id\">Student ID</label>";
                echo "<input type=\"number\" name=\"s_id\" id=\"s_id\" class=\"form-control\" required>";
                echo "<label for=\"new-score\">Update Score</label>";
                echo "<input type=\"number\" name=\"new-score\" id=\"new-score\" class=\"form-control\" required>";
                echo "<button type=\"submit\" value=\"Submit\" class=\"btn btn-primary container\" style=\"margin-top: 20px;\">Update</button>";
                echo "</form>";
            }

        }
    ?>
        
    </main>
</body>
</html>

<!-- $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
select make, model, price FROM cars ORDER BY make, model -->