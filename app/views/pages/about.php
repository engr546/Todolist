<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="container">

		<div class="jumbotron jumbotron-fluid">
			<div class="container">

				<h1 class="display-3"><?php echo $data['title']; ?></h1>
				<p class="lead"><?php echo $data['description']; ?></p>
				<p>Version: <strong><?php echo  APPVERSION; ?></strong></p>
			</div> <!-- /container -->
		</div> <!-- /jumbotron jumbotron-fluid -->
		
	</div> <!-- /scontainer -->

<?php require APPROOT . '/views/inc/footer.php'; ?>