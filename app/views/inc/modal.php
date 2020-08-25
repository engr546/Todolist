<?php foreach ($data['posts'] as $posts): ?>

  <?php $title = str_replace(' ', '', $posts->title); ?>
  
  <!-- tbody -->
  <tr>
    <td>
      <button type="button" class="btn btn-block btn-primary text-left col-md-6" data-toggle="modal" data-target="#<?php echo $title; ?>">
        <?php echo $posts->title; ?>
      </button>
    </td>
    <td>
      <a class="btn btn-success" href="<?php echo URLROOT; ?>/pages/edit/<?php echo $posts->id ?>">Edit</a>
    </td>
    <td>
      <form action="<?php echo URLROOT; ?>/pages/delete/<?php echo $posts->id; ?>" method="post" >
          <input class="btn btn-danger" type="submit" value="Delete"></input>
      </form>      
    </td>
  </tr>  

  <!-- The Modal -->
  <div class="modal" id="<?php echo $title; ?>">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?php echo $posts->title; ?></h4>
        </div> <!-- modal-header -->

        <!-- Modal body -->
        <div class="modal-body">
          <?php echo $posts->created_at; ?>
        </div> <!-- modal-body -->

        <!-- Modal body -->
        <div class="modal-body">
         <p class="font-weight-bold text-left"> <?php echo $posts->body; ?> </p>
        </div> <!-- modal-body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> <!-- modal-footer -->

      </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
  </div> <!-- modal -->

<?php endforeach ?>

