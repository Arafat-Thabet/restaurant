<link href="<?= base_url(css_path()) ?>/datatable/datatable.css" rel="stylesheet">
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
        <div class="text-end mb-3">
        <h4 class="pull-start">
            
                Total Pdf Menus (<?php echo $total; ?>) 
            
        </h4>
        <a href="<?php echo base_url('menus/formpdf?rest=' . $rest['rest_ID']); ?>" title="" class="btn btn-danger ">Add New Pdf Menu</a>
        </div>
        <div id="results">
            <?php
            if ($total > 0) {
            ?>

                <table class="table table-bordered table-striped sufrati-backend-table" id="basic-1">
                    <thead>
                        <th class="span4">
                            Title
                        </th>
                        <th class="span4">
                            Menu
                        </th>
                        <th>
                            Actions
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($menus as $menu) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $menu['title'] . ' - ' . $menu['title_ar']; ?>
                                </td>
                                <td>
                                    <a target="_blank" href="http://uploads.azooma.co/images/menuItem/<?php echo $menu['menu']; ?>">View English PDF</a> <br />
                                    <a target="_blank" href="http://uploads.azooma.co/images/menuItem/<?php echo $menu['menu_ar']; ?>">View Arabic PDF</a>
                                </td>
                                <td>

                                    <a class="btn btn-sm btn-primary my-1" title="<?=lang('edit')?>" href="<?php echo base_url('menus/formpdf/' . $menu['id'] . '?rest=' . $rest['rest_ID']); ?>" rel="tooltip" title="Update Menu">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    <a title="<?=lang('delete')?>" class="btn btn-sm btn-danger cofirm-delete-btn my-1" link="<?php echo base_url('menus/deletepdf/' . $menu['id']); ?>" rel="tooltip" title="Delete Menu" >
                                        <i class="fa fa-trash"></i>
                                        
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

    </div>
</section>
<script src="<?= base_url(js_path()) ?>/datatable/jquery.dataTables.min.js"></script>
<script src="<?= base_url(js_path()) ?>/datatable/datatable.custom.js"></script>
<script>
    $(document).ready(function() {

        $(".cofirm-delete-btn").click(function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn-success p-0 mx-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            var url = $(this).attr('link');
            swalWithBootstrapButtons.fire({
                title: '<?= lang('delete_confirm_msg') ?>',
                  text: "<?= lang('cant_undo') ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: ' <a class="btn btn-success text-white" href="' + url + '"><?= lang('yes') ?>!</a> ',
                cancelButtonText: ' <?= lang('no') ?>! ',
                reverseButtons: true
            }).then((result) => {
                if (result.value != true)
                    (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    )
            });
        });

    });
</script>