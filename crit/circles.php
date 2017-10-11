<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>permaCircles</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<script type="text/javascript" src="lib/paperjs/paper-full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.5/howler.min.js" integrity="sha256-kIkROHue+GFp6vhajZDKle5ISIkWrxcJKHZwLzT893A=" crossorigin="anonymous"></script>
		<script type="text/paperscript" canvas="myCanvas">

    var keyData = {
    	q: {
    		sound: new Howl({
      		src: ['lib/sounds/bubbles.mp3']
    		}),
    		color: '#1abc9c'
    	},
    	w: {
    		sound: new Howl({
      		src: ['lib/sounds/clay.mp3']
    		}),
    		color: '#2ecc71'
    	},
    	e: {
    		sound: new Howl({
      		src: ['lib/sounds/confetti.mp3']
    		}),
    		color: '#3498db'
    	},
    	r: {
    		sound: new Howl({
      		src: ['lib/sounds/corona.mp3']
    		}),
    		color: '#9b59b6'
    	},
    	t: {
      	sound: new Howl({
        	src: ['lib/sounds/dotted-spiral.mp3']
      	}),
      	color: '#34495e'
    	},
    	y: {
    		sound: new Howl({
      		src: ['lib/sounds/flash-1.mp3']
    		}),
    		color: '#16a085'
    	},
    	u: {
    		sound: new Howl({
      		src: ['lib/sounds/flash-2.mp3']
    		}),
    		color: '#27ae60'
    	},
    	i: {
    		sound: new Howl({
      		src: ['lib/sounds/flash-3.mp3']
    		}),
    		color: '#2980b9'
    	},
    	o: {
    		sound: new Howl({
    			src: ['lib/sounds/glimmer.mp3']
    		}),
    		color: '#8e44ad'
    	},
    	p: {
    		sound: new Howl({
      		src: ['lib/sounds/moon.mp3']
    		}),
    		color: '#2c3e50'
    	},
    	a: {
    		sound: new Howl({
      		src: ['lib/sounds/pinwheel.mp3']
    		}),
    		color: '#f1c40f'
    	},
    	s: {
    		sound: new Howl({
      		src: ['lib/sounds/piston-1.mp3']
    		}),
    		color: '#e67e22'
    	},
    		d: {
    		sound: new Howl({
      		src: ['lib/sounds/piston-2.mp3']
    		}),
    		color: '#e74c3c'
    	},
    	f: {
    		sound: new Howl({
      		src: ['lib/sounds/prism-1.mp3']
    		}),
    		color: '#95a5a6'
    	},
    	g: {
    		sound: new Howl({
      		src: ['lib/sounds/prism-2.mp3']
    		}),
    		color: '#f39c12'
    	},
    	h: {
    		sound: new Howl({
      		src: ['lib/sounds/prism-3.mp3']
    		}),
    		color: '#d35400'
    	},
    	j: {
    		sound: new Howl({
      		src: ['lib/sounds/splits.mp3']
    		}),
    		color: '#1abc9c'
    	},
    	k: {
    		sound: new Howl({
      		src: ['lib/sounds/squiggle.mp3']
    		}),
    		color: '#2ecc71'
    	},
    	l: {
    		sound: new Howl({
      		src: ['lib/sounds/strike.mp3']
    		}),
    		color: '#3498db'
    	},
    	z: {
    		sound: new Howl({
      		src: ['lib/sounds/suspension.mp3']
    		}),
    		color: '#9b59b6'
    	},
    	x: {
    		sound: new Howl({
      		src: ['lib/sounds/timer.mp3']
    		}),
    		color: '#34495e'
    	},
    	c: {
    		sound: new Howl({
      		src: ['lib/sounds/ufo.mp3']
    		}),
    		color: '#16a085'
    	},
    	v: {
    		sound: new Howl({
      		src: ['lib/sounds/veil.mp3']
    		}),
    		color: '#27ae60'
    	},
    	b: {
    		sound: new Howl({
      		src: ['lib/sounds/wipe.mp3']
    		}),
    		color: '#2980b9'
    	},
    	n: {
    		sound: new Howl({
    			src: ['lib/sounds/zig-zag.mp3']
    		}),
    		color: '#8e44ad'
    	},
    	m: {
    		sound: new Howl({
      		src: ['lib/sounds/moon.mp3']
    		}),
    		color: '#2c3e50'
    	}
    }

      var circles = [];

      function onKeyDown(event) {
        if(keyData[event.key]) {
          var maxPoint = new Point(view.size.width, view.size.height);
          var randomPoint = Point.random();
          var point = maxPoint * randomPoint;
          var newCircle = new Path.Circle(point, 300);
          newCircle.fillColor = keyData[event.key].color;
          keyData[event.key].sound.play();
          circles.push(newCircle);
        }
      };

      function onFrame(event) {
        for(var i = 0; i < circles.length; i++) {
          circles[i].fillColor.hue += 2;
          circles[i].scale(0.9);
          if(circles[i].area < 1) {
            circles[i].remove();
            circles.splice(i, 1);
            i--;
          }
        };
      };

		</script>

    <link rel="stylesheet" href="css/circles.css">
	</head>
	<body>
    <!-- START NAV -->
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand "href="#">perma<i class="fa fa-circle-o-notch" aria-hidden="true"></i>Circles</a>
        <button class="navbar-toggler" type="button" name="button" data-toggle="collapse" data-target="#hamburg" aria-controls="hamburg" aria-expanded="false" aria-label="toggle nav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="hamburg">
          <ul class="navbar-nav mr-auto">
						<li class="nav-item active"><a class="nav-link" href="./content.php?cat=games">back to games</a></li>
            <li class="nav-item"><a class="nav-link" href="./index.php">home <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./about.php">about</a></li>
          </ul>
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#">sign up <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#">login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
          </ul> -->
        </div>
      </nav>
    </div>
    <!-- END NAV -->

		<!-- START CONTENT -->

    <p class="instructions">hit any letter key on your keyboard</p>

		<canvas id="myCanvas" resize></canvas>

    <!-- END CONTENT -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>
