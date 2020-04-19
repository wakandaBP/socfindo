<?php 
    $module = explode(".",$page[0]);
?>

<div class="menu">
    <ul class="list list-menu">
        <li <?php if($module[0]=='dashboard'){ echo "class='active'";} ?>>
            <a href="<?= $tckaret;?>/dashboard">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="header">Master</li>
        <li <?php if($module[0]=='worker'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/worker">
                <i class="material-icons">work</i>
                <span>Worker</span>
            </a>
        </li>
        <li <?php if($module[0]=='plantation'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/plantation">
                <i class="material-icons">layers</i>
                <span>Plantation</span>
            </a>
        </li>
        <li <?php if($module[0]=='clone'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/clone">
                <i class="material-icons">layers</i>
                <span>Clone</span>
            </a>
        </li>
        <li <?php if($module[0]=='treepart'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/treepart">
                <i class="material-icons">layers</i>
                <span>Tree Part</span>
            </a>
        </li>
        <li <?php if($module[0]=='tree'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/tree">
                <i class="material-icons">layers</i>
                <span>Tree</span>
            </a>
        </li>
            <!-- <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">layers</i>
                    <span>Media</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php //echo $tckaret;?>/media">Media List</a>
                    </li>
                    <li>
                        <a href="<?php //echo $tckaret;?>/creationmedia">Creation Media</a>
                    </li>
                    <li>
                        <a href="polen4">Expenditures</a>
                    </li>
                </ul>
            </li> -->
        <li <?php if($module[0]=='mediatype'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/mediatype">
                <i class="material-icons">layers</i>
                <span>Media Type</span>
            </a>
        </li>
        <li <?php if($module[0]=='media'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/media">
                <i class="material-icons">layers</i>
                <span>Media</span>
            </a>
        </li>
        <li <?php if($module[0]=='vessel'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/vessel">
                <i class="material-icons">layers</i>
                <span>Vessel</span>
            </a>
        </li>
        <li <?php if($module[0]=='laminar'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/laminar">
                <i class="material-icons">layers</i>
                <span>Laminar</span>
            </a>
        </li>
        <li <?php if($module[0]=='contamination'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/contamination">
                <i class="material-icons">layers</i>
                <span>Contamination</span>
            </a>
        </li>
		<li <?php if($module[0]=='contamination-record'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/contamination-record">
                <i class="material-icons">layers</i>
                <span>Contamination Record</span>
            </a>
        </li>


        <!-- REJUVINATION -->
        <li class="header">Rejuvination</li>
        <li <?php if($module[0]=='reception'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/reception">
                <i class="material-icons">work</i>
                <span>Reception</span>
            </a>
        </li>
        <!-- <li <?php //if($module[0]=='initiation'){ echo "class='active'";} ?>>
            <a href="<?php //echo $tckaret;?>/initiation">
                <i class="material-icons">layers</i>
                <span>Initiation</span>
            </a>
        </li> -->
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php if($module[0]=='initiation' OR $module[0]=='initiation-obs' OR $module[0]=='embryoscreening'){ echo "toggled"; echo " class='active'";}?>">
                <i class="material-icons">layers</i>
                <span>Initiation</span>
            </a>
            <ul class="ml-menu">
                <li <?php if($module[0]=='initiation'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/initiation">Initiation List</a>
                </li>
                <li <?php if($module[0]=='initiation-obs'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/initiation-obs.chooseid">Observation and Transfer</a>
                </li>
                <li <?php if($module[0]=='embryoscreening'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/embryoscreening">Embyro Screening</a>
                </li>
            </ul>
        </li>
        <!-- <li>
            <a href="javascript:void(0);" class="menu-toggle <?php //if($module[0]=='maturation1' OR $module[0]=='maturation1-screen'){ echo "toggled"; echo " class='active'";}?>">
                <i class="material-icons">layers</i>
                <span>Maturation 1</span>
            </a>
            <ul class="ml-menu">
                <li <?php //if($module[0]=='maturation1'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/maturation1">Maturation 1 List</a>
                </li>
                <li <?php //if($module[0]=='maturation1-screen'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/maturation1-screen">Maturation 1 Screening</a>
                </li>
            </ul>
        </li> -->
        <li <?php if($module[0]=='maturation1'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/maturation1">
                <i class="material-icons">work</i>
                <span>Maturation I</span>
            </a>
        </li>
         <li <?php if($module[0]=='maturation2'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/maturation2">
                <i class="material-icons">work</i>
                <span>Maturation II</span>
            </a>
        </li>
        <!-- <li <?php // if($module[0]=='germination'){ echo "class='active'";}?>>
            <a href="<?php //echo $tckaret;?>/germination">
                <i class="material-icons">list</i>
                <span>Germination</span>
            </a>
        </li> -->
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php if($module[0]=='germination' OR $module[0]=='germination-prepare'){ echo "toggled"; echo " class='active'";}?>">
                <i class="material-icons">layers</i>
                <span>Germination</span>
            </a>
            <ul class="ml-menu">
                <li <?php if($module[0]=='germination'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/germination">Germination List</a>
                </li>
                <li <?php if($module[0]=='germination-prepare'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/germination-prepare">Germination Prepare</a>
                </li>
            </ul>
        </li>
         <!--
        <li <?php //if($module[0]=='transfercallus'){ echo "class='active'";}?>>
            <a href="<?php //echo $tckaret;?>/transfercallus">
                <i class="material-icons">list</i>
                <span>Transfer Callus</span>
            </a>
        </li> -->
       <!--  <li <?php //if($module[0]=='embryoscreening'){ echo "class='active'";}?>>
            <a href="<?php //echo $tckaret;?>/embryoscreening">
                <i class="material-icons">list</i>
                <span>Embryo Screening</span>
            </a>
        </li> -->
        <!-- <li>
            <a href="javascript:void(0);" class="menu-toggle <?php //if($module=='serbuk3' OR $module=='serbuk4'){ echo "toggled";}?>">
                <i class="material-icons">layers</i>
                <span>Embryogenesis</span>
            </a>
            <ul class="ml-menu">
                <li <?php //if($module=='serbuk3'){ echo "class='active'";}?>>
                    <a href="serbuk3">Embryogenesis Add</a>
                </li>
                <li <?php //if($module=='serbuk4'){ echo "class='active'";}?>>
                    <a href="serbuk4">Embryogenesis List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php //if($module=='serbuk3' OR $module=='serbuk4'){ echo "toggled";}?>">
                <i class="material-icons">layers</i>
                <span>Maturation I</span>
            </a>
            <ul class="ml-menu">
                <li <?php //if($module=='serbuk3'){ echo "class='active'";}?>>
                    <a href="serbuk3">Maturation I Add</a>
                </li>
                <li <?php //if($module=='serbuk4'){ echo "class='active'";}?>>
                    <a href="serbuk4">Maturation I List</a>
                </li>
                <li <?php //if($module=='serbuk4'){ echo "class='active'";}?>>
                    <a href="serbuk4">Transfer to Maturation II</a>
                </li>
            </ul>
        </li> -->

        <!-- INVITRO -->
        <li class="header">Invitro</li>
      <!--   <li <?php //if($module=='panen1'){ echo "class='active'";}?>>
            <a href="panen1">
                <i class="material-icons">people</i>
                <span>Mother Plant</span>
            </a>
        </li> -->
        <li <?php //if($module=='panen1'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/motherplant">
                <i class="material-icons">people</i>
                <span>Mother Plant</span>
            </a>
        </li>
        <li <?php //if($module=='panen2'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/Invitro">
                <i class="material-icons">people_outline</i>
                <span>Invitro</span>
            </a>
        </li>
        <li <?php //if($module=='panen2'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/deactivateinvitro">
                <i class="material-icons">people_outline</i>
                <span>Deactivate In Vitro</span>
            </a>
        </li>
        <!--li>
            <a href="javascript:void(0);" class="menu-toggle <?php if($module[0]=='motherplant-in' OR $module[0]=='motherplant-out'){ echo "toggled"; echo " class='active'";}?>">
                <i class="material-icons">layers</i>
                <span>Motherplant</span>
            </a>
            <ul class="ml-menu">
                <li <?php if($module[0]=='motherplant-in'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/motherplant-in">Motherplant from Rejuvination</a>
                </li>
                <li <?php if($module[0]=='motherplant-out'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/motherplant-out">Motherplant from Outside Reju</a>
                </li>
            </ul>
        </li-->

        <li <?php //if($module=='panen2'){ echo "class='active'";}?>>
            <a href="panen2">
                <i class="material-icons">people_outline</i>
                <span>Invitro</span>
            </a>
        </li>

        <!-- EXVITRO -->
        <li class="header">Exvitro</li>
        <li <?php //if($module=='lbk1'){ echo "class='active'";}?>>
            <a href="lbk1">
                <i class="material-icons">grain</i>
                <span>Acclimatization</span>
            </a>
        </li>
        <li <?php //if($module=='lbk2'){ echo "class='active'";}?>>
            <a href="lbk2">
                <i class="material-icons">leak_remove</i>
                <span>Hardening</span>
            </a>
        </li>
        <li <?php //if($module=='lbk3'){ echo "class='active'";}?>>
            <a href="lbk3">
                <i class="material-icons">filter_tilt_shift</i>
                <span>Nursery</span>
            </a>
        </li>
        <li <?php //if($module=='lbk4'){ echo "class='active'";}?>>
            <a href="lbk4">
                <i class="material-icons">nature</i>
                <span>Plantation Field</span>
            </a>
        </li>
        <li <?php //if($module=='lbk5'){ echo "class='active'";}?>>
            <a href="lbk5">
                <i class="material-icons">terrain</i>
                <span>Budwood Garden</span>
            </a>
        </li>
    </ul>
</div>
