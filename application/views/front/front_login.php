<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Group Santa | E-commerce</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url('assets/front/plugins/themefisher-font/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/plugins/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/custom.css');?>">

  </head>

  <body id="body">

    <section class="signin-page account">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="block text-center">
              <a class="logo" href="index.html">
                <img src="<?php echo base_url('assets/front/images/logoimg.png');?>" alt="logo">
              </a>
              <h2 class="text-center">Login</h2>
              <?php if($this->session->flashdata('login_fail')):?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('fail_msg');?>
              </div>
              <?php endif;?>
              <?php echo form_open(base_url('user/do_login'), array('class' => 'text-left clearfix'));?>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" required placeholder="Email" value="<?php echo set_value('email'); ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control"  name = "password" required placeholder="Password" value="<?php echo set_value('password'); ?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-main text-center" >Login</button>
                </div>
              <?php echo form_close();?>
              <p class="mt-20">New in this site ?<a href="<?php echo base_url('user/register');?>"> Create New Account</a></p>
                <!-- <p> Or </p> -->
              <!-- <p><a href="#"> Forgot your password?</a></p> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="<?php echo base_url('assets/front/plugins/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap 3.1 -->
    <script src="<?php echo base_url('assets/front/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
  </body>
</html>