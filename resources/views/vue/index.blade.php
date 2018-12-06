@extends('master')

@section('title', 'Vue.js App')

@section('header')
<!-- Logo -->
<a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>D</b>AD</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>DAD</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!--<li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 9 tasks</li>
                    <li>
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <h3>
                                        Design some buttons
                                        <small class="pull-right">20%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>
                </ul>
            </li>-->
            <li class="dropdown user user-menu" v-if="this.$store.state.user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ URL::asset('img/avatar.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">@{{this.$store.state.user.name}}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ URL::asset('img/avatar.png') }}" class="img-circle" alt="User Image">

                        <p>
                            @{{this.$store.state.user.name}}
                            <small>@{{this.$store.state.user.type}}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <router-link to="/profile"  class="btn btn-default btn-flat"><i class="fa fa-briefcase"></i> <span>Profile</span></router-link>
                        </div>
                    </li>
                </ul>
            </li>
            <li v-show="this.$store.state.user">
                <router-link to="/logout"><i class="fa fa-briefcase"></i> <span>Logout</span></router-link>
            </li>
            <li v-show="!this.$store.state.user">
                <router-link to="/login"><i class="fa fa-briefcase"></i> <span>Login</span></router-link>
            </li>
        </ul>
    </div>
</nav>
@endsection

@section('sidebar')
<!-- Sidebar user panel -->
<div class="user-panel" v-if="this.$store.state.user">
    <div class="pull-left image">
        <img src="{{ URL::asset('img/avatar.png') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>@{{this.$store.state.user.name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    
    <!-- Waiter -->
    <li v-if="this.$store.state.user && this.$store.state.user.type === NULL"><router-link to="/waiter"><i class="fa fa-briefcase"></i> <span>Waiter</span></router-link></li>

    <!-- Manager -->
    <li v-if="this.$store.state.user && this.$store.state.user.type === 'manager'"><router-link to="/dashboard"><i class="fa fa-briefcase"></i> <span>Dashboard</span></router-link></li>
    <li v-if="this.$store.state.user && this.$store.state.user.type === 'manager'"><router-link to="/table"><i class="fa fa-flag-o"></i> <span>Tables</span></router-link></li>
    <li v-if="this.$store.state.user && this.$store.state.user.type === 'manager'"><router-link to="/menu"><i class="fa fa-envelope-o"></i> <span>Menu</span></router-link></li>
    <li v-if="this.$store.state.user && this.$store.state.user.type === 'manager'"><router-link to="/users"><i class="fa fa-users"></i> <span>Users</span></router-link></li>
    <li v-if="this.$store.state.user && this.$store.state.user.type === 'manager'"><router-link to="/stats"><i class="fa fa-circle"></i> <span>Stats</span></router-link></li>
    <!--
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
    </li>-->
</ul>
@endsection

@section('content')
    <router-view></router-view>
@endsection

@section('pagescript')
<script src="js/vue.js"></script>
 @stop  
