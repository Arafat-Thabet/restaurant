<div class="pt-2">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo base_url('offers'); ?>">Special Offers</a> <span class="divider">/</span>
        </li>
        <li class="active">offer </li>
    </ul>
</div>
<link href="<?= base_url(css_path()) ?>/datatable/datatable.css" rel="stylesheet">

<?php
echo message_box('error');
echo message_box('success');
?>
<section class="card">


    <div class="card-body">
        <div class="text-end mb-2">
            <h4 class="pull-start">

                Total Offers (<?php echo $total; ?>)
            </h4>
            <a href="<?php echo base_url('offers/form?rest=' . $rest['rest_ID']); ?>" title="Add new Offer" class="btn btn-danger ">Add new Offer</a>
            <a href="<?php echo base_url('offers/categories?rest=' . $rest['rest_ID']); ?>" class="btn btn-primary" title="Offer categories">Offer Categories</a>&nbsp;&nbsp;
        </div>

        <div id="results">

            <?php
            if (count($offers) > 0) {
            ?>

                <table class="table table-bordered table-striped sufrati-backend-table" id="basic-1">
                    <thead>
                        <th class="span4">
                            Offer Name
                        </th>
                        <th class="span3">
                            Description
                        </th>
                        <th class="span2">
                            Start Date
                        </th>
                        <th class="span2">
                            End Date
                        </th>
                        <th>
                            Actions
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($offers as $offer) {
                        ?>
                            <tr onclick="document.location.href='<?php echo base_url('offers/form/' . $offer['id'] . '?rest=' . $rest['rest_ID']); ?>'">
                                <td <?php if (isset($offer['status'])) if ($offer['status'] == 0) echo 'class="strike"';  ?>>
                                    <?php echo ($offer['offerName']) . ' - ' . ($offer['offerNameAr']); ?>
                                </td>
                                <td <?php if (isset($offer['status'])) if ($offer['status'] == 0) echo 'class="strike"';  ?>>
                                    <?php echo substr(strip_tags(($offer['shortDesc'])), 0, 50) . '...'; ?>
                                </td>
                                <td <?php if (isset($offer['status'])) if ($offer['status'] == 0) echo 'class="strike"';  ?>>
                                    <?php echo $offer["startDate"]; ?>
                                </td>

                                <td <?php if (isset($offer['status'])) if ($offer['status'] == 0) echo 'class="strike"';  ?>>
                                    <?php echo $offer["endDate"]; ?>
                                </td>
                                <td>

                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('offers/form/' . $offer['id'] . '?rest=' . $rest['rest_ID']); ?>" rel="tooltip" title="Update Offer">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    <a class="btn btn-sm <?php echo $offer['status'] == 1 ? "btn-danger" : "btn-primary"; ?>" href="<?php echo base_url('offers/status/' . $offer['id'] . '?rest=' . $rest['rest_ID']); ?>" rel="tooltip" title="<?php echo $offer['status'] == 1 ? "Deactivate " : "Activate "; ?> Offer">
                                        <?php
                                        if ($offer['status'] == 1) {
                                        ?>
                                            <i class="fa  fa-ban"></i> 
                                        <?php
                                        } else {
                                        ?>
                                            <i class="fa fa-check"></i> 
                                        <?php } ?>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('offers/delete/' . $offer['id'] . '?rest=' . $rest['rest_ID']); ?>" rel="tooltip" title="Delete Offer" onclick="return confirm('Do You Want to Delete?')">
                                        <i class="fa  fa-trash"></i>
                                        
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