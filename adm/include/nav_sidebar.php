<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Main Navigation ------</li>
            <li class="<?php if ($view == 'home') echo 'active'; ?>">
                <a href="<?php echo urlroute('home'); ?>">
                    <i class="fa fa-circle-o"></i>
                    <span>Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="<?php if ($view == 'settings') echo 'active'; ?>">
                <a href="<?php echo urlroute('settings'); ?>">
                    <em class="fa fa-circle-o"></em>
                    <span>Settings</span>
                </a>
            </li>
            <li class="<?php if ($view == 'partner') echo 'active'; ?>">
                <a href="<?php echo urlroute('partner');?>">
                    <i class="fa fa-circle-o"></i>
                    <span>Partner</span>
                </a>
            </li>
           
        </ul>
    </section>
</aside>