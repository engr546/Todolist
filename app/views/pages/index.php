<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="container">

		<div class="card card-body bg-dark text-light mt-5 col-md-7 mx-auto">
			<?php flash('todo_message'); ?>
			<h2>Add Todo</h2>
			<p>Create todo with this Form</p>

			<!-- sharepost/posts/add = sharepost/controller/method -->
			<form action="<?php echo URLROOT; ?>/pages/add" method='post'>

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
     			    <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        			<span class="invalid-feedback"><?php echo $data['body_error']; ?></span>					
				</div> <!-- /form-group -->
				<input type="submit" name="Submit" class="btn btn-success">
			</form>

		</div> <!-- /card card-body bg-light mt-5 -->

		<div class="col-md-7 mt-5 mb-5 mx-auto">

			<table class="table table-hover table-borderless table-condensed ">
				<thead>
					<tr>
						<th class="col">Todo</th>
						<th class="col"></th>
						<th class="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php require APPROOT . '/views/inc/modal.php'; ?>
				</tbody>
			</table>

		</div> <!-- col-md-6 mx-auto -->

	</div> <!-- /container -->

<?php require APPROOT . '/views/inc/footer.php'; ?>

