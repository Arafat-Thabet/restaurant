<div class="breadcrumb-div">
<ul class="breadcrumb">
        <li>
            <a href="<?php echo base_url('home'); ?>"><?=lang('home')?></a> <span class="divider">/</span>
        </li>
        <li class="active">My Diners </li>
    </ul>
</div>
<section id="top-banner">
 

    <div class="row-fluid spacer">
        <article class="left span12 accordion-group">
            <h2 data-toggle="collapse" class="accordion-heading " data-target="#results">
                <div class="accordion-toggle" href="javascript:void(0);">
                    <h4 class="d-inline-block">
                        <?php echo $pagetitle . '  (' . $totallikedpeople . ')'; ?>
                        <span style=" margin-left: 25px;font-size: 14px;">
                        Followers (<?php echo count($likedpeople); ?>)
                        </span>
                        <span style=" margin-left: 25px;font-size: 14px;">
                        Guest Users
                        (<?php
echo $guests = $totallikedpeople - count($likedpeople);
?>)
                        </span>

                    </h4>
             

                    <span class="float-end">
                        <a class="right-float btn btn-primary link-heading" href="<?php echo site_url('mydiners/dinermessages'); ?>"> <img src="<?php echo site_url('images/messages20.png'); ?>" alt=""/> History</a>
                        <?php if ($member['allowed_messages'] > 0) {?>
                        <a class="right-float btn btn-danger link-heading" href="<?php echo site_url('mydiners/sendMessage'); ?>"> <i class="icon-envelope icon-white"></i> Send Message </a>
                        <?php } else {?>
                        <a class="right-float btn btn-primary link-heading" href="<?php echo site_url('accounts'); ?>"> <i class="icon-envelope icon-white"></i> Purchase Messages </a>
                        <?php }?>
                    </span>
                </div>
            </h2>
            <div id="resultsss" class="collapse in accordion-inner">
                <?php
if ($this->session->flashdata('error')) {
    echo '<br /><div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>' . $this->session->flashdata('error') . '</strong></div>';
}
if ($this->session->flashdata('message')) {
    echo '<br /><div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>' . $this->session->flashdata('message') . '</strong></div>';
}
?>
                            <form class="no-margin" name="diner-form" id="diner-form" method="post" action="<?php echo site_url('mydiners/sendMessage'); ?>">
            <!--                    <div class="">
                        <a href="#">Latest</a> |
                        <a href="#">Oldest</a>
                    </div>-->
                    <div class="overflow customer-main" >

                        <?php
if (count($likedpeople) > 0) {
    foreach ($likedpeople as $person) {
        $userimage = $person['image'];
        if ($userimage == "") {
            $userimage = 'user-default.svg';
        }
        ?>
                                    <div class="overflow customer">

                                    <a class="customer-title" target="_blank" title="<?php echo $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName']; ?>" href="<?php echo $this->config->item('sa_url') . ('user/' . $person['user_ID']); ?>">
                                        <?php echo $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName']; ?>
                                    </a>

                                    <a target="_blank" class="customer-body" title="<?php echo $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName']; ?>" href="<?php echo $this->config->item('sa_url') . ('user/' . $person['user_ID']); ?>">
                                        <img src="http://uploads.azooma.co/images/userx130/<?php echo $userimage; ?>" alt="<?php echo $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName']; ?>" width="100" height="100" style="min-width:100px;width:100px;min-height:100px;height:100px;"/>
                                    </a>
                                    <span>
                                        Since <?php echo date('Y', strtotime($person['createdAt'])); ?>
                                        <?php
if (!empty($person['user_City'])) {
            if (!is_numeric($person['user_City'])) {
                echo " | " . $person['user_City'];
            } else {
                $city = "";
                $city = $this->MGeneral->getCity($person['user_City']);
                if (is_array($city)) {
                    echo " | " . $city['city_Name'];
                }
            }
        }
        ?>
                                    </span>
                                    <div>
                                        <input class="icon-seprate msg-class hidden" type="checkbox" name="msg[]" value="<?php echo $person['user_ID']; ?>">
                                                    <?php
if (isset($person['action']) && $person['action'] == "review") {
            ?>
                                        <a target="_blank" title="View Comment of <?php echo $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName']; ?>" href="<?php echo $this->config->item('sa_url') . ('rest/' . $rest['seo_url'] . '#comment-' . $person['actionID']); ?>"><i class="icon-comment  icon-seprate"></i></a>
                                        <?php }?>
                                        <a target="_blank" title="View Profile of <?php echo $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName']; ?>" href="<?php echo $this->config->item('sa_url') . ('user/' . $person['user_ID']); ?>"><i class="icon-user icon-seprate"></i></a>
                                        <a title="Send Message <?php echo $person['user_NickName'] == "" ? $person['user_FullName'] : $person['user_NickName']; ?>" href="<?php echo site_url('mydiners/sendMessage?user_ID=' . $person['user_ID']); ?>"><i class="icon-envelope "></i></a>
                                    </div>
                                </div>
                                <?php
}
}
?>
                    </div>
                    <div class="control-group submit-class hidden">
                        <div class="controls">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary right-float">
                        </div>
                    </div>
                    <div class="control-group margin-bottom">
                    </div>
                </form>
            </div>
        </article>
    </div>
