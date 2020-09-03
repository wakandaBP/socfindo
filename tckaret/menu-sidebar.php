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
        <li <?php if($module[0]=='region'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/region">
                <i class="material-icons">layers</i>
                <span>Region</span>
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
        <li <?php if($module[0]=='supplier'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/supplier">
                <i class="material-icons">layers</i>
                <span>Supplier</span>
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
                <i class="material-icons">playlist_add_check</i>
                <span>Reception</span>
            </a>
        </li>
    
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php if($module[0]=='initiation' OR $module[0]=='initiation-obs' OR $module[0]=='embryoscreening'){ echo "toggled"; echo " class='active'";}?>">
                <i class="material-icons">assignment</i>
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
       
        <li <?php if($module[0]=='maturation1'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/maturation1">
                <i class="material-icons">blur_circular</i>
                <span>Maturation I</span>
            </a>
        </li>
         <li <?php if($module[0]=='maturation2'){ echo "class='active'";} ?>>
            <a href="<?php echo $tckaret;?>/maturation2">
                <i class="material-icons">blur_on</i>
                <span>Maturation II</span>
            </a>
        </li>
       
        <li>
            <a href="javascript:void(0);" class="menu-toggle <?php if($module[0]=='germination' OR $module[0]=='germination-prepare'){ echo "toggled"; echo " class='active'";}?>">
                <i class="material-icons">camera</i>
                <span>Germination</span>
            </a>
            <ul class="ml-menu">
                <li <?php if($module[0]=='germination'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/germination">Germination List</a>
                </li>
                <li <?php if($module[0]=='germination-prepare'){ echo "class='active'";}?>>
                    <a href="<?php echo $tckaret;?>/germination-prepare">Prepare for Motherplant</a>
                </li>
            </ul>
        </li>
        <!-- INVITRO -->
        <li class="header">Invitro</li>
        <li <?php if($module[0]=='motherplant'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/motherplant">
                <i class="material-icons">leak_add</i>
                <span>Mother Plant</span>
            </a>
        </li>
        <li <?php if($module[0]=='invitro'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/invitro">
                <i class="material-icons">grain</i>
                <span>Invitro</span>
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

        <!-- EXVITRO -->
        <li class="header">Exvitro</li>
        <li <?php if($module[0]=='acclimatization'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/acclimatization">
                <i class="material-icons">present_to_all</i>
                <span>Acclimatization</span>
            </a>
        </li>
        <li <?php if($module[0]=='hardening'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/hardening">
                <i class="material-icons">leak_remove</i>
                <span>Hardening</span>
            </a>
        </li>
        <li <?php if($module[0]=='nursery'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/nursery">
                <i class="material-icons">filter_tilt_shift</i>
                <span>Nursery</span>
            </a>
        </li>
        <li <?php if($module[0]=='plantation_field'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/plantation_field">
                <i class="material-icons">nature</i>
                <span>Plantation Field</span>
            </a>
        </li>
        <li <?php if($module[0]=='budwood_garden'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/budwood_garden">
                <i class="material-icons">terrain</i>
                <span>Budwood Garden</span>
            </a>
        </li>
        <li <?php if($module[0]=='stock_cuttings'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/stock_cuttings">
                <i class="material-icons">content_cut</i>
                <span>Stock For Cuttings</span>
            </a>
        </li>
        <li <?php if($module[0]=='rooting'){ echo "class='active'";}?>>
            <a href="<?php echo $tckaret;?>/rooting">
                <i class="material-icons">ac_unit</i>
                <span>Rooting Green House</span>
            </a>
        </li>
    </ul>
</div>
