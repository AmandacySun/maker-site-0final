
<?php if (isset($_POST["submit3"])) {
    require_once "conn.php";
    $query = "SELECT * FROM future_event ";
    try {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->execute();
        $result = $prepared_stmt->fetchAll();
    } catch (PDOException $ex) {
        // Error in database processing.
        echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
} ?>




<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {
    require_once "conn.php";

    $event_name = $_POST["event_name"];
    $event_time = $_POST["event_time"];
    $host_name = $_POST["host_name"];
    $event_location = $_POST["event_location"];
    $difficulty = $_POST["difficulty"];
    $event_theme = $_POST["event_theme"];

    $query = "INSERT INTO future_event (event_id, event_name, event_time, host_name,event_location,difficulty,event_theme)
              VALUES (DEFAULT, :event_name, :event_time, :host_name,:event_location,:difficulty,:event_theme)";

    try {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->bindValue(":event_name", $event_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(":event_time", $event_time, PDO::PARAM_STR);
        $prepared_stmt->bindValue(":host_name", $host_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(
            ":event_location",
            $event_location,
            PDO::PARAM_STR
        );
        $prepared_stmt->bindValue(":difficulty", $difficulty, PDO::PARAM_STR);
        $prepared_stmt->bindValue(":event_theme", $event_theme, PDO::PARAM_STR);
        $prepared_stmt->execute();
    } catch (PDOException $ex) {
        // Error in database processing.
        echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}
?>


<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_POST["submit2"])) {
    require_once "conn.php";

    $event_name = $_POST["event_name"];

    $query = "DELETE FROM future_event WHERE event_name = :event_name";

    try {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->bindValue(":event_name", $event_name, PDO::PARAM_STR);
        $prepared_stmt->execute();
    } catch (PDOException $ex) {
        // Error in database processing.
        echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}
?>






<html>
	<head>
		<title>Future Events Edit</title>
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
						<li><a href="http://localhost/maker-site-backend/past_event2.php">Past Events</a></li>
						<li><a href="http://localhost/maker-site-backend/future_event.php">Future Events</a></li>
						<li><a href="http://localhost/maker-site-backend/tutorial.php">Tutorials</a></li>
					</ul>
					<ul class="actions stacked">
						<li><a href="admin_page.php" class="button fit">Back To Administrator Page</a></li>
					</ul>
				</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Add or Delete Future Event</h1>
									</header>
									<span class="image main"><img src="images/admin_page.png" style="width:300px"alt="" /></span>
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

												<form method="post" action="#">
                                                  <label id="add" for="add">
                                                  <h2>Add A New Future Event</h2>
                                                  </label>
                                                  <input type="text" name="event_name" id="event_name" placeholder="Event Name Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="event_time" id="event_time" placeholder="Event Time Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="host_name" id="host_name" placeholder="Host Name Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="event_location" id="event_location" placeholder="Event Location Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="difficulty" id="difficulty" placeholder="Difficulty Level Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                   <input type="text" name="event_theme" id="event_theme" placeholder="Event Theme Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                   <input type="submit" name="submit" id="submit" value="Add">



                                                </form>


                                                <form method="post" action="#">
                                                  <label id="remove" for="remove">
                                                  <h2>Delete A Future Event By Event Name</h2>
                                                  </label>
                                                  <input type="text" name="event_name" id="event_name" placeholder="Event Name Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                   <input type="submit" name="submit2" id="submit2" value="Delete">
                                                   <div> &nbsp  &nbsp</div>
                                                   <input type="submit" name="submit3" id="submit3" value="Show All Future Events">

                                                </form>

                                            <?php if (isset($_POST["submit3"])) {
                                                    if ($result && $prepared_stmt->rowCount() > 0 ) { ?>

                                                    <h2>All Future Events</h2>

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

                                                <?php foreach ($result as $row ) { ?>

                                                      <tr>
                                                        <td><?php echo $row["event_name"]; ?></td>
                                                        <td><?php echo $row["event_time"]; ?></td>
                                                        <td><?php echo $row["host_name"]; ?></td>
                                                        <td><?php echo $row["event_location"]; ?></td>
                                                        <td><?php echo $row["difficulty"]; ?></td>
                                                        <td><?php echo $row["event_theme"]; ?></td>

                                                      </tr>
                                                <?php } ?>
                                                      </tbody>
                                                  </table>

                                                <?php } else { ?>
                                                    Sorry, no future events are available.
                                                  <?php }
                                            } ?>

											</div>
											</div>
										</div>
									</div>
									<div class = "col-1"></div>
								</div>



							</div>



				<!-- Contact -->


				<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<ul class="icons">
							<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Vanderbilt Maker Club Dev Team</li><li>Design:Sunnie, Chang, Amanda</a></li>
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