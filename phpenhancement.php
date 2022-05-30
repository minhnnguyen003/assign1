<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Enhancement for Assignment Part 1, COS10026">
  <meta name="keywords" content="Enhancement">
  <meta name="author" content="Minh Nhat Nguyen">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <title>Enhancement</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="enhancement">
  <div class="background-image"></div>
  <?php
    require('./navbar.inc');
  ?>

  <main class="container">

    <article class="main-article">
      <h1 class="article-title">Enhancement</h1>
      <h4 id="subtitle">Please click on the code to see full code that is store in Github<sup>&#174;</sup></h4>


      <article class="sub-article">
        <details open>
          <summary class="head-summary">Login page</summary>
          We use PHP, MySQL to create a login page, which require authentication before access to the Management page.
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <code>
                      $username = $_POST["username"];
                      $pass = $_POST["pass"];
                                          </code>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    We first connect to the database with <code>mysqli_connect($host, $username, $pass, $db)</code>, next we set the form with <code>action="./authentication.php" method="POST"</code> to redirect the user to the authentication page. In the authentication page, we use the SQL query <code>Select * from table where username = $username and pass = $pass</code>. Then if there is a row with the result, it will redirect you to the Management page with a valid keystring. Or else, you will be redirected to the login page and it will show an error.
                    If the user try to go directly through the manage.php, the page will automatically redirect to the login page
                    <figure class="enhancement-figure">
                      <img src="./images/login.png" alt="login page screenshot">
                      <figcaption>Login page screenshot</figcaption>
                    </figure> 
                  </details>
                </li>
              </ul>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">MySQL Foreign Key</summary>
          Use of foreign key is portrayed below.
          <ol class="bigger-list">
            <li>
              <h4>Implementation of Foreign Key in Tables</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <code>
                    {$query = "create table if not exists $student(

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
                    }
                                          </code>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    Foreign key is a field in one table, that refers to the primary key in another table. In this enhancement we have two tables, 'attempts' and 'studentss'. Firstly, in studentss table, student_id is the primary key whereeas id_attempt1 and id_attempt2 is the foreign key.
                    On the other hand, in attempts table, attempt_id is the primary key whereeas student_id is the foreign key. 
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">Query String</summary>
          We use QueryString for auto fill the content in the edit and delete part of the manage queries.
          <ol class="bigger-list">
            <li>
              <h4>student table</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <code>
                    $stringQuery = $_SERVER['QUERY_STRING'];
                    parse_str($stringQuery, $queryArray);
                                          </code>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    We make this one so that when user click on the attempt ID number in the manage page, it will redirect them to the edit score of that attempt. To do this, we need to parse the attempt ID into the URL using the link <code>./edit.php?id=1</code>. Then we use <code>$_SERVER["QUERY_STRING"]</code> to retrieve the querystring from the URL. After that, we pass the queryString into a function called <code>a = parse_str()</code> so that we can access the content through <code>a["id"]</code>
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
  </main>

  <?php
    require('./footer.inc');
  ?>
</body>


</html>