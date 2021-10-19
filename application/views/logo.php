<div class="pt-2">
<ul class="breadcrumb">
  <li>
    <a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span>
  </li>
  <li class="active">Change Logo </li>
</ul>
</div>
<?php
echo message_box('error');
echo message_box('success');
?>
<section class="card">
<div class="card-body">
  <div class="page-header">
    <h1>Welcome <?php echo ucwords((htmlspecialchars($rest['rest_Name']))); ?></h1>
  </div>
 
  <div class="row-fluid spacer">
      <h4>  Change Restaurant's Logo 

      </h4>



          <form id="restMainForm" class="form-horizontal restaurant-form" method="post" action="<?php echo base_url('home/savelogo');?>" enctype="multipart/form-data">
      <div class="form-group row">
          <label class="control-label col-md-12" for="rest_Logo">Logo</label>
          <div class="col-md-6">
              <input class="form-control my-5" type="file" name="rest_Logo" id="rest_Logo" />
              </div>
              <div class="col-md-6">
              <?php 
              if(isset($rest)&&($rest['rest_Logo']!="")){
                  ?>
              <img src="http://uploads.azooma.co/logos/<?php echo $rest['rest_Logo'];?>"/>
              <input type="hidden" name="rest_Logo_old" value="<?php echo $rest['rest_Logo'];?>"/>
              <?php
              }
              ?>
          
      </div>
      </div>
    
      

  
  <div class="control-group">
          <div class="controls">
              <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
              <a href="<?php if(isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; else echo base_url();?>" class="btn" title="Cancel Changes">Cancel</a>
          </div>
      <?php 
              if(isset($rest)){
                  ?>
              <input type="hidden" name="rest_ID" value="<?php echo $rest['rest_ID'];?>"/>
              <input type="hidden" name="rest_Name" value="<?php echo $rest['rest_Name'];?>"/>
              <?php
              }
              ?>
      </div>
</form>
      </div>

  </div>
</section>