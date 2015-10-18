<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('lte2.3/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Ule Palangka</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" ic-indicator="#indic-loader">
            <li class="header">NAVIGASI UTAMA</li>
            <li class="treeview">
                <a href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-industry"></i>
                    <span>Alumni</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a ic-get-from="{{ route('alumni') }}" ic-target="#content-load" ic-push-url="true">
                            <i class="fa fa-circle-o"></i> Tabulasi</a></li>
                    <li><a ic-get-from="{{ route('alumni.show') }}" ic-target="#content-load" ic-push-url="true">
                            <i class="fa fa-eye"></i> Profile Anda</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Posting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a ic-get-from="{{ route('pengumuman') }}" ic-target="#content-load" ic-push-url="true">
                            <i class="fa fa-circle-o"></i> Pengumuman</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Berita</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Lowongan Pekerjaan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Survey</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Daftar</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Buat</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

