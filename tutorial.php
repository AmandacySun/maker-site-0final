

<?php

    if (isset($_POST['submit'])) {
        require_once("conn.php");
        $query = "SELECT * FROM tutorial " ;
        try{
            $prepared_stmt = $dbo->prepare($query);
            $prepared_stmt->execute();
            $result = $prepared_stmt->fetchAll();
        }catch (PDOException $ex){ // Error in database processing.
            echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
        }
}
?>

<?php

    if (isset($_POST['search'])) {
        require_once("conn.php");
        $tutorial_type = $_POST['tutorial_type'];

        $query = "SELECT * FROM tutorial WHERE tutorial_type = :tutorial_type" ;

        try{
            $prepared_stmt = $dbo->prepare($query);
            $prepared_stmt->bindValue(':tutorial_type', $tutorial_type, PDO::PARAM_STR);
            $prepared_stmt->execute();
            $result = $prepared_stmt->fetchAll();
        }catch (PDOException $ex){ // Error in database processing.
            echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
        }
}
?>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit2'])) {

    require_once("conn.php");

    $comment_name = $_POST['comment_name'];
    $comment_email = $_POST['comment_email'];
    $comment_message = $_POST['comment_message'];


    $query = "INSERT INTO user_comment (comment_id, comment_name, comment_email,comment_message)
              VALUES (DEFAULT, :comment_name, :comment_email, :comment_message)";

    try
    {
      $prepared_stmt = $dbo->prepare($query);
$prepared_stmt->bindValue(':comment_name', $comment_name, PDO::PARAM_STR);
$prepared_stmt->bindValue(':comment_email', $comment_email, PDO::PARAM_STR);
$prepared_stmt->bindValue(':comment_message', $comment_message, PDO::PARAM_STR);
$prepared_stmt->execute();
}
catch (PDOException $ex)
{ // Error in database processing.
echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
}
}
?>



