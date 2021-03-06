<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Dashboard</title>
		<!-- include core JS functions -->
		<script src="../lib/js/functions.js"></script>
		<script src='../lib/js/checklogin.js'></script>

    <!-- Bootstrap core CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
	<link href="../lib/css/forms.css" rel="stylesheet">
	<link href="../lib/css/sticky-footer.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
  </head>

  <body>
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">Team list</h2>
	<p>
		Here you can see all of the teams in the network, which Programme Manager is responsible for them, and which mentors have been assigned to them.
	Clicking on a team you mentor will bring up their latest reports and score breakdown.
	</p>
	<?php include_once("../lib/php/teamlist.php"); ?>
	<h3>
		Your teams
	</h3>
	<div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Team</th>
						  <th>Programme Manager</th>
						  <th>Mentors</th>
						  <th>Hours</th>
						  <th>Score</th>
					  </tr>
				  </thead>
				  <tbody class="list">
					  <?php echo $mentorsteams; ?>
				  </tbody>
			  </table>
				</div>
<div id="teamlistcontainer">
	<h3>
		All teams
	</h3>
	<p>
		You can use the search bar to query any of these fields.
	</p>
	<input class="search" placeholder="Search Teams">
	<div class="table-responsive">
			  <table class='table table-striped' id="tprtable">
				  <thead>
					  <tr>
						  <th id='teamname' class='sort' data-sort='teamname'>Team</th>
						  <th id='programmemanager' class='sort' data-sort='programmemanager'>Programme Manager</th>
						  <th id='mentors' class='sort' data-sort='mentors'>Mentors</th>
					  </tr>
				  </thead>
				  <tbody class="list">
					  <?php echo $otherteams; ?>
				  </tbody>
			  </table>
				</div>
	</div>
				
</div>
					
      </div>
    </div>
<footer class="footer">
	<?php include_once('footer.htm'); ?>
</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
		<script src="../lib/js/custom.js"></script>
		<script src='../lib/listjs/dist/list.js'></script>
		<script>var options = { valueNames: [ 'teamname', 'programmemanager', 'mentors', 'score' ] };</script>
		<script>var tprList = new List('teamlistcontainer', options);</script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
