<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="The Homepage for the topic Streaming Media" />
  <meta name="keywords" content="MySQL,PHP" />
  <link rel="stylesheet" href="./styles/markquiz.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <title>Quiz</title>
</head>
<body id="index">
  <?php
    require("./navbar.inc")
  ?>
  <div class="heading">
    <h1 id="head"> Result</h1>
    <h2 id="subheading"><i>Your result will be displayed behind!</i></h2>
  </div>
  <div class = "marking">
    <div class="message">
  <?php
    require_once("settings.php");
    function sanitise_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    function create_attempt_tb($conn,$table){
      $query = "create table if not exists $table(
                  attempt_id int auto_increment primary key,
                  date_joined datetime,
                  student_id varchar(10),
                  score int,
                  num_of_ques int
                )";
      return mysqli_query($conn,$query);
    }

    function alter_attempt_tb($conn,$attempt,$student){
      $query = "alter table $attempt
                add foreign key(student_id)
                references $student(student_id)
                on delete set null";
      return mysqli_query($conn,$query);
    }

    function create_student_tb($conn,$student,$attempt){
        $query = "create table if not exists $student(
                  student_id varchar(10) primary key,
                  first_name varchar(30),
                  last_name varchar(30),
                  age int,
                  id_attempt1 int,
                  id_attempt2 int,
                  first_score int,
                  last_score int,
                  foreign key(id_attempt1) references $attempt(attempt_id),
                  foreign key(id_attempt2) references $attempt(attempt_id)
                  on delete set null
                )";
      return mysqli_query($conn,$query);
    }

    function insert_second_attempt($conn,$table,$student_id,$score){
      $query = "insert into $table values(null,now(),'$student_id','$score',10)";
      return mysqli_query($conn,$query);
    }

    function update_second_attempt($conn,$student,$attempt,$student_id,$score){
      $query1 = "select * from $attempt where student_id = $student_id";
      $res = mysqli_query($conn,$query1);
      $second_attemptid = 0;
      $count = 1;
      while($rows = mysqli_fetch_assoc($res)){
        if($count == 2){
          $second_attemptid = $rows["attempt_id"];
        }
        $count+=1;
      }
      mysqli_free_result($res);
      $query2 = "update $student
                set id_attempt2 = $second_attemptid, last_score = $score
                where student_id = $student_id
                ";
      return mysqli_query($conn,$query2);
      
    }

    function insert_first_student($conn,$table,$student_id,$fname,$lname,$age,$score){
      $query = "insert into $table values('$student_id','$fname','$lname','$age',null,null,'$score',null)";
      return mysqli_query($conn,$query);
    }

    function insert_first_attempt($conn,$table,$student_id,$score){
      $num_of_ques = 10;
      $query = "insert into $table values(null,now(),'$student_id','$score','$num_of_ques')";
      return mysqli_query($conn,$query);
    }
    function update_first_student($conn,$student,$attempt,$student_id){
      $query1 = "select * from $attempt";
      $f_attemptid = 0;
      $result =  mysqli_query($conn,$query1);
      while ($rows = mysqli_fetch_assoc($result)){
        if ($rows["student_id"] == $student_id){
          $f_attemptid = $rows["attempt_id"];
          break;
        } 
      }
      mysqli_free_result($result);
      $query2 = "update $student
                set id_attempt1 = $f_attemptid
                where student_id = $student_id ";
      return mysqli_query($conn,$query2);
    }

    function is_first_attempt($conn,$table,$student_id){
      $query = "select * from $table where student_id = $student_id";
      $result = mysqli_query($conn,$query);
      if (mysqli_num_rows($result) == 0){
        mysqli_free_result($result);
        return true;
      }
      mysqli_free_result($result);
      return false;
    }

    function get_number_attempt($conn,$table,$student_id){
      $query = "select * from $table where student_id = $student_id";
      $result = mysqli_query($conn,$query);
      return mysqli_num_rows($result);
    }

    function get_mark($conn,$table,$ans){
      $query = "select * from $table";
      $res =  mysqli_query($conn,$query);
      $score = 0;
      while ($rows = mysqli_fetch_assoc($res)){
        $ques = $rows['question'];
        if ($ans[$ques] == $rows['answer']){
          $score +=1;
        }
        if ($ques == 'ques7'){
          $temp = join(",",$ans[$ques]);
          if($temp == $rows['answer']){
            $score +=1;
          }
        }
      }
      mysqli_free_result($res);
      return $score;
    }

    function get_inaccurate($conn,$table,$ans){
      $query = "select * from $table";
      $res =  mysqli_query($conn,$query);
      $check = [];
      while($rows = mysqli_fetch_assoc($res)){
        $ques = $rows['question'];
        if ($ans[$ques] == $rows['answer']){
          $check[$rows['ques_id']] = "True";
        }else{
          $check[$rows['ques_id']] = "False";
        }
        if($ques == 'ques7'){
          $temp = join(",",$ans[$ques]);
          if($temp == $rows['answer']){
            $check[$rows['ques_id']] = "True";
          }else{
            $check[$rows['ques_id']] = "False";
          }
        }
      }
      mysqli_free_result($res);
      return $check;
    }

    if ((isset($_POST["fname"])) && (isset($_POST['lname'])) && (isset($_POST['age'])) && (isset($_POST['id']) &&
      $_POST["fname"] != "" && $_POST["lname"] !="" && $_POST["age"] && $_POST["id"])){
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $age = $_POST["age"];
      $student_id = $_POST["id"];
    }
    else{
      header("location: quiz.php");
    }
    $fname = sanitise_input($fname);
    $lname = sanitise_input($lname);
    $age = sanitise_input($age);
    $student_id = sanitise_input($student_id);
    $errMsg = "";
    if (!preg_match("/^[a-zA-Z -]{1,30}$/",$fname)){
      $errMsg .= "<p>Only alpha letters allowed in your firstname</p>";
    }
    if (!preg_match("/^[a-zA-Z -]{1,30}$/",$lname)){
      $errMsg .= "<p>Only alpha letters alloewd in your lastname";
    }
    if (!preg_match("/^([1-9]|[1-9][0-9]|[1][0-9][0-9]|[2][0][0])$/",$age)){
      $errMsg .= "<p>Your age is not in appropriate range!</p>";
    }
    if(!preg_match("/^([0-9]{7}|[0-9]{10})$/",$student_id)){
      $errMsg .= "<p>Your student ID must be 7 or 10 digits!</p>";
    }
    $isAnsLegal = true;
    $ans = array();
      if (isset($_POST["ques1"]) && $_POST["ques1"] != ""){
        $ques1 = $_POST["ques1"];
        $ans["ques1"] = $ques1;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques2"]) && $_POST["ques2"] != ""){
        $ques2 = $_POST["ques2"];
        $ans["ques2"] = $ques2;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques3"]) && $_POST["ques3"] != ""){
        $ques3 = $_POST["ques3"];
        $ans["ques3"] = $ques3;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques4"]) && $_POST["ques4"] != ""){
        $ques4 = $_POST["ques4"];
        $ans["ques4"] = $ques4;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques5"]) && $_POST["ques5"] != ""){
        $ques5 = $_POST["ques5"];
        $ans["ques5"] = $ques5;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques6"]) && $_POST["ques6"] != ""){
        $ques6 = $_POST["ques6"];
        $ans["ques6"] = $ques6;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques7"]) && count($_POST["ques7"]) != 0 ){
        $ques7_ar = $_POST['ques7'];
        $ans["ques7"] = $ques7_ar;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques8"]) && $_POST["ques8"] != ""){
        $ques8 = $_POST["ques8"];
        $ans["ques8"] = $ques8;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques9"]) && $_POST["ques9"] != ""){
        $ques9 = $_POST["ques9"];
        $ans["ques9"] = $ques9;
      }else{
        $isAnsLegal = false;
      }
      if (isset($_POST["ques10"]) && $_POST["ques10"] != ""){
        $ques10 = $_POST["ques10"];
        $ans["ques10"] = $ques10;
      }else{
        $isAnsLegal = false;
      }

    if ($errMsg != ""){
      echo $errMsg;
      echo "<p>Click <a class =\"anchor\" href =\"quiz.php\">here</a> to return.</p>";
    }else{
      $conn = @mysqli_connect($host,$user,$pwd,$sql_db);
      if (!$conn){
        // Display an error message
          die("<p>Database connection failure</p>") ;// Not in production script
      }else{
        $student_table = "studentss";
        $attempt_table = "attempt";
        $question = "question";
        $score = 0;
        if (create_attempt_tb($conn,$attempt_table)){
          if (create_student_tb($conn,$student_table,$attempt_table)){
            $alter = alter_attempt_tb($conn,$attempt_table,$student_table);
          }else{
            die("<p>Database connection failure</p>");
          }
        }else{
          die("<p>Database connection failure</p>");
        }
        $num_of_attempts = get_number_attempt($conn,$attempt_table,$student_id);
        if ($num_of_attempts == 0){
          if ($isAnsLegal == false){
            if (insert_first_student($conn,$student_table,$student_id,$fname,$lname,$age,$score)){
              if (insert_first_attempt($conn,$attempt_table,$student_id,$score) && update_first_student($conn,$student_table,$attempt_table,$student_id)){
                // echo "<div class = \"message\">";
                echo "<div class =\"message1\">";
                echo "<p id =\"attempt\">Your Result!</>";
                echo "</div>";
                echo "<div class = \"score\">";
                  echo "<div class = \"outer\">";
                    echo "<div class =\"inner\">";
                      echo "<p id =\"score\">$score</p>";
                      echo "<p id = \"out-of\">Out of 10</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
                echo "<h4>Personal details</h4>";
                echo "<div class = \"info\"> ";
                echo "<p>Your name: $fname $lname</p>";
                echo "<p>Student ID: $student_id</p>";
                echo "<p>Attempt limits: 1</p>";
                echo "<p>You've done your first attempt!</p>";
                echo "<p>You got $score for not having done all the question!!!</p>";
                echo "<p>Click <a class =\"anchor\" href = \"quiz.php\">here</a> to re-do the quiz</p>";
                echo "</div>";
                // echo "</div>";
              }
            }else{
              die("<p>Database error!</p>");
            }
          }else{
            $score = get_mark($conn,$question,$ans);
            if (insert_first_student($conn,$student_table,$student_id,$fname,$lname,$age,$score)){
              if (insert_first_attempt($conn,$attempt_table,$student_id,$score) && update_first_student($conn,$student_table,$attempt_table,$student_id)){
                // echo "<div class = \"message\">";
                echo "<div class =\"message1\">";
                echo "<p id =\"attempt\">Your Result!</>";
                echo "</div>";
                echo "<div class = \"score\">";
                  echo "<div class = \"outer\">";
                    echo "<div class =\"inner\">";
                      echo "<p id =\"score\">$score</p>";
                      echo "<p id = \"out-of\">Out of 10</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
                echo "<h4>Personal details</h4>";
                echo "<div class = \"info\"> ";
                echo "<p>Your name: $fname $lname</p>";
                echo "<p>Student ID: $student_id</p>";
                echo "<p>Attempt limits: 1</p>";
                echo "<p>You've done your first attempt!</p>";
                $check = get_inaccurate($conn,$question,$ans);
                $query = "select * from question";
                $res = mysqli_query($conn,$query);
                if(!$res){
                  echo "<p>Unable to display your answers!!!</p>";
                }else{
                  echo "<table id =\"check\">";
                  echo "<tr>
                          <th>No.</th>
                          <th>Type</th>
                          <th>Check</th>
                        </tr>";
                  while($rows = mysqli_fetch_assoc($res)){
                    echo "<tr>";
                      echo  "<td>",$rows['ques_id'],"</td>";
                      echo  "<td>",$rows['type'],"</td>";
                      echo  "<td>",$check[$rows['ques_id']],"</td>";
                    echo "</tr>";
                  }
                  echo "</table>";
                }
                mysqli_free_result($res);
                echo "<p>Click <a class =\"anchor\" href = \"quiz.php\">here</a> to re-do the quiz</p>";
                echo "<p> Click<a class =\"anchor\" href =\"reason.php\"> here</a> for more infomation</p>";
                echo "</div>";
                // echo "</div>";
              }
            }else{
              die("<p>Database error!</p>");
            }
          }
        }elseif($num_of_attempts == 1){
          if ($isAnsLegal == false){
            if (insert_second_attempt($conn,$attempt_table,$student_id,$score)){
              if (update_second_attempt($conn,$student_table,$attempt_table,$student_id,$score)){
                // echo "<div class = \"message\">";
                echo "<div class =\"message1\">";
                echo "<p id =\"attempt\">Your Result!</>";
                echo "</div>";
                echo "<div class = \"score\">";
                  echo "<div class = \"outer\">";
                    echo "<div class =\"inner\">";
                      echo "<p id =\"score\">$score</p>";
                      echo "<p id = \"out-of\">Out of 10</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
                echo "<h4>Personal details</h4>";
                echo "<div class = \"info\"> ";
                echo "<p>Your name: $fname $lname</p>";
                echo "<p>Student ID: $student_id</p>";
                echo "<p>Attempt limits: 1</p>";
                echo "<p>You've done your first attempt!</p>";
                echo "<p>You got $score for not having done all the question!!!</p>";
                echo "<p>Click <a class =\"anchor\" href = \"quiz.php\">here</a> to re-do the quiz</p>";
                echo "<p> Click<a class =\"anchor\" href =\"reason.php\"> here</a> for more infomation</p>";
                echo "</div>";
                // echo "</div>";
              }else{
                die("<p>Unexpected error</p>");
              }
            }else{
              die("<p>Unexpected error!</p>");
            }
          }else{
            $score = get_mark($conn,$question,$ans);
            if (insert_second_attempt($conn,$attempt_table,$student_id,$score)){
              if (update_second_attempt($conn,$student_table,$attempt_table,$student_id,$score)){
                // echo "<div class = \"message\">";
                echo "<div class =\"message1\">";
                echo "<p id =\"attempt\">Your Result!</>";
                echo "</div>";
                echo "<div class = \"score\">";
                  echo "<div class = \"outer\">";
                    echo "<div class =\"inner\">";
                      echo "<p id =\"score\">$score</p>";
                      echo "<p id = \"out-of\">Out of 10</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
                echo "<h4>Personal details</h4>";
                echo "<div class = \"info\"> ";
                echo "<p>Your name: $fname $lname</p>";
                echo "<p>Student ID: $student_id</p>";
                echo "<p>Attempt limits: 1</p>";
                echo "<p>You've done your first attempt!</p>";
                $check = get_inaccurate($conn,$question,$ans);
                $query = "select * from question";
                $res = mysqli_query($conn,$query);
                if(!$res){
                  echo "<p>Unable to display your answers!!!</p>";
                }else{
                  echo "<table id =\"check\">";
                  echo "<tr>
                          <th>No.</th>
                          <th>Type</th>
                          <th>Check</th>
                        </tr>";
                  while($rows = mysqli_fetch_assoc($res)){
                    echo "<tr>";
                      echo  "<td>",$rows['ques_id'],"</td>";
                      echo  "<td>",$rows['type'],"</td>";
                      echo  "<td>",$check[$rows['ques_id']],"</td>";
                    echo "</tr>";
                  }
                  echo "</table>";
                }
                mysqli_free_result($res);
                echo "<p>Click <a class =\"anchor\" href = \"quiz.php\">here</a> to re-do the quiz</p>";
                echo "</div>";
                // echo "</div>";
              }else{
                die("<p>Unexpected error</p>");
              }
            }else{
              die("<p>Unexpected error!</p>");
            }
          }
        }else{
          echo "<p class =\"anchor\" id =\"over-msg\">You reached attempt limit!!!</p>";
        }
      }


    }
  ?>
  </div>
  </div>

  <?php
    require("./footer.inc");
  ?>
</body>

</html>