<template>
    <div id="backend">
        <div class="wrapper">

            <header class="main-header">
                <a class="logo">
                    <span class="logo-mini"><b>A</b>LT</span>
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                </a>

                <nav class="navbar navbar-static-top">
                    <a class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>manager</li>
                        </ul>
                    </div>
                </nav>
            </header>

            <sidebar></sidebar>
            <!--  <router-view name="a"></router-view>-->
            <router-view></router-view>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.6
                </div>
                <strong>Copyright &copy; 2014-2016 <a>Almsaeed Studio</a>.</strong> All rights
                reserved.
            </footer>
        </div>
    </div>
</template>
