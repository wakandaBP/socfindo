

<div class="menu">
    <ul class="list">
        <li <?php //if($module=='home'){ echo "class='active'";}?>>
            <a href="home">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="header">PENGUMPUL POLEN</li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php //if($module=='polen1' OR $module=='polen2'){ echo "toggled";}?>">
                <i class="material-icons">assignment</i>
                <span>Komersil</span>
            </a>
            <ul class="ml-menu">
                <li <?php //if($module=='polen1'){ echo "class='active'";}?>>
                    <a href="polen1">Karyawan</a>
                </li>
                <li <?php //if($module=='polen2'){ echo "class='active'";}?>>
                    <a href="polen2">Mandor</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php //if($module=='polen3' OR $module=='polen4'){ echo "toggled";}?>">
                <i class="material-icons">layers</i>
                <span>Breeding</span>
            </a>
            <ul class="ml-menu">
                <li <?php //if($module=='polen3'){ echo "class='active'";}?>>
                    <a href="polen3">Karyawan</a>
                </li>
                <li <?php //if($module=='polen4'){ echo "class='active'";}?>>
                    <a href="polen4">Mandor</a>
                </li>
            </ul>
        </li>
        <li class="header">POLINATOR</li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php //if($module=='serbuk1' OR $module=='serbuk2'){ echo "toggled";}?>">
                <i class="material-icons">assignment</i>
                <span>Komersil</span>
            </a>
            <ul class="ml-menu">
                <li <?php //if($module=='serbuk1'){ echo "class='active'";}?>>
                    <a href="serbuk1">Karyawan</a>
                </li>
                <li <?php //if($module=='serbuk2'){ echo "class='active'";}?>>
                    <a href="serbuk2">Mandor</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php //if($module=='serbuk3' OR $module=='serbuk4'){ echo "toggled";}?>">
                <i class="material-icons">layers</i>
                <span>Breeding</span>
            </a>
            <ul class="ml-menu">
                <li <?php //if($module=='serbuk3'){ echo "class='active'";}?>>
                    <a href="serbuk3">Karyawan</a>
                </li>
                <li <?php //if($module=='serbuk4'){ echo "class='active'";}?>>
                    <a href="serbuk4">Mandor</a>
                </li>
            </ul>
        </li>
        <li class="header">PANEN</li>
        <li <?php //if($module=='panen1'){ echo "class='active'";}?>>
            <a href="panen1">
                <i class="material-icons">people</i>
                <span>Karyawan</span>
            </a>
        </li>
        <li <?php //if($module=='panen2'){ echo "class='active'";}?>>
            <a href="panen2">
                <i class="material-icons">people_outline</i>
                <span>Mandor</span>
            </a>
        </li>
        <li class="header">LABORATORIUM BUAH KAWINAN</li>
        <li <?php //if($module=='lbk1'){ echo "class='active'";}?>>
            <a href="lbk1">
                <i class="material-icons">grain</i>
                <span>Rontok</span>
            </a>
        </li>
        <li <?php //if($module=='lbk2'){ echo "class='active'";}?>>
            <a href="lbk2">
                <i class="material-icons">leak_remove</i>
                <span>Kupas</span>
            </a>
        </li>
        <li <?php //if($module=='lbk3'){ echo "class='active'";}?>>
            <a href="lbk3">
                <i class="material-icons">filter_tilt_shift</i>
                <span>Sortasi</span>
            </a>
        </li>
        <li <?php //if($module=='lbk4'){ echo "class='active'";}?>>
            <a href="lbk4">
                <i class="material-icons">local_shipping</i>
                <span>Petugas Transportasi</span>
            </a>
        </li>
        <li <?php //if($module=='lbk5'){ echo "class='active'";}?>>
            <a href="lbk5">
                <i class="material-icons">people_outline</i>
                <span>Mandor</span>
            </a>
        </li>
    </ul>
</div>

        <!-- <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> 
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>MASTER <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/mahasiswa">Mahasiswa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/dosen">Dosen</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/kelas">Kelas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/jurusan">Jurusan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/matakuliah">Mata Kuliah</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/kelompok">Kelompok</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2    " aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>AKTIVITAS <span class="badge badge-success">6</span></a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/jadwal">Jadwal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $admin_server;?>/dosen">Kuis</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div> -->