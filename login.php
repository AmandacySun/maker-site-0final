<?php session_start(); // we start sessions before output ?>

<?php

//    if($_SERVER["REQUEST_METHOD"] == "POST") {
//       // username and password sent from form
//
//       $myusername = mysqli_real_escape_string($db,$_POST['username']);
//       $mypassword = mysqli_real_escape_string($db,$_POST['user_password']);
//
//       $sql = "SELECT login_id FROM login WHERE username = '$myusername' and user_password = '$mypassword'";
//       $result = mysqli_query($db,$sql);
//       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//
//       $count = mysqli_num_rows($result);
//
//       // If result matched $myusername and $mypassword, table row must be 1 row
//
//       if($count == 1) {
//          //session_register("myusername");
//          //$_SESSION['login_user'] = $myusername;
//
//          header("Location: http://localhost/maker-site-backend/admin_page.php");
//       }else {
//          //session_destroy();
//          echo ("Error: that username and password combination does not match any currently within our database");
//       }
//    }
 if (isset($_POST['submit'])) {
        require_once("conn.php");
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];

        $query = "SELECT * FROM login WHERE username=:username AND user_password=:user_password" ;
        try{
             $prepared_stmt = $dbo->prepare($query);
             $prepared_stmt->bindValue(':username', $username, PDO::PARAM_STR);
             $prepared_stmt->bindValue(':user_password', $password, PDO::PARAM_STR);
             $prepared_stmt->execute();
             $result = $prepared_stmt->fetchAll();
             if (isset($_POST['submit'])) {
                if ($result && $prepared_stmt->rowCount() > 0) {
                    header(' Location: http://localhost/maker-site-backend/admin_page.php');
                }}
        }catch (PDOException $ex){ // Error in database processing.
            echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
        }
 }
?>

<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <!-- Note: The "styleN" class below should match that of the banner element. -->
    <header id="header" class="alt">
        <a href="index.html" class="logo"><strong>Vanderbilt Maker Club
        </strong> </a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>
    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.html">Home</a></li>
            <li><a href="http://localhost/maker-site-backend/about.php">About Us</a></li>
            <li><a href="http://localhost/maker-site-backend/past_event.php">Past Events</a></li>
            <li><a href="http://localhost/maker-site-backend/future_event.php">Future Events</a></li>
            <li><a href="http://localhost/maker-site-backend/tutorial.php">Tutorials</a></li>
        </ul>
    </nav>



    <div id="main">
        <form>
            <div class="container-fluid" style="margin-top: 250px">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-7">
                        <p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Welcome back board members!
                            Please login using your designated credentials.</p>
                    </div>
                    <div class="col-3"></div>

                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">

                        <div class="form-group">
                            <form method = "post">
                            <div class="row"></div>

                            <div class="row">
                                <label class="col-2" for="username">Username:</label>
                                <input class="col-8" type="text" id="username" name="username" placeholder="Required" />
                                <div class="col-2"></div>
                            </div>
                                <div> &nbsp  &nbsp</div>

                            <div class="row">
                                <label class="col-2" for="user_password">Password:</label>
                                <input class="col-8" type="password" id="user_password" name="user_password" placeholder="Required" />
                                <div class="col-2"></div>
                            </div>
                                <div> &nbsp  &nbsp</div>

                                <div class="row">
                                    <div class="col-3"></div>
                                    <button class="col-6"  type="submit" name="submit" id="submit" >Log In</button>
                                    <div class="col-3" ></div>
                                </div>


                            </form>
               </div>
                    </div>
                    <div class = "col-1"></div>
                </div>



            </div>
        </form>

    </div>



        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <ul class="icons">
                    <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; Untitled</li><li>Design:Sunnie, Chang, Amanda</a></li>
                </ul>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>


</div>
</body>
</html>