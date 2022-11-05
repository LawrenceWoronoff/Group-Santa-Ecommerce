<header class="dt-header">
<div class="dt-header__container">
    <div class="dt-brand">
        <div class="dt-brand__tool" data-toggle="main-sidebar">
            <i class="icon icon-xl icon-menu-fold d-none d-lg-inline-block"></i>
            <i class="icon icon-xl icon-menu d-lg-none"></i>
        </div>
        <span class="dt-brand__logo">
            <a class="dt-brand__logo-link" href="index.html">
                <img class="dt-brand__logo-img d-none d-lg-inline-block" src="<?php echo base_url('assets/front/images/logoimg.png');?>" alt="Wieldy">
                <img class="dt-brand__logo-symbol d-lg-none" src="<?php echo base_url('assets/front/images/logoimg.png');?>" alt="Wieldy">
            </a>
        </span>
    </div>
    <div class="dt-header__toolbar">
        <div class="dt-nav-wrapper">
            <ul class="dt-nav ">
                <li class="dt-nav__item dropdown">
                    <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="dt-avatar size-40" src="<?php echo base_url('assets/admin/img/admin_avatar.png');?>" alt="Domnic Harris">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dt-avatar-wrapper flex-nowrap p-6 mt--5 bg-gradient-purple text-white rounded-top">
                            <img class="dt-avatar" src="<?php echo base_url('assets/admin/img/admin_avatar.png');?>" alt="Domnic Harris">
                            <span class="dt-avatar-info">
                                <span class="dt-avatar-name">System</span>
                                <span class="f-12">Administrator</span>
                            </span>
                        </div>
                        <a class="dropdown-item" href="<?php echo base_url('admin/reset_password');?>"> 
                            <i class="icon icon-user-o icon-fw mr-2 mr-sm-1"></i>Reset Password
                        </a> 
                        
                        <a class="dropdown-item" href="<?php echo base_url('admin/do_logout');?>"> 
                            <i class="icon icon-edit icon-fw mr-2 mr-sm-1"></i>Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</header>
