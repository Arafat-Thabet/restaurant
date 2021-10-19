<?php
echo message_box('error');
echo message_box('success');
?>
<link href="<?=base_url(css_path())?>/datatable/datatable.css" rel="stylesheet">

<div class="pt-2">
<ul class="breadcrumb">
  <li>
    <a href="<?php echo base_url(); ?>"><?=lang('home')?></a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo base_url('branches'); ?>"><?=lang('rest_barnch')?></a> <span class="divider">/</span>
  </li>
  <li class="active"><?php echo (htmlspecialchars($title)); ?> </li>
</ul>
</div>
<section class="card">

  <div class="card-body">
    <article class="span12 accordion-group">
      <h4 ><?=lang('branch_images')?> 

      </h4>

      <div id="restinfo" class="">


        <?php
        if (isset($branchImages)) {
        ?>
          <table class="table table-bordered table-striped sufrati-backend-table" id="basic-1">
            <thead>
              <th>
#
              </th>
              <th>
                <?=lang('title')?>
              </th>
              <th>
                <?=lang('preview')?>
              </th>
              <th>
                <?=lang('actions')?>
              </th>
            </thead>
            <tbody>

              <?php
              foreach ($branchImages as $value) {

              ?>
                <tr>
                  <td>

                  </td>
                  <td>
                    <?php echo (htmlspecialchars($value['title'])) . ' - ' . (htmlspecialchars($value['title_ar'])); ?>
                  </td>
                  <td <?php if (isset($value['status'])) if ($value['status'] == 0) echo 'class="strike"';  ?>>
                    <img src="http://uploads.azooma.co/Gallery/thumb/<?php echo $value['image_full']; ?>" width="100" height="100" />
                  </td>
                  <td>
                    <a  title="<?=lang('edit')?>" href="<?php echo base_url('branches/photofrom/' . $value['image_ID'] . '?rest=' . $value['rest_ID'] . '&br_id=' . $value['branch_ID']); ?>" rel="tooltip" data-original-title="Edit this Image">
                      <i class="fa  fa-edit"> </i>
                    
                    </a><br />
                    <a href="<?php echo base_url('branches/usergallerystatus?id=' . $value['image_ID'] . '&rest=' . $value['rest_ID'] . '&br_id=' . $value['branch_ID']); ?>" rel="tooltip" data-original-title="<?php echo $value['status'] == 0 ? 'Activate the Image' : 'Deactivate the Image'; ?>">

                      <?php
                      if ($value['status'] == 1) {
                      ?>
                        <i class="icon icon-ban-circle"></i> DeActivate
                      <?php
                      } else {
                      ?>
                        <i class="icon icon-ok"></i> Activate
                      <?php } ?>
                    </a><br />
                    <a href="<?php echo base_url('branches/usergallerydelete?id=' . $value['image_ID'] . '&rest=' . $value['rest_ID'] . '&br_id=' . $value['branch_ID']); ?>" rel="tooltip" data-original-title="<?php echo $value['is_read'] == 0 ? 'Delete the Image' : 'Delete the Comment'; ?>" onclick="return confirm('Do You Want to Delete?')">
                      <i class="icon-remove"> </i>
                      Delete
                    </a>
                  </td>
                </tr>
              <?php
              }
              ?>

            </tbody>
          </table>
        <?php
        }
        ?>



      </div>
    </article>
  </div>
</section>
<script src="<?=base_url(js_path())?>/datatable/jquery.dataTables.min.js" ></script>
<script src="<?=base_url(js_path())?>/datatable/datatable.custom.js" ></script>