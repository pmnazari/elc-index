<html>
	<head>
		<title>USC Marshall Experiential Learning Center</title>
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
				$(".game").hover(function() {
					$(this).find(".game-image").animate({
						width: 120,
						height: 120,
						margin: 0
					}, 200);
				}, function() {
					$(this).find(".game-image").animate({
						width: 100,
						height: 100,
						margin: 10
					}, 200);
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
					<p>Simulations and Games</p>
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
							
							$image_src = './assets/games/' . $game['id'] . '.png';
							
							echo '<div class="game" onclick="window.location = \'' . $game_url . '\';">';
							echo '	<div class="game-image-container">';
							echo '		<div class="game-image-glow"></div>';
							echo '		<div class="game-image" style="background-image: url(\'' . $image_src . '\');"></div>';
							echo '	</div>';
							echo '	<p class="game-title">' . $game['title'] . '</p>';
							echo '</div>';
						}
					?>
				</div>
			</div>

		</div>
	</body>
</html>