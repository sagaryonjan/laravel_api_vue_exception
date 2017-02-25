<template>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a ><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <router-link tag="li" :to="{ name : 'admin.dashboard' }">
                   <a> <i class="fa fa-dashboard text-aqua"></i><span>Dashboard</span></a>
                </router-link>

                <router-link tag="li" :to="{ name : 'admin.user.index' }">
                    <a><i class="fa fa-users text-aqua"></i><span>Users</span></a>
                </router-link>

                <router-link tag="li" :to="{ name : 'admin.category.index' }">
                    <a><i class="fa fa-sitemap text-aqua"></i><span>Category</span></a>
                </router-link>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

</template>
