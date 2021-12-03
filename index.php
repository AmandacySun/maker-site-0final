<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {

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
		<title>Home Page</title>
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
						<li><a href="index.php">Home</a></li>
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
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>We are the Vanderbilt University Maker Club!</h1>
							</header>
							<div class="content">
								<p>Our Organization's mission is to help students build projects from
									brainstorming to finished product using rapid prototyping (and feedback)
									to iterate on their designs. We want to create a community of makers from all
									majors and/or levels of experience where people can come together to learn
									how to build out the ideas they have in their minds. Whether that means teaching
									them how to CAD or 3D print or whether that means supplying them with the materials
									they need for a project, we want to remove the barriers of entry to making for
									Vanderbilt students.</p>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one" class="tiles">
								<article>
									<span class="image">
										<img src="images/pic01.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="http://localhost/maker-site-backend/about.php" class="link">About Us</a></h3>
										<p>Want to know more about our history and stories? Find out more at here!</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic02.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="http://localhost/maker-site-backend/past_event.php" class="link">Past Events</a></h3>
										<p>Explore what has been happening lately within our club!</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic07.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="http://localhost/maker-site-backend/future_event.php" class="link">Future Events</a></h3>
										<p>Want to attend a workshop! Find the information here!</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic11.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="http://localhost/maker-site-backend/tutorial.php" class="link" >Tutorial</a></h3>
										<p>This is the right place if you want to learn something new!</p>
									</header>
								</article>
							</section>

				<!-- Contact -->
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
											<li><input type="submit" name="submit" value="Send Message" class="primary" /></li>
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
								<li><a href="https://www.instagram.com/vanderbiltmakerclub/" class="icon brands alt fa-instagram">
									<span class="label">Instagram</span></a></li>
								<li><a href="https://www.facebook.com/VandyMakerClub/" class="icon brands alt fa-facebook-f">
									<span class="label">Facebook</span></a></li>
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