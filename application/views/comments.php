<link href="<?=base_url(css_path())?>/datatable/datatable.css" rel="stylesheet">

<?php
echo message_box('error');
echo message_box('success');
?>
<div class="pt-2">
 <ul class="breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span>
        </li>
        <li class="active">Comments </li>
    </ul>
    </div>
<section id="top-banner">

   
    <div class="row-fluid spacer card">
        <article class="span12 accordion-group card-body">
            <h5 > Latest User Comments </h5>
            <div id="usercomments" class=" in accordion-inner table-responsive">

                <table class="table table-bordered table-striped" id="basic-1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Comment</th>
                            <th>Comment Date</th>
                            <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($latestcomments) and !empty($latestcomments)) {

                            $i = 0;
                            foreach ($latestcomments as $p) {
                                $i++;
                                ?>
                                <tr <?php if (isset($p['is_read'])) if ($p['is_read'] == 0) { ?> class="new-row" onclick="readcomment('<?php echo $p['review_ID'] ?>')" <?php } ?> data-row="<?php echo $p['review_ID'] ?>" >
                                    <td <?php if (isset($p['review_Status'])) if ($p['review_Status'] == 0) echo 'class="strike"';  ?>><?php echo $i; ?></td>
                                    <td <?php if (isset($p['review_Status'])) if ($p['review_Status'] == 0) echo 'class="strike"';  ?>><?php echo $this->MRestBranch->getUserName($p['user_ID']); ?></td>
                                    <td <?php if (isset($p['review_Status'])) if ($p['review_Status'] == 0) echo 'class="strike"';  ?> width="350px"><?php echo substr($p['review_Msg'], 0, 50) . '...'; ?></td>
                                    <td <?php if (isset($p['review_Status'])) if ($p['review_Status'] == 0) echo 'class="strike"';  ?>><?php echo date("Y-m-d", strtotime($p['review_Date'])); ?></td>
                                    <td class="d-flex">
                                        <a class="p-1 border mx-1 btn btn-sm  btn-primary"  data-bs-toggle="tooltip" data-bs-placement="top" title="Reply" href="<?php echo base_url(); ?>home/response/<?php echo $p['user_ID']; ?>/<?php echo $p['review_ID'] . '?ref=1&limit=' . $limit . '&per_page=' . $per_page; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                    </a>
                                        <br />
                                        <a class="p-1 border mx-1 btn btn-sm  btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Show/Hide" href="<?php echo base_url('home/usercommentstatus?id=' . $p['review_ID'] . '&ref=1&limit=' . $limit . '&per_page=' . $per_page); ?>"  rel="tooltip" data-original-title="<?php echo $p['review_Status'] == 0 ? 'Publish Comment' : 'Keep Private Comment'; ?>">
                                            <?php echo $p['review_Status'] == 0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>' :
                                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>'; ?>
                                            <?php //echo $p['review_Status'] == 0 ? 'Publish' : 'Keep Private'; ?>
                                        </a>
                                    </td>                                        

                                </tr>

                            <?php } ?>
                        <?php }else { ?>
                            <tr><td colspan="8">
                                    &nbsp;&nbsp;No Comments Yet
                                </td></tr>       
                        <?php } ?>                  
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>

<script src="<?=base_url(js_path())?>/datatable/jquery.dataTables.min.js" ></script>
<script src="<?=base_url(js_path())?>/datatable/datatable.custom.js" ></script>