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
		<title>About Us</title>
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
				<!-- Note: The "styleN" class below should match that of the header element. -->
					<section id="banner" class="style2">
						<div class="inner">
							<span class="image">
								<img src="images/memberplaceholder.jpg" alt="" />
							</span>
							<header class="major">
								<h1>The Executive Board Members</h1>
							</header>
							<div class="content">
								<p>Here you can find introductions and contact information of each and every
									executive board members of our club!</p>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- Two -->
							<section id="two" class="spotlights">

								<section>
									<div class="image">
										<img src="images/member_two.jpg"
											 height="450"
											 alt="" data-position="center center"/>
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<a href="https://www.linkedin.com/in/anushka-v-iyer/">
													<h3>Anushka Iyer</h3>
												</a>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/member_one.jpg"
										height="450" alt="" data-position="center center"
										/>
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<a href="https://www.linkedin.com/in/changuo0/">
													<h3>Chang Guo</h3>
												</a>
											</header>
											<p>Vice President</p>
											<p>Senior at Vanderbilt University double majoring in Computer Science and Math. Strong programming,
												and problem-solving skills. I have project experience on full stack web and mobile
												development using Java Servlet, React JS, Go, etc. I am passionate about facilitating
												our members develop useful engineering skills.
											</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name3</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name4</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name5</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name6</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name7</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name8</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name9</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>

								<section>
									<div class="image">
										<img src="images/memberplaceholder.jpg" alt="" data-position="center center" />
									</div>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>Name10</h3>
											</header>
											<p>A paragraph of introduction</p>
										</div>
									</div>
								</section>




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
			</div>
	</body>
</html>