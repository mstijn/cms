<?php
	session_start();

	include_once('../includes/db.php');

	if(isset($_SESSION['logged_in']))
	{
		if(isset($_POST['title'], $_POST['content']))
		{
			$strTitle = $_POST['title'];
			$strContent = nl2br($_POST['content']);

			if(empty($strTitle) or empty($strContent))
			{
				$strError = 'All fields are required!';
			} else
			{
				$sqlQuery = $db->prepare("INSERT INTO articles (article_title, article_content, article_timestamp) VALUES (?, ?, ?)");
				$sqlQuery->bindValue(1, $strTitle);
				$sqlQuery->bindValue(2, $strContent);
				$sqlQuery->bindValue(3, time());

				$sqlQuery->execute();
				header('Location: index.php');
			}
		}
		?>

			<html>
				<head>
					<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
					<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
					<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
					<script>
					tinymce.init({
					    selector: "textarea#elm1",
					    theme: "modern",
					    width: 750,
					    height: 300,
					    plugins: [
					         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					         "save table contextmenu directionality emoticons template paste textcolor"
					   ],
					   content_css: "css/content.css",
					   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
					   style_formats: [
					        {title: 'Bold text', inline: 'b'},
					        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
					        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
					        {title: 'Example 1', inline: 'span', classes: 'example1'},
					        {title: 'Example 2', inline: 'span', classes: 'example2'},
					        {title: 'Table styles'},
					        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
					    ]
					 }); 
					</script>

				</head>
				<body>
					<div class="wrapper">
						<a href="index.php" id="logo">Content Management System</a>

						<br />

						<h4>Add an Article</h4>

						<?php if (isset($strError))
						{ ?>
						<small style="color: #aa0000"><?php echo $strError; ?></small>
						<br /><br />
						<?php } ?>

						<form action="add.php" method="post" autocomplete="off">
							<input type="text" name="title" placeholder="title" /> <br /><br />


							<textarea id="elm1" name="content" rows="15" cols="50"></textarea> <br /><br />


							<input type="submit" value="Post">
						</form>

						

						<a href="index.php">&larr; Return</a>
					</div>
				</body>
			</html>

		<?php
	} else {
		header('Location: index.php');
	}
?>