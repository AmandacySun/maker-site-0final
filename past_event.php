
<?php


        require_once("conn.php");
        $query1 = "SELECT * FROM past_event " ;
        try{
            $prepared_stmt1 = $dbo->prepare($query1);
            $prepared_stmt1->execute();
            $result1 = $prepared_stmt1->fetchAll();
        }catch (PDOException $ex){ // Error in database processing.
            echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
        }

?>





<?php

    if (isset($_POST['submit'])) {
        require_once("conn.php");
        $host_name = $_POST['host_name'];

        $query = "SELECT * FROM past_event WHERE host_name = :host_name" ;

        try{
            $prepared_stmt = $dbo->prepare($query);
            $prepared_stmt->bindValue(':host_name', $host_name, PDO::PARAM_STR);
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
		<title>Past Events</title>
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

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Past Maker Club Events</h1>
									</header>
									<span class="image main"><img src="images/past_events_home.png" style="width:300px"alt="" /></span>
								</div>
							</section>




						<!-- Search Engine -->

							<div class="container-fluid">

								<div class="row">
									<div class="col-1"></div>
									<div class="col-10">

										<div class="form-group">
											<div class="row">
											<div class="col-12">

												<form method="post">
                                                  <label id="host_name_search" for="host_name">
                                                  <h2>Enter Host Name To Search For A Specific Past Event</h2>
                                                  </label>
                                                  <input type="text" name="host_name" id="host_name" placeholder="Host Name Here">
                                                  <div> &nbsp  &nbsp</div>
                                                  <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-2">
                                                        <input type="submit" name="submit" id="submit" value="Search">
                                                    </div>
                                                    <div class="col-5"></div>
                                                 </div>

                                                </form>




                                                <?php
                                                if (isset($_POST['submit'])) {
                                                  if ($result && $prepared_stmt->rowCount() > 0) { ?>

                                                    <h2>Past Events Hosted by <?php echo $_POST['host_name']; ?></h2>

                                                    <table>
                                                      <thead>
                                                		<tr>
                                                          <th>Event Name</th>
                                                          <th>Event Time</th>
                                                          <th>Attendant Number</th>
                                                          <th>Host</th>
                                                          <th>Event Location</th>
                                                          <th>Difficulty Level</th>
                                                          <th>Event Theme</th>
                                                		</tr>
                                                      </thead>
                                                      <tbody>

                                                <?php foreach ($result as $row) { ?>

                                                      <tr>
                                                        <td><?php echo $row["event_name"]; ?></td>
                                                        <td><?php echo $row["event_time"]; ?></td>
                                                        <td><?php echo $row["attend_num"]; ?></td>
                                                        <td><?php echo $row["host_name"]; ?></td>
                                                        <td><?php echo $row["event_location"]; ?></td>
                                                        <td><?php echo $row["difficulty"]; ?></td>
                                                        <td><?php echo $row["event_theme"]; ?></td>

                                                      </tr>
                                                <?php } ?>
                                                      </tbody>
                                                  </table>

                                                <?php } else { ?>
                                                    <p id="error message"> Sorry, no past events are found hosted by <?php echo $_POST['host_name']; ?>.</p>
                                                  <?php }
                                                } ?>



                                               <?php

                                                  if ($result1 && $prepared_stmt1->rowCount() > 0) { ?>

                                                    <h2>All Past Events</h2>

                                                    <table>
                                                      <thead>
                                                		<tr>
                                                          <th>Event Name</th>
                                                          <th>Event Time</th>
                                                          <th>Host</th>
                                                          <th>Event Location</th>
                                                          <th>Difficulty Level</th>
                                                          <th>Event Theme</th>
                                                		</tr>
                                                      </thead>
                                                      <tbody>

                                                <?php foreach ($result1 as $row1) { ?>

                                                      <tr>
                                                        <td><?php echo $row1["event_name"]; ?></td>
                                                        <td><?php echo $row1["event_time"]; ?></td>
                                                        <td><?php echo $row1["host_name"]; ?></td>
                                                        <td><?php echo $row1["event_location"]; ?></td>
                                                        <td><?php echo $row1["difficulty"]; ?></td>
                                                        <td><?php echo $row1["event_theme"]; ?></td>

                                                      </tr>
                                                <?php } ?>
                                                      </tbody>
                                                  </table>

                                                <?php } else { ?>
                                                    Sorry, no past events are available.
                                                  <?php }  ?>


											</div>
											</div>
										</div>
									</div>
									<div class = "col-1"></div>
								</div>



							</div>


						<!-- Table of Past Events -->

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