</section>


<section class="container-fluid">
    <div class="row my-3">
        <div class="col-md-5">
            <input placeholder="search" type="text" id="diner-search" class="form-control" />
        </div>
    </div>
<div class="row staff-grid-row"  id="diners-list" >
<div class="col-md-12 text-center">
    <div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>

</div>

</div>
</section>
<div class="row">
    <div class="col-12">
        <div class="text-center my-3">
            <button style="display:none" class="btn btn-sm btn-primary see-more" id="load_more-btn" onclick="load_more();"><i class="mdi mdi-spin mdi-loading me-1"></i> <?= lang('view_more') ?> <i class="fa  fa-arrow-left"></i> </button>
        </div>
    </div> <!-- end col-->
</div>
<input type="hidden" id="total_records" value="0" />
<input type="hidden" id="offset" value="0" />

<script type="text/javascript">
    $(document).ready(function() {
        refresh_diners_list();
    });

    function get_diners_uri() {
        var uri = "";
        return uri;
    }

    function getdiners() {
        var total_records = $("#total_records").val();
        var offset = $("#offset").val();
        var data = {
            iDisplayLength: 8,
            iDisplayStart: offset
        };
        var url = "<?= base_url("mydiners/get_diners_grid_filter?status=1") ?>" + get_diners_uri();
        $.post(url, data, function(result) {
            $("#diners-list").append(result.data);
            $("#total_records").val(result.total_records);
            $("#offset").val(result.offset);
            $("#load_more-btn").prop("disabled", false);
            if (result.total_records < result.offset + 8) {
                $("#load_more-btn").hide();
            } else {
                $("#load_more-btn").show();

            }
            $("#load_more-btn").html('<?= lang('view_more') ?> <i class="fa  fa-arrow-left"></i>');
            $("#left-sidebar").niceScroll({
            cursorcolor:'#ccc',
          cursorwidth:"12px",
          railalign: 'right'
        });
        });
    }

    function refresh_diners_list() {
        var total_records = $("#total_records").val();
        var offset = 0;
        var search = $("#diner-search").val();
        var data = {
            iDisplayLength: 8,
            iDisplayStart: offset,
            sSearch: search
        };
        var url = "<?= base_url("mydiners/get_diners_grid_filter?status=1") ?>" + get_diners_uri();
        $.post(url, data, function(result) {
            $("#diners-list").html(result.data);
            $("#total_records").val(result.total_records);
            $("#offset").val(result.offset);
            if (result.total_records < result.offset + 8) {
                $("#load_more-btn").hide();
            } else {
                $("#load_more-btn").show();

            }
         
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#diner-search").on('change', function(ev) {
            refresh_diners_list();
        });


        $("#diner-search").on('keypress', function(ev) {
            refresh_diners_list();
        });
        $("#diner-search").on('keydown', function(ev) {
            refresh_diners_list();
        });
    });

    function load_more() {
        var offset = parseInt($("#offset").val());
        offset = parseInt(offset) + 8;
        $("#load_more-btn").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>')
        $("#offset").val(offset);
        $("#load_more-btn").prop("disabled", true);

        getdiners();


    }
</script>
<script>
    function sortByDiners(ivalue) {
        if (ivalue == "" || ivalue == "0") {
            //do nothing
        } else {
            document.location = base + "mydiners?sortby=" + ivalue;
        }
    }

    function sendMessageToDinners(ivalue) {
        if (ivalue == "" || ivalue == "0") {
            //do nothing
            $('.msg-class').addClass('hidden');
            $('.submit-class').addClass('hidden');
        } else if (ivalue == "4") {
            //select individuals
            $('.msg-class').removeClass('hidden');
            $('.submit-class').removeClass('hidden');
        } else {
            document.location = base + "mydiners/sendMessage?diner=" + ivalue;
        }
    }
</script>