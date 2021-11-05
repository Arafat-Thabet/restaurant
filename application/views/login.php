<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <link rel="shortcut icon" href="http://www.sufrati.com/sa/favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--
 #####              ####                       #         #    
 #     #            #                           #              
 #        #     #  ####      # ###    ######  ######    ###    
  #####   #     #   #        ##      #     #    #         #    
       #  #     #   #        #       #     #    #         #    
 #     #  #    ##   #        #       #    ##    #         #    
  #####    #### #   #        #        #### #     ###    ##### 
  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Restaurant Owners Login | <?php echo $sitename; ?></title>
    <meta name="keywords" content="Restaurants,saudi arabia, lebanon, arabia,middle east, hotels, cafes, dining, delivery">
    <meta name="description" content=" Restaurant directory and hotel dining guide of Arabia, Restaurants, home delivery, takeaway">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate2.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">
    <style>
        .login h2 {
            font-size: 65px;
            font-weight: bold;
            margin-bottom: 0;
        }

        .login p {
            font-weight: bold;
        }

        @media (min-width: 768px) {
            .login {
                height:100vh;
                padding-right: 7%;
                padding-left: 7%;
            }
        }

        @media (max-width: 575.98px) {
        
        }

        @media (max-width: 767.98px) {
            .image-cover {
                display: none !important;
            }
            .article-box{
                font-size: 10px !important;
            }
            .article-box h4{
                font-size: 1rem !important;
            }
            .col-icons{
                font-size: 26px !important;
            }

            .login-box {
                /* width: 75% !important */
            }
        }

        .col-icons {
            font-size: 46px;
            margin-top: 10px;
        }

        .article-box {
            background-color: #dddddd78;
            overflow: hidden;
        }
        .main-box{overflow: hidden;}
        .pull-end{float: right;}
        .pull-start{float: left;}
        .text-end{text-align: end;}
    </style>
<?php if(sys_lang()=="arabic"){ ?>
    <style>
        body{text-align: right;
        }
        .form-check{direction: rtl;}
        .form-check-input{direction: rtl;margin-right: -1.25rem; margin-left: unset;}
        .pull-end{float: left;}
        .pull-start{float: right;}
    </style>
<?php } ?>
</head>

