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
  <form method="post" action="markquiz.php" novalidate = "novalidate">
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
          <select name = "ques1">
            <option id="default-val1" value = "" class="answer">Select your answer</option>
            <option value="protocol" class="ques1-opt2">Protocol</option>
            <option value="bandwidth" class="ques1-opt2">Bandwidth</option>
            <option value="pandas" class="ques1-opt3">Pandas</option>
            <option value="blockchain" class="ques1-opt4">Blockchain</option>
          </select>
        </div><br><br>
        <p>Which is the correct definition of <span class="streaming-media">streaming media</span>?</p><br>
        <div class="radio-ans">
          <input type="radio" name="ques2" value = "A" class="answer" id="def-ans1" required>
          <label for="def-ans1">A. Multimedia that is delivered and consumed content in a continuous manner from a
            source.</label><br><br>
          <input type="radio" name="ques2" value = "B" class="answer" id="def-ans2" >
          <label for="def-ans2">B. Multimedia that is an application where people can see printed books
            online.</label><br><br>
          <input type="radio" name="ques2" value = "C" class="answer" id="def-ans3">
          <label for="def-ans3">C. Multimedia that is an applications that does not require internet to deliver and
            consume.</label><br><br>
          <input type="radio" name="ques2" value = "D" class="answer" id="def-ans4">
          <label for="def-ans4">D. Multimedia supplies you a platform where you can share study materials.</label>
        </div><br><br>




        <p>How many <span class="streaming-media">streaming media</span> platforms are there is those pictures below?</p>
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
          <input type="radio" name="ques3" value = "A" class="answer" id="ques2-ans1" required>
          <label for="ques2-ans1">A. 2</label><br><br>
          <input type="radio" name="ques3" value = "B" class="answer" id="ques2-ans2">
          <label for="ques2-ans2">B. 3</label><br><br>
          <input type="radio" name="ques3" value = "C" class="answer" id="ques2-ans3">
          <label for="ques2-ans3">C. 4</label><br><br>
          <input type="radio" name="ques3" value = "D" class="answer" id="ques2-ans4">
          <label for="ques2-ans4">D. 5</label>
        </div><br><br>

        <p>What does Bus Bandwidth technology refer to?</p><br>
        <div class="radio-ans">
          <input type="radio" name="ques4" value = "A" class="answer" id="banwidth-ans1" required>
          <label for="banwidth-ans1">A. It refers to unsupervised classification in machine learning.</label><br><br>
          <input type="radio" name="ques4" value = "B" class="answer" id="bandwidth-ans2">
          <label for="bandwidth-ans2">B. It refers to the number of bits that can be sent to the CPU
            simultaneously.</label><br><br>
          <input type="radio" name="ques4" value = "C" class="answer" id="bandwidth-ans3">
          <label for="bandwidth-ans3">C. It refers to Internet protocol.</label><br><br>
          <input type="radio" name="ques4" value = "D" class="answer" id="bandwidth-ans4">
          <label for="bandwidth-ans4">D. None of them gives the correct answer.</label>
        </div><br><br>
        <p>Which is the most prevalent <span class="streaming-media">streaming media</span> at the momment?</p><br>
        <div class="ques-option">
          <select name = "ques5">
            <option id="default-val" value = "" class="ans-opt">Select your answer</option>
            <option value="netflix" class="ans-opt">Netflix</option>
            <option value="hbo-go" class="ans-opt">HBO GO</option>
            <option value="disney+" class="ans-opt">Disney +</option>
            <option value="tencent-vid" class="ans-opt">Tencent Video</option>
          </select>
        </div>
        <br>
        <label for="advantages">How many members do Disney+ have in 2022?</label><br><br>
        <input type="text" name="ques6" id="advantages" class="box" placeholder="Your answer will be here..."
          required>
        <br><br>
        <p class="ques-checkbox">Which of these are the advantages of <span class="streaming-media">streaming
            media</span> at the momment?(Choose 3, one wrong answer or not enough number of questions will be 0 point) 
            <span class="note">(You can choose more than one answer)</span></p>
        <div class="ques-checkbox-ans">
          <input type="checkbox" name="ques7[]" value = "A" class="answer"><label>A. You can always see latest movies and
            series.</label><br><br>
          <input type="checkbox" name="ques7[]" value = "B" class="answer"><label>B. Instant playback everytime.</label><br><br>
          <input type="checkbox" name="ques7[]" value = "C" class="answer"><label>C. Increasing the obesity rate in
            children.</label><br><br>
          <input type="checkbox" name="ques7[]" value = "D" class="answer"><label>D. Prevent kids from following inappropriate
            contents.</label><br><br>
          <input type="checkbox" name="ques7[]" value = "E" class="answer"><label>E. It can leads to social isolation.</label><br><br>
          <input type="checkbox" name="ques7[]" value = "F" class="answer"><label>F. You can watch it wherever you
            want.</label><br><br>
          <input type="checkbox" name="ques7[]" value = "G" class="answer"><label>G. The privacy could be decrease because online
            content is made available.</label><br><br>
          <input type="checkbox" name="ques7[]" value = "H" class="answer"><label>H. The quality might be affected by corrupted
            connection.</label><br><br>
        </div><br>
        <div class="ques-textarea">
          <p>Will <span class="streaming-media">streaming media</span> grow in the future?(yes/no)</p><br>
          <textarea name ="ques8" placeholder="Enter your answer here..." required></textarea>
        </div><br>
        <p>What is the key role that make <span class="streaming-media">streaming media</span> company become success in
          the competition?</p><br>
        <div class="ques-option">
          <select name = "ques9">
            <option id="default-val2"  value = "" class="answer">Select your answer</option>
            <option value="technology"  class="ans-opt">They applied modern technology</option>
            <option value="content" class="ans-opt">They offer exclusive content, self-produced and created
              specifically for the market</option>
            <option value="popular"  class="ans-opt">They try to make popular content that matched the global demands
            </option>
            <option value="advertisements"  class="ans-opt">They reduce the time spending on advertisements</option>
          </select>
        </div><br>
        <p>What make <span class="streaming-media">streaming media</span> become prevalent at the momment?</p><br>
        <div class="radio-ans">
          <input type="radio" name="ques10" value = "A" class="answer" id="def2-ans1" required>
          <label for="def2-ans1">A. Its convinience to update content.</label><br><br>
          <input type="radio" name="ques10" value = "B" class="answer" id="def2-ans2">
          <label for="def2-ans2">B. Its disadvantages into children.</label><br><br>
          <input type="radio" name="ques10" value = "C" class="answer" id="def2-ans3">
          <label for="def2-ans3">C. Users can watch up-to-date multiple TV show.</label><br><br>
          <input type="radio" name="ques10" value = "D" class="answer" id="def2-ans4">
          <label for="def2-ans4">D. The dominance of internet worldwide.</label>
        </div><br><br>
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