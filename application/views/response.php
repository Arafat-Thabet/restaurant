<div class="pt-2">
  <ul class="breadcrumb">
  <li>
    <a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo base_url('home/comments'); ?>">Comments</a> <span class="divider">/</span>
  </li>
  <li class="active">Comment Response</li>
</ul>
</div>
<?php
echo message_box('error');
echo message_box('success');
?>
<section id="top-banner">
<div class="card">
<div class="row-fluid spacer card-body">
      <h5>
              Reply Back To '<?php echo $User_Name; ?>'
            

      </h5>

      <div id="restinfo" class=" in accordion-inner">
        
          <form id="restMainForm" class="form-horizontal restaurant-form" method="post" action="<?php echo base_url('home/sendresponse'); ?>" enctype="multipart/form-data">
    
      <div class="control-group">

          <div class="comment-text activity-comment text-secondary" itemprop="description">
                  " <?php if (isset($comment['review_Msg'])) {
    echo $comment['review_Msg'];
        }
        ?> "
            </div>
     </div>

     <div class="form-group row ">
     <div class="col-md-8 ">
            <textarea class="form-control" name="replymsg" required id="message" rows="10" placeholder="Message to <?php echo $User_Name; ?>"></textarea>
     </div>
     </div>
  

          <div class="card-footer text-end p-0 mt-2 col-8">
                            <input type="submit" name="submit" value="Send" class="btn btn-danger"/>
                            <a href="<?php if (isset($_SERVER['HTTP_REFERER'])) {
                  echo $_SERVER['HTTP_REFERER'];
              } else {
                  echo base_url('home/comments');
              }
              ?>" class="btn btn-light" title="Cancel Changes">Cancel</a>

                    <?php
              if (isset($rest)) {
                  ?>
                            <input type="hidden" name="rest_ID" value="<?php echo $rest['rest_ID']; ?>"/>
                            <input type="hidden" name="user_ID" value="<?php echo $user_info['user_ID']; ?>"/>
                            <input type="hidden" name="review_ID" value="<?php echo $comment['review_ID']; ?>"/>
                            <input type="hidden" name="rest_Name" value="<?php echo (htmlspecialchars($rest['rest_Name'])); ?>"/>
                            <?php
              }
              ?>
                            <?php
              if (isset($_GET['ref'])) {
                  ?>
                                  <input type="hidden" name="ref" value="<?php echo $_GET['ref']; ?>"/>
                                  <input type="hidden" name="per_page" value="<?php echo $_GET['per_page']; ?>"/>
                                  <input type="hidden" name="limit" value="<?php echo $_GET['limit']; ?>"/>
                              <?php
              }
              ?>
      </div>
</form>

      <script type="text/javascript">
    $("#restMainForm").validate();
</script>
      </div>
  </div>
</div>
</section>