<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="./styles/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quizz</title>
  <script src="https://kit.fontawesome.com/37641fc831.js" crossorigin="anonymous"></script>
</head>

<body id="quizz-body">
  <?php
    require('./navbar.inc');
  ?>
  <div class="heading">
    <h1 id="head"> Quizz time!</h1>
    <h2 id="subheading"><i>Thank you for taking the time to fill the form</i></h2>
  </div>
  <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">
    <div id="question-part">
      <fieldset class="fieldset">

        <legend class="legend">Personal details</legend>
        <p>First name</p><br>
        <input type="text" name="fname" placeholder="Enter your name" class="box" required pattern="^[a-zA-Z -]+$"
          maxlength="30" title="Only contains characters and the number of characters must be under 30!"
          autofocus><br><br>
        <p>Last name</p><br>
        <input type="text" name="lname" placeholder="Enter your name" class="box" required pattern="^[a-zA-Z -]+$"
          title="Only contains characters and the number of characters must be under 30!"><br><br>
        <p>Age</p><br>
        <input type="text" name="age" placeholder="Enter your name" class="box" required><br><br>
        <p>Student ID</p><br>
        <input type="text" name="id" placeholder="Enter your name" class="box" required pattern="(\d{7}|\d{10})$"
          title="The length of your ID must be 7 or 10!"><br><br>
      </fieldset>
      <fieldset class="fieldset">
        <legend class="legend">Questions</legend>
        <br>
        <p>Which is the main technology of <span class="streaming-media">streaming media</span>?</p><br>
        <div class="ques-option">
          <select>
            <option id="default-val1" class="answer">Select your answer</option>
            <option value="Protocol" class="ans-opt">Protocol</option>
            <option value="Bandwidth" class="ans-opt">Bandwidth</option>
            <option value="Pandas" class="ans-opt">Pandas</option>
            <option value="Blockchain" class="ans-opt">Blockchain</option>
          </select>
        </div><br><br>
        <p>Which is the correct definition of <span class="streaming-media">streaming media</span>?</p><br>
        <div class="radio-ans">
          <input type="radio" name="radio" class="answer" id="def-ans1" required>
          <label for="def-ans1">Multimedia that is delivered and consumed content in a continuous manner from a
            source.</label><br><br>
          <input type="radio" name="radio" class="answer" id="def-ans2">
          <label for="def-ans2">Multimedia that is an application where people can see printed books
            online.</label><br><br>
          <input type="radio" name="radio" class="answer" id="def-ans3">
          <label for="def-ans3">Multimedia that is an applications that does not require internet to deliver and
            consume.</label><br><br>
          <input type="radio" name="radio" class="answer" id="def-ans4">
          <label for="def-ans4">Multimedia supplies you a platform where you can share study materials.</label>
        </div><br><br>




        <p>How many <span class="streaming-media">streaming media</span> platforms are there is those picture below</p>
        <div id="logo">
          <img src="images/twitch.jpeg" width="150" height="150" alt="Twitch">
          <img src="images/facebook.png" width="150" height="150" alt="Facebook">
          <img src="images/leetcode.jpeg" width="150" height="150" alt="LeetCode">
          <br>
          <img src="images/netflix.png" width="150" height="150" alt="Netflix">
          <img src="images/google.jpeg" width="150" height="150" alt="Google">
          <img src="images/instagram.jpeg" width="150" height="150" alt="Instagram">
        </div>
        <div class="radio-ans">
          <input type="radio" name="number_of_media" class="answer" id="ques2-ans1" required>
          <label for="ques2-ans1">2</label><br><br>
          <input type="radio" name="number_of_media" class="answer" id="ques2-ans2">
          <label for="ques2-ans2">3</label><br><br>
          <input type="radio" name="number_of_media" class="answer" id="ques2-ans3">
          <label for="ques2-ans3">4</label><br><br>
          <input type="radio" name="number_of_media" class="answer" id="ques2-ans4">
          <label for="ques2-ans4">5</label>
        </div><br><br>

        <p>What does Bus Bandwidth technology refer to?</p><br>
        <div class="radio-ans">
          <input type="radio" name="radio" class="answer" id="banwidth-ans1" required>
          <label for="banwidth-ans1">It refers to unsupervised classification in machine learning.</label><br><br>
          <input type="radio" name="radio" class="answer" id="bandwidth-ans2">
          <label for="bandwidth-ans2">It refers to the number of bits that can be sent to the CPU
            simultaneously.</label><br><br>
          <input type="radio" name="radio" class="answer" id="bandwidth-ans3">
          <label for="bandwidth-ans3">It refers to Internet protocol.</label><br><br>
          <input type="radio" name="radio" class="answer" id="bandwidth-ans4">
          <label for="bandwidth-ans4">None of them gives the correct answer.</label>
        </div><br><br>
        <p>Which is the most prevalent <span class="streaming-media">streaming media</span> at the momment?</p><br>
        <div class="ques-option">
          <select>
            <option id="default-val" class="ans-opt">Select your answer</option>
            <option value="Netflix" class="ans-opt">Netflix</option>
            <option value="HBO GO" class="ans-opt">HBO GO</option>
            <option value="Disney +" class="ans-opt">Disney +</option>
            <option value="Tencent Video" class="ans-opt">Tencent Video</option>
          </select>
        </div>
        <br>
        <label for="advantages">List three main advantages of <span class="streaming-media">streaming media</span>? <span
            class="note">(Each points should be seperated by ",")</span></label><br><br>
        <input type="text" name="advantages" id="advantages" class="box" placeholder="Your answer will be here..."
          required>
        <br><br>
        <p class="ques-checkbox">Which of these are the main advantages of <span class="streaming-media">streaming
            media</span> at the momment? <span class="note">(You can choose more than one answer)</span></p>
        <div class="ques-checkbox-ans">
          <input type="checkbox" name="checkbox" class="answer"><label>You can always see latest movies and
            series.</label><br><br>
          <input type="checkbox" name="checkbox" class="answer"><label>Watching contents without
            downloading.</label><br><br>
          <input type="checkbox" name="checkbox" class="answer"><label>Increasing the obesity rate in
            children.</label><br><br>
          <input type="checkbox" name="checkbox" class="answer"><label>Prevent kids from following inappropriate
            contents.</label><br><br>
          <input type="checkbox" name="checkbox" class="answer"><label>It can leads to social isolation.</label><br><br>
          <input type="checkbox" name="checkbox" class="answer"><label>You can watch it wherever you
            want.</label><br><br>
          <input type="checkbox" name="checkbox" class="answer"><label>The privacy could be decrease because online
            content is made available.</label><br><br>
          <input type="checkbox" name="checkbox" class="answer"><label>The quality might be affected bycorrupted
            connection.</label><br><br>
        </div><br>
        <div class="ques-textarea">
          <p>Write a short paragraph about how <span class="streaming-media">streaming media</span> might grow in the
            future?</p><br>
          <textarea placeholder="Enter your answer here..." required></textarea>
        </div><br>
        <p>What is the key role that make <span class="streaming-media">streaming media</span> company become success in
          the competition?</p><br>
        <div class="ques-option">
          <select>
            <option id="default-val2" class="answer">Select your answer</option>
            <option value="Protocol" class="ans-opt">They applied modern technology</option>
            <option value="Bandwidth" class="ans-opt">They offer exclusive content, self-produced and created
              specifically for the market</option>
            <option value="Pandas" class="ans-opt">They try to make popular content that matched the global demands
            </option>
            <option value="Blockchain" class="ans-opt">They reduce the time spending on advertisements</option>
          </select>
        </div><br>
      </fieldset>
      <div class="button">
        <input type="reset" name="reset" value="RESET" id="reset-button" class="btn">
        <input type="submit" name="submit" value="SUBMIT" id="submit-button" class="btn">
      </div>
    </div>
  </form>
  <?php
    require('./footer.inc')
  ?>
  
</body>


</html>