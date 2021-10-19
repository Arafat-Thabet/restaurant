<link href="<?=base_url(css_path())?>/datatable/datatable.css" rel="stylesheet">

<section id="top-banner">

    <ul class="breadcrumb pt-2">
        <li>
            <a href="<?php echo site_url(); ?>">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="<?php echo site_url('mydiners'); ?>">My Diner</a> <span class="divider">/</span>
        </li>
        <li class="active"> Messages </li>
    </ul>
    <div class="row-fluid spacer card">
        <article class="span12 accordion-group card-body">
            <h5 >All Messages to Diners </h5>
            <div id="usercomments" class="">
                <?php
                if ($this->session->flashdata('error')) {
                    echo '<br /><div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>' . $this->session->flashdata('error') . '</strong></div>';
                }
                if ($this->session->flashdata('message')) {
                    echo '<br /><div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>' . $this->session->flashdata('message') . '</strong></div>';
                }
                ?>

                <?php
                if (count($total) > 0) {
                    echo $this->pagination->create_links();
                }
                ?> 
                <table class="table table-bordered table-striped" id="basic-1">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Audience</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th width="105px">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($messages) and !empty($messages)) {

                            $i = 0;
                            foreach ($messages as $message) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $message['subject']; ?></td>
                                    <td><?php
                                        if ($message['audienceType'] == "1") {
                                            if(!empty($message['recipients'])){
                                                $person = $this->MRestBranch->getUser($message['recipients']);
                                                $name = $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName'];
                                            }
                                            echo "Single User - ".$name;
                                        } elseif ($message['audienceType'] == "2") {
                                            echo "All Diners";
                                        } elseif ($message['audienceType'] == "3") {
                                            echo "Selected Diners";
                                        }
                                        ?></td>
                                    <td><?php 
                                    if($message['status']>0){
                                        echo 'Sent';
                                    }else{
                                        echo 'Pending';
                                    }
                                    ?></td>
                                    <td><?php echo $message['total_receiver']; ?></td>
                                    <td><?php echo date("d/m/Y",  strtotime($message['date'])); ?></td>
                                    <td  class="d-flex justify-content-around">
                                        <a class="btn btn-sm btn-primary" title="View" target="_blank" href="<?php echo site_url('mydiners/view/' . $message['id']); ?>"  rel="tooltip" data-original-title="<?php echo $message['subject'];?>">
                                            <i class="fa fa-eye"> </i> 
                                        </a>
                                        <?php if($message['status']==0){ ?>
                                        <a class="btn btn-sm  btn-danger mx-1" title="Edit" href="<?php echo site_url('mydiners/edit/' . $message['id']); ?>"  rel="tooltip" data-original-title="<?php echo $message['subject'];?>">
                                            <i class="fa fa-edit"> </i> 
                                        </a>
                                        <?php } ?>
                                    </td>                                        

                                </tr>

                            <?php } ?>
                        <?php } else { ?>
                            <tr><td colspan="8">
                                    &nbsp;&nbsp;No Message Created Yet
                                </td></tr>       
                        <?php } ?>                  
                    </tbody>
                </table>
            </div>

            <?php
            if (count($total) > 0) {
                echo $this->pagination->create_links();
            }
            ?>
        </article>
    </div>
</section>
<script src="<?=base_url(js_path())?>/datatable/jquery.dataTables.min.js" ></script>
<script src="<?=base_url(js_path())?>/datatable/datatable.custom.js" ></script>