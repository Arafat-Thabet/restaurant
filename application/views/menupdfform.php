<div class="pt-2">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo base_url('menus'); ?>">Menus</a> <span class="divider">/</span>
        </li>
        <li class="active">Pdf Menus </li>

    </ul>
</div>
<?php
echo message_box('error');
echo message_box('success');
?>
<section class="card">

    <div class="card-body">
            <h4>
            
                    <?php echo $pagetitle; ?> 
            
            </h4>
            <div id="results">
        
                <form id="menuForm" class="form-horizontal restaurant-form" method="post" action="<?php echo base_url('menus/savepdf'); ?>" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group row">
                            <label class="control-label col-md-12" for="menu">PDF Menu English<br><span class="small-text" style="font-size:12px;">(1MB)</span></label>
                            <div class="col-md-12">
                                <input class="form-control" type="file" name="menu" id="menu" />
                                <?php
                                if (isset($menu)) {
                                ?>
                                    <input type="hidden" name="menu_old" value="<?php echo $menu['menu']; ?>" />
                                    <a target="_blank" href="http://uploads.azooma.co/images/menuItem/<?php echo $menu['menu']; ?>" title="Download">View Menu</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-12" for="menu_ar">PDF Menu Arabic<br><span class="small-text" style="font-size:12px;">(1MB)</span></label>
                            <div class="col-md-12">
                                <input class="form-control" type="file" name="menu_ar" id="menu_ar" />
                                <?php
                                if (isset($menu)) {
                                ?>
                                    <input type="hidden" name="menu_ar_old" value="<?php echo $menu['menu_ar']; ?>" />
                                    <a target="_blank" href="http://uploads.azooma.co/images/menuItem/<?php echo $menu['menu_ar']; ?>" title="Download">View Menu</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-12" for="title">Title</label>
                            <div class="col-md-12">
                                <input type="text" name="title" class="form-control" required id="title" placeholder="Title" <?php echo isset($menu) ? 'value="' . (htmlspecialchars($menu['title'])) . '"' : ""; ?> />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-12" for="title_ar">Title Arabic</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" required name="title_ar" id="title_ar" placeholder="Title Arabic" <?php echo isset($menu) ? 'value="' . (htmlspecialchars($menu['title_ar'])) . '"' : ""; ?> />
                            </div>
                        </div>

                        <div class="form-group row text-end">
                            <div class="col-md-12">
                                <input type="hidden" name="rest_ID" value="<?php echo $rest['rest_ID']; ?>" />
                                <input type="hidden" name="rest_Name" value="<?php echo $rest['rest_Name']; ?>" />
                                <?php if (isset($menu)) {
                                ?>
                                    <input type="hidden" name="id" value="<?php echo $menu['id']; ?>" />
                                    <input type="hidden" name="pagenumber" value="<?php echo $menu['pagenumber']; ?>" />
                                    <input type="hidden" name="pagenumberAr" value="<?php echo $menu['pagenumberAr']; ?>" />
                                <?php
                                }
                                ?>
                                <input type="submit" name="submit" value="Save" class="btn btn-primary" />
                                <a href="<?php if (isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER'];
                                            else echo base_url('hungryn137/menu'); ?>" class="btn" title="btn btn-default Changes">Cancel</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <script type="text/javascript">
                    $("#menuForm").validate();
                </script>

            </div>
        </article>

    </div>
</section>