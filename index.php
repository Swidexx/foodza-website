<?php
  $connection = mysql_connect("localhost","root","Nepa65127") OR die(mysql_error());
  $db_select = mysql_select_db("logins",$connection) OR die(mysql_error());
  $errors = array();
  if(isset($_POST["iebugaround"])){
  } else {
    $uname = "";
  }
  /lets fetch posted details
  $uname = trim(htmlentities($_POST['username']));
  $passw = trim(htmlentities($_POST['password']));
  if(!$errors){
  }
  //encrypt the password
  $passw = sha1($passw);
  $salt = md5("userlogin");
  $pepper = "kikikikikicbtr";

  $passencrypt = $salt . $passw . $pepper;

  //find out if user and password are present
  $query = "SELECT * FROM users WHERE username='".mysql_real_escape_string($uname)."' AND password='".mysql_real_escape_string($passencrypt)."'";
  $result = mysql_query($query) OR die(mysql_error());

?>
<!DOCTYPE html>
<html>
<head>
  <title>Foodza | Home</title>
  <link rel=icon href=assets/favicon.png>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/scrolling-nav.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  <video playsinline autoplay muted loop>
    <source src="assets/front.mp4" type="video/mp4">
  </video>
  <div class="personal">
    <p class="paragraph"><button class="account" onclick="document.getElementById('id01').style.display='block'">login</button></p>
  </div>
  <br><br><br>
  <div class="nav">
    <Center>
      <p><a class="btn btn-default page-scroll" href="#about"><button class="navbar" id="about_btn">about us</button></a>  -
      <a class="btn btn-default page-scroll" href="#features"><button class="navbar" id="features_btn">features</button></a>  -
      <a class="btn btn-default page-scroll" href="#register"><button class="navbar" id="register_btn">register</button></a>  -
      <a class="btn btn-default page-scroll" href="#partners"><button class="navbar" id="partners_btn">our partners</button></a></p>
    </center>
  </div>
  <div class="bar"><br><br><br>
    <p class="title">Foodza</p>
    <p class="subtitle">making food great again</p><Br>
  </div>
  <br><br><br><br>
  <div class="bar2" id="about"><br><br>
    <p class="title2">About Us</p>
    <p class="paragraph">
      We provide an easy way of having a liason between producer and consumer.<br>
      We let companies know what the people want, while rewarding people for giving them information!
    </p><br><br>
  </div>
  <br>
  <div class="bar2" id="features"><br><br>
    <p class="title2">Features</p>
    <table class="features" align="center">
      <tr>
        <td class="features"></td>
        <td class="features">
          <img src="assets/shopping_cart.png"><br>
          <p class="header">Easy Polls and Surveys</p>
          <p class="paragraph">Earn points by taking surveys and polls, helping Flik understand what the people want and don't want!<p>
        </td>
        <td class="features">
          <img src="assets/shopping_cart.png"><br>
          <p class="header">Earning Rewards</p>
          <p class="paragraph">Use points to buy rewards, such as Amazon Giftcards, having front line in Lunch, and other great rewards!<p>
        </td>
        <td class="features"></td>
      </tr>
      <tr>
        <td class="features"><br><br></td>
      </tr>
      <tr>
        <td class="features"></td>
        <td class="features">
          <img src="assets/shopping_cart.png">
          <p class="header">Up-To-Date Menu</p>
          <p class="paragraph">Menu updated directly from Flik's menu through a reactive API.<p>
        </td>
        <td class="features">
          <img src="assets/shopping_cart.png">
          <p class="header">Conserving Food</p>
          <p class="paragraph">Removing waste by informing partners like Flik know how much and what the people want<p>
        </td>
        <td class="features"></td>
      </tr>
    </table>
  </div>
  <br>
  <div class="bar4" id="register">
    <form class="register">
      <p class="title">Register</p>
      <input type="text" placeholder="enter username" name="username" required>
      <input type="password" placeholder="enter password" name="pwd" required><br><br>
      <input type="email" placeholder="enter email" name="email" required>
      <input type="text" placeholder=" enter full name" name="name" required><br><br>
      <select name="cars" placeholder="school" name="school" required>
        <option value="volvo">Creighton Preparatory School</option>
        <option value="saab">Convent of the Sacred Heart NYC</option>
        <option value="fiat">Sacred Heart Greenwich</option>
      </select><br><br>
      <input class="submit" type="submit">
    </form>
  </div>
  <br>
  <div class="bar2" id="partners"><br>
    <p class="title2">Our Partners</p>
    <table class="features" align="center">
      <tr>
        <td class="features"></td>
        <td class="features">
          <img src="assets/flik.svg"><br>
        </td>
        <td class="features">
          <img src="assets/myschoolbucks.png"><br>
        </td>
        <td class="features"></td>
      </tr>
    </table><br><br><br>
  </div>
  <br>
  <div class="nav">
    <Center>
      <p><a class="btn btn-default page-scroll" href="#about"><button class="navbar" id="about_btn">about us</button></a>  -
      <a class="btn btn-default page-scroll" href="#features"><button cclass="navbar" id="features_btn">features</button></a>  -
      <a class="btn btn-default page-scroll" href="#register"><button class="navbar" id="register_btn">register</button></a>  -
      <a class="btn btn-default page-scroll" href="#partners"><button class="navbar" id="partners_btn">our partners</button></a>  -
    </center>
    <br><br><br><br><br>
  </div>
  <br>
  <div id="id01" class="modal">

  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <input name="iebugaround" type="hidden" value="1">
      <label><b class="header">username</b></label>
      <input class="login" value="<?php echo $uname ; ?>" type="text" placeholder="enter username" name="username" required>
<br>
      <label><b class="header">password</b></label>
      <input class="login" type="password" placeholder="enter password" name="pwd" required>
<br>
      <button class="login" type="submit">login</button>
    </div>
  </form>
</div>
  <div class="bar3">
    <p class="paragraph">
      Copyright ©
      <script type="text/javascript">
        document.write(new Date().getFullYear());
      </script>
      Foodza | Designed by Ben Hall
    </p>
  </div>
</body>
</html>
