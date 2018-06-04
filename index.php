<html>
	<head>
		<title>USC Marshall - Experiential Learning Center</title>
		<link rel="icon" href="assets/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script src="js/lib/jquery-3.3.1.js"></script>
		<script>
			$(function() {
				// Brand link
				$("#brand").click(function() {
					window.location = "https://www.marshall.usc.edu/programs/experiential-learning-center";
				});
				
				// Game images grow on hover!
				$(".game").each(function() {
					let image = $(this).find('.game-image');
					let size = image.is(".small-image") ? 110 : 100;
					
					image.css("width", size);
					image.css("height", size);
					image.css("margin", (120 - size) / 2);
					
					$(this).hover(function() {
						image.animate({
							width: size + 20,
							height: size + 20,
							margin: ((120 - size) / 2) - 10
						}, 200);
					}, function() {
						image.animate({
							width: size,
							height: size,
							margin: (120 - size) / 2
						}, 200);
					});
				});
				
			});
		</script>
	</head>
	<body>
		<div id="background"></div>
		<div id="foreground">
			<div id="navbar">
				<div id="brand"></div>
			</div>
			<div id="content">
				<div id="header">
					<p>Exercises</p>
				</div>
				<div class="table">
					<?php
						$games_json = file_get_contents("games.json");
						$games = json_decode($games_json, true);
						
						foreach ($games as $game)
						{							
							if (array_key_exists('location', $game))
								$game_url = $game['location'];
							else
								$game_url = $game['id'];
							
							if (array_key_exists('image', $game))
								$image_src = $game['image'];
							else
								$image_src = './assets/games/' . $game['id'] . '.png';
							
							$small_image = array_key_exists('smallImage', $game) && $game['smallImage'];
							
							echo '<div class="game" onclick="window.location = \'' . $game_url . '\';">';
							echo '	<div class="game-image-container">';
							echo '		<div class="game-image-glow"></div>';
							echo '		<div class="game-image ' . ($small_image ? "small-image" : '') . '" style="background-image: url(\'' . $image_src . '\');"></div>';
							echo '	</div>';
							echo '	<p class="game-title">' . $game['title'] . '</p>';
							echo '</div>';
						}
					?>
				</div>
			</div>
			
			<div id="footer">
				<div id="footer-background"></div>
				<p>&#169; <?php echo date("Y"); ?> University of Southern California Marshall School of Business. All rights reserved.</p>
				<p>Homepage by Phillip Nazarian and Ahsan Zaman</p>
			</div>
		</div>
	</body>
</html>