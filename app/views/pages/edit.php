<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="container">

		<div class="card card-body bg-light mt-5 col-md-9 mx-auto">
			<h2>Edit Todo</h2>
			<p>Edit todo with this Form</p>

			<!-- sharepost/posts/add = sharepost/controller/method -->
			<form action="<?php echo URLROOT; ?>/pages/edit/<?php echo $data['id']; ?>" method='post'>

				<div class="form-group">
					<label for="title">Title: <sup>*</sup></label>
					<input type="text" name="title" class="form-control form-control-lg
					<?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?> " 
						value="<?php echo $data['title']; ?>"> 
					<span class="invalid-feedback"><?php echo $data['title_error']; ?></span>
				</div> <!-- /form-group -->

				<div class="form-group">
					<label for="body">Body: <sup>*</sup></label>
        			<textarea name="body" class="form-control form-control-lg 
        			<?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        			<span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
				</div> <!-- /form-group -->
				<input type="submit" name="Submit" class="btn btn-success">
			</form>
		</div> <!-- /card card-body bg-light mt-5 -->

	</div> <!-- /container -->

<?php require APPROOT . '/views/inc/footer.php'; ?>