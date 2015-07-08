<?php

	include_once('includes/db.php');
	include_once('includes/article.php');

	$objArticle = new Article;
	$objArticles = $objArticle->fetchAll();
	
?>
<!DOCTYPE HTML>
 
<html>
<head>
	<title>CMS Portfolio</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>

	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/init.js"></script>
	<script src="js/volume.js"></script>

	<noscript>
		<link rel="stylesheet" href="css/skel.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/style-desktop.css"/>
		<link rel="stylesheet" href="css/style-noscript.css"/>
	</noscript>

</head>

<body>
	<!-- <audio autoplay loop id="bgvid">
		<source src="media/rabkah.mp3" type="audio/mp3">
	</audio> -->
 
	<div id="wrapper">
	 
		<nav id="nav">
			<a href="#me" class="icon fa-home active"><span>Home</span></a>
			<a href="#articles" class="icon fa-download"><span>Articles</span></a>
			<!-- <a href="https://twitter.com/F2PBillyMays" target="_blank" class="icon fa-twitter"><span>Twitter</span></a> -->
		</nav>
		 
		<div id="main">
			 
			<article id="me" class="panel">
				<header>
					<h1>Home.</h1>
					<p>Portfolio</p>
				</header>

				<a href="#articles" class="jumplink pic">
					<span class="arrow icon fa-chevron-right"><span>See My Articles</span></span>
					<!-- <img src="images/me.jpg" alt=""/> -->
				</a>
			</article>
		 
			<article id="articles" class="panel">
				<header>
					<h2>Articles</h2>
				</header>
				<p>
					You will be able to see my <strong>articles</strong> down here.
				</p>

				<section>
					<?php 
						foreach ($objArticles as $objArticle) { ?>						
							<div class="row">
								<div class="5u">
									<a href="article.php?id=<?php echo $objArticle['article_id'] ?>" target="_blank"><?php echo $objArticle['article_title'] ?></a>
								</div>
								<div class="5u">
									- <small>posted <?php echo date('l jS', $objArticle['article_timestamp']); ?></small>
								</div>
							</div>
						<?php
						}
					?>
					
				</section>
			</article>
		</div>
	</div>
</body>
</html>