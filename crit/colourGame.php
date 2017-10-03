<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>permaIndex</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/colourGame.css">
	</head>
	<body>
    <!-- START NAV -->

    <!-- END NAV -->

		<!-- START CONTENT -->
    <div id="titlebox">
      <h1>Perma<i class="fa fa-ravelry" aria-hidden="true"></i>frown's Colour Guessing Game</h1>
      <h3>Guess Which Colour Is:</h3>
      <h3><span id="colourDisplay"></span></h3>
        <div id="stripe">
					<button id="back" type="button" name="button"><a href="../../content.php?cat=games">Back</a></button>
          <button id="reset" type="button" name="button">New Colours?</button>
          <span id="message"></span>
          <button class="mode" type="button" name="button">Easy</button>
          <button class="mode selected" type="button" name="button">Hard</button>
        </div>
    </div>

    <div id="container">
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
    </div>
    <!-- END CONTENT -->

    <script type="text/javascript" src="js/colourGame.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>