<html>
	<head>
		<title>Tutorials</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">


				<!-- Header -->
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
					<ul class="actions stacked">
						<li><a href="login.html" class="button fit">Log In As Administrator</a></li>
					</ul>
				</nav>

				<!-- Banner -->
                				<!-- Note: The "styleN" class below should match that of the header element. -->
                					<section id="banner" class="style2">
                						<div class="inner">
                							<span class="image">
                								<img src="images/memberplaceholder.jpg" alt="" />
                							</span>
                							<header class="major">
                								<h1>Let's Learn Together!</h1>
                							</header>
                							<div class="content">
                								<p>Here you can find all types of resources to
                									get you ready for a maker's adventure!</p>
                							</div>
                						</div>
                					</section>

				<!-- Main -->
					<div id="main" class="alt">


						<!-- Search Engine -->

							<div class="container-fluid">

								<div class="row">
									<div class="col-1"></div>
									<div class="col-10">

										<div class="form-group">


												<form method="post">
                                                <div class="row">
                                                    <div class="col-0"></div>
                                                    <div class="col-5">
                                                        <label id="tutorial_type" for="tutorial_type">
                                                            <h2>Search For More Resources!</h2>
                                                        </label>

                                                        <select name="tutorial_type" id="tutorial_type">
                                                            <option value="" disabled selected>Select a difficulty level</option>
                                                            <option value="video">video</option>
                                                            <option value="article">article</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-7"></div>
                                                 </div>
                                                  <div> &nbsp  &nbsp</div>


                                                  <div class="row">
                                                    <div class="col-0"></div>
                                                    <div class="col-5">
                                                     <input type="submit" name="search" id="search" value="Search">
                                                    </div>
                                                    <div class="col-7"></div>
                                                 </div>
                                                    <div> &nbsp  &nbsp</div>

                                                  <div class="row">
                                                    <div class="col-0"></div>
                                                    <div class="col-5">

                                                        <input type="submit" name="submit" id="submit" value="Show All Tutorials">
                                                    </div>
                                                    <div class="col-7"></div>
                                                 </div>

                                                </form>
                                               </div>


                                                <?php
                                                if (isset($_POST['submit'])) {
                                                  if ($result && $prepared_stmt->rowCount() > 0) { ?>

                                                     <section id="two" class="spotlights">

                                                        <?php foreach ($result as $row) { ?>
                                                           <?php $link = $row["tutorial_link"]?>
                                                            <section>
                                                                <div class="image">
                                                                    <?php if($row["tutorial_type"] == "video"){?>
                        									            <img src="images/tutorial_home.jpg" style="height:405px" alt="" data-position="center center" />
                        									        <?php }else{?>
                        									            <img src="images/tutorial_resource_image.png" style="height:405px" alt="" data-position="center center" />
                        									        <?php }?>
                        								        </div>
                         								           <div class="content">
                         									        <div class="inner">
                         										     <header class="major">
                         											 <a href=<?php echo $link ?> >
                         												 <h3><?php echo $row["tutorial_name"]; ?></h3>
                         											 </a>
                         										     </header>
                         										     <p><?php echo $row["tutorial_theme"]; ?></p>
                         									       </div>
                         								          </div>
                         							</section>
                                                  <?php } ?>
                                                  </section>

                                                <?php } else { ?>
                                                    Sorry, no tutorials are available.
                                                  <?php }
                                                } ?>



                                            <?php
                                                if (isset($_POST['search'])) {
                                                  if ($result && $prepared_stmt->rowCount() > 0) { ?>

                                                     <section id="two" class="spotlights">

                                                        <?php foreach ($result as $row) { ?>
                                                             <?php $link = $row["tutorial_link"]?>
                                                            <section>
                                                                <div class="image">
                                                                    <?php if($row["tutorial_type"] == "video"){?>
                        									            <img src="images/tutorial_home.jpg" style="height:405px" alt="" data-position="center center" />
                        									        <?php }else{?>
                        									            <img src="images/tutorial_resource_image.png" style="height:405px" alt="" data-position="center center" />
                        									        <?php }?>
                        									    </div>
                         								        <div class="content">
                         									       <div class="inner">
                         										      <header class="major">
                         											     <a href=<?php echo $link ?> >
                         												 <h3><?php echo $row["tutorial_name"]; ?></h3>
                         											     </a>
                         										      </header>
                         										      <p><?php echo $row["tutorial_theme"]; ?></p>
                         						                   </div>
                         								        </div>
                         							        </section>
                                                  <?php } ?>
                                                  </section>
                                                <?php } else { ?>
                                                   <p id="error message">  Sorry, no tutorials are found with type <?php echo $_POST['tutorial_type']; ?>. </p>
                                                  <?php }
                                                } ?>

											</div>
											</div>

									</div>
									<div class = "col-1"></div>
								</div>




                        <div> &nbsp  &nbsp</div>

						<!-- Table of Tutorials -->
						<section id="two" class="spotlights">

                        							<section>
                        								<div class="image">
                        									<img src="images/3d_printing_tutorial.jpg" style="height:405px" alt="" data-position="center center" />
                        								</div>
                        								<div class="content">
                        									<div class="inner">
                        										<header class="major">
                        											<a href="https://www.youtube.com/watch?v=3LBTkLsjHGQ">
                        												<h3>3D Printing</h3>
                        											</a>
                        										</header>
                        										<p>3D printing or additive manufacturing is a process of making three dimensional solid objects from a digital file.
                        											The creation of a 3D printed object is achieved using additive processes.
                        											In an additive process an object is created by laying down successive layers of material until the object is created.
                        											Each of these layers can be seen as a thinly sliced cross-section of the object.
                        											3D printing is the opposite of subtractive manufacturing which is cutting out / hollowing out a piece of metal or
                        											plastic with for instance a milling machine. 3D printing enables you to produce complex shapes using
                        											less material than traditional manufacturing methods.</p>
                        									</div>
                        								</div>
                        							</section>

                        							<section>
                        								<div class="image">
                        									<img src="images/laser_cutting_tutorial.jpg" style="height:405px"  alt="" data-position="center center" />
                        								</div>
                        								<div class="content">
                        									<div class="inner">
                        										<header class="major">
                        											<a href="https://www.twi-global.com/what-we-do/research-and-technology/technologies/welding-joining-and-cutting/lasers/laser-cutting">
                        												<h3>Laser Cutting</h3>
                        											</a>
                        										</header>
                        										<p>Laser cutting is the largest industrial application of high power lasers; ranging
                        											from profile cutting of thick-section sheet materials for large industrial applications,
                        											to medical stents. The process lends itself to automation with offline CAD/CAM systems controlling
                        											3-axis flatbed, 6-axis robots, or remote systems. Traditionally, CO2 laser sources have dominated the laser cutting industry.
                        											However, recent advances in fibre-delivered, solid-state laser technologies has enhanced the benefits of laser cutting,
                        											by providing the end-user with increased cutting speeds and decreased operating costs.</p>
                        									</div>
                        								</div>
                        							</section>



                        	</section>

				<section id="contact">
                					<div class="inner">
                						<section>
                                            <form method="post" action="#">
                										<div class="fields">
                											<div class="field half">
                												<label for="comment_name">Name</label>
                                                                <input type="text" name="comment_name" id="comment_name" />
                											</div>
                											<div class="field half">
                												<label for="comment_email">Email</label>
                                                                <input type="text" name="comment_email" id="comment_email" />
                											</div>
                											<div class="field">
                												<label for="comment_message">Message</label>
                												<textarea name="comment_message" id="comment_message" rows="6"></textarea>
                											</div>
                										</div>
                										<ul class="actions">
                											<li><input type="submit" name="submit2" value="Send Message" class="primary" /></li>
                											<li><input type="reset" value="Clear" /></li>
                										</ul>
                								</form>
                						</section>
                						<section class="split">
                							<section>
                								<div class="contact-method">
                									<span class="icon solid alt fa-envelope"></span>
                									<h3>Email</h3>
                									<a href="#">MakeClub@vanderbilt.edu</a>
                								</div>
                							</section>
                							<section>
                								<div class="contact-method">
                									<span class="icon solid alt fa-phone"></span>
                									<h3>Phone</h3>
                									<span>(000) 000-0000 x12387</span>
                								</div>
                							</section>
                							<section>
                								<div class="contact-method">
                									<span class="icon solid alt fa-home"></span>
                									<h3>Address</h3>
                									<span>2301 Vanderbilt Place<br />
                										Nashville, TN 37235<br />
                										United States of America</span>
                								</div>
                							</section>
                						</section>
                					</div>
                				</section>

                				<!-- Footer -->
                				<footer id="footer">
                					<div class="inner">
                						<ul class="icons">
                							<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                							<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                						</ul>
                						<ul class="copyright">
                							<li>&copy; Vanderbilt Maker Club Dev Team</li><li>Design: Sunnie, Chang, Amanda</a></li>
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

                	</body>
                </html>