<body>
    <div class=" w-100 main-box m-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 image-cover">
                <img style="height:100vh;" width="100%" src="<?= base_url("images/login.jpg") ?>" />

            </div>
            <div class="col-xs-8 col-md-5">
                <div class="align-items-center justify-content-center login   m-auto login-box">

                    <div class="login  m-auto row align-items-center login-box" style="">
                        <div class="container">

                            <?php
                            if ($this->session->flashdata('error')) {
                                echo '<div class="alert alert-danger"><strong>' . $this->session->flashdata('error') . '</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                    </button></div>';
                            }
                            if ($this->session->flashdata('message')) {
                                echo '<br /><div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong>' . $this->session->flashdata('message') . '</strong></div>';
                            }
                            ?>
                            <form name="loginform" class="container" id="loginform" action="<?php echo base_url(); ?>home/login_form_submit" method="post">
                                <div class="row">
                                <img class="w-100" width="100%" src="<?= base_url("images/login_logo.png") ?>" />

                                </div>
                             
                                <h3 class="text-center w-100"><?=lang('login')?></h3>
                                <div class="row">
                                    <div class="form-group w-100">
                                        <label for="username"><?=lang('user_name')?></label>
                                        <input type="text" value="<?=isset($_COOKIE['remember_me_user_name']) ? $_COOKIE['remember_me_user_name'] : ''?>" name="User" class="form-control" id="username" placeholder="" required>
                                    </div>
                                    <div class="form-group w-100">
                                        <label for="password"><?=lang('password')?></label>
                                        <input type="password" value="<?=isset($_COOKIE['remember_me_password']) ? $_COOKIE['remember_me_password'] : ''?>" name="Password" class="form-control" id="password" placeholder="" required>
                                    </div>
                                    <div class="form-check w-100 <?=sys_lang()=="english"?"pl-0" :""?>">
                                       <span class="pull-end"> <input type="checkbox" <?=isset($_COOKIE['remember_me']) && $_COOKIE['remember_me']=="on" ? "checked" :""?> name="remember_me" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"> <?=lang('remember_me')?></label>
                                       </span>
                                        <span class="text-end"><a class="forgot-password text-danger" href="#" hrefa="<?= base_url("home/forgot") ?>"><?=lang('is_forget_password')?></a></span>
                                    </div>
                                </div>
                                <div class="row ">

                                    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
                                    <div class="mt-2 col-md-12 p-0" >
                                        <select class="form-control reg-input pull-start text-start" name="language" id="language" style="width:180px;">
                                            <option value="0">English - الإنجليزية</option>
                                            <option value="1">Arabic - العربية</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-danger w-100 mt-2"><?=lang('login')?> <i class="fa fa-arrow-right"></i></button>
                                    <a class="btn btn-lg btn-default mt-3 btn-block text-danger border-danger" href="https://stage.azooma.co/london/add-restaurant"><?=lang('create_account')?></a></span>

                                </div>
                            </form>
                            <form class="forget-form d-none" autocomplete="off" action="<?php echo base_url() ?>home/restpassword" method="POST" id='rest_pass-form'>

                                <h3 class="text-center h4 text-danger"><i class="fa fa-lg fa-3x  fa-lock"></i></h3>
                                <h3 class="text-center  mb-2">  <?=lang('rest_password')?></h3>

                                <p class="text-center"> </p>

                                <div class="form-group mt-2 ml-2 dir-ltr">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-tasks color-blue"></i></span>
                                        </div>
                                        <input id="rest_name" name="user_name" placeholder="<?=lang('user_name')?>  " class="form-control" type="text" required>
                                    </div>

                                </div>
                                <div class="form-group mt-1 ml-2 dir-ltr">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-envelope color-blue"></i></span>
                                        </div>
                                        <input id="email" name="user_email" placeholder="Your Email - البريد الإلكتروني" class="form-control form-focus" type="email" required>
                                    </div>
                                    <div class="form-group btn-container mt-2">
                                        <button class="btn btn-danger btn-block "><?=lang('send')?> <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                    <div class="form-group mt-3">
                                        <p class="semibold-text mb-0 "><a class="text-danger" href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> <?=lang('back2login')?></a></p>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="clearfix" ></div>
    <div class="row mt-sm-2">
        <section class=" article-box">
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="col-icons"><i class="fa fa-cog" aria-hidden="true"></i></div>
                    <h4><strong>Take control</strong> of your information</h4>
                    <p class="">Verified owners and managers can edit their Sufrati.com page instantly to keep their important info up-to-date and accurate.<br> This way our viewers can reach you without any confusion.</p>
                </div>
                <div class="col-sm-4">
                    <div class="col-icons"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                    <h4><strong>Promote</strong> your business</h4>
                    <p class="px-2">Every month more than 600 thousand consumers decide where to eat on Sufrati.com. Claim your restaurant today and start using your Free profile page and if you decide to join one of our membership packages, we'll throw in a free 30-day ad! No credit card or any other obligation required.</p>
                </div>
                <div class="col-sm-4">
                    <div class="col-icons"><i class="fa fa-users" aria-hidden="true"></i></div>
                    <h4><strong>Interact</strong> with your customers</h4>
                    <p class="px-2">By becoming an official member you can interact with your customers and give them the latest news about your Menus, events, locations and more. Sufrati.com offers you the easiest way to promote your offers directly to millions of potential customers all year round.</p>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/new/bootstrap-alert.js"></script>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-8627357-3']);
        _gaq.push(['_setDomainName', 'sufrati.com']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".forgot-password,.semibold-text").click(function() {
                console.log("kk");
                $('.login-form').toggleClass('rotateIn animated d-none');
                $('.forget-form').toggleClass('rotateIn animated d-none');
            });
        });
    </script>
</body>

</html>