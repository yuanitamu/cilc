<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>COLIC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/metrostyle/css/images/favicon.png">
<!-- Le styles -->
<link href="<?php echo base_url(); ?>assets/metrostyle/js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/metrostyle/css/twitter/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/metrostyle/css/base.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/metrostyle/css/twitter/responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/metrostyle/css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/modernizr.custom.32549.js"></script>
</head>

<body>
<div id="loading"><img src="<?php echo base_url(); ?>assets/metrostyle/img/ajax-loader.gif"></div>
<div id="responsive_part">
  <div class="logo"> <a href="index.html"><span>Start</span><span class="icon"></span></a> </div>
  <ul class="nav responsive">
    <li>
      <button class="btn responsive_menu icon_item" data-toggle="collapse" data-target=".overview"> <i class="icon-reorder"></i> </button>
    </li>
  </ul>
</div>
<!-- Responsive part -->

<div id="sidebar" class=" collapse1 in">
  <div class="scrollbar">
    <div class="track">
      <div class="thumb">
        <div class="end"></div>
      </div>
    </div>
  </div>
  <div class="viewport ">
    <div class="overview collapse">
      <div class="search row-fluid container">
       <span><h3><img src="<?php echo base_url(); ?>assets/metrostyle/img/general/cilc2.png" width=200px></h3></span>
      </div>
      <ul id="sidebar_menu" class="navbar nav nav-list container full">
        <li class="accordion-group  color_10 active"> <?php echo anchor('admin/homeListCountry',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/dashboard.png"><span>Dashboard</span>'); ?> </li>
        <li class="accordion-group  color_7 "> <?php echo anchor('admin/homeAddCountry',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/forms.png"><span>Add Country</span>'); ?> </li>
        <li class="accordion-group  color_13"> <?php echo anchor('admin/homeListPrice',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/widgets.png"><span>Price List</span>'); ?> </li>
        <li class="accordion-group  color_10 "> <?php echo anchor('admin/homeListMap',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/maps.png"><span>Country Location</span>'); ?> </li>
        <li class="accordion-group  color_7 "> <?php echo anchor('admin/homeDaftarMap',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/explorer.png"><span>Maps</span>'); ?> </li>
        <li class="accordion-group  color_19 "> <?php echo anchor('admin/homeUpdatePassword',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/locker.png"><span>Change Password</span>'); ?> </li>
        <li class="accordion-group  color_15 "> <?php echo anchor('admin/homeUpdateUsername',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/profil.png"><span>Update Username</span>'); ?> </li>
        <li class="accordion-group  color_16 "> <?php echo anchor('admin/homeLogout',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/logout.png"><span>Logout</span>'); ?> </li>
      </ul>
      <div class="menu_states row-fluid container ">
        <h2 class="pull-left">Menu Settings</h2>
        <div class="options pull-right">
          <button id="menu_state_1" class="color_4" rel="tooltip" data-state ="sidebar_icons" data-placement="top" data-original-title="Icon Menu">1</button>
          <button id="menu_state_2" class="color_4 active" rel="tooltip" data-state ="sidebar_default" data-placement="top" data-original-title="Fixed Menu">2</button>
          <button id="menu_state_3" class="color_4" rel="tooltip" data-placement="top" data-state ="sidebar_hover" data-original-title="Floating on Hover Menu">3</button>
        </div>
      </div>
      <!-- End sidebar_box --> 
      
    </div>
  </div>
</div>
<div id="main">
  <div class="container">
    <div class="header row-fluid">
      <div class="logo"> <?php echo anchor ('admin/homeListCountry','<span>Start</span><span class="icon"></span>')?> </div>
      <div class="top_right">
        <ul class="nav nav_menu">
          <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="../../page.html">
            <div class="title"><span class="name"><?php echo $detail['username']; ?></span><span class="subtitle">Administrator</span></div>
            <span class="icon"><img src="<?php echo base_url().'upload/admin/'.'contact.png'; ?>" width=73px></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li><?php echo anchor ('admin/homeUpdateUsername','<i class=" icon-user"></i>Edit Username')?></li>
              <li><?php echo anchor ('admin/homeUpdatePassword','<i class=" icon-cog"></i>Update Password')?></li>
              <li><?php echo anchor ('admin/homeLogout','<i class="icon-unlock"></i>Log out')?></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- End top-right --> 
    </div>
    <div id="main_container">
      <h2>List Country</h2>
      <div class="row-fluid">
        <div class="box ">
          <div class="title">
            <h4> <span>Data Country <small>(all of counts will return in json mode)</small></span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
              <thead>
                <tr>
                  <th class="jv no_sort">Country</th>
                  <th class="to_hide_phone">Capital City</th>
                  <th class="to_hide_phone">Area</th>
                  <th class="to_hide_phone">Density</th>
                  <th class="to_hide_phone">Currency</th>
                  <th class="to_hide_phone">Language</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($detail['negara']->result() as $key ): ?>
                  <tr>
                    <td><img class="thumbnail small" height="42" width="42" src="<?php echo base_url().'upload/'.$key->bendera ?>"></td>
                      <td class="to_hide_phone"><?php echo $key->ibukota; ?></td>
                      <td class="to_hide_phone"><?php echo $key->luas; ?></td>
                      <td class="to_hide_phone"><?php echo $key->kepadatan; ?></td>
                      <td class="to_hide_phone"><?php echo $key->matauang; ?></td>
                      <td class="to_hide_phone"><?php echo $key->bahasa; ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      <!-- End .row-fluid --> 
    </div>
  <div id="footer">
    <p> &copy; COLIC - admin panel </p>
    <span class="company_logo"><a href="../../../www.pixelgrade.com/default.htm"></a></span> </div>
</div>
<div class="background_changer dropdown">
  <div class="dropdown" id="colors_pallete"> <a data-toggle="dropdown" data-target="drop4" class="change_color"></a>
    <ul  class="dropdown-menu pull-left" role="menu" aria-labelledby="drop4">
      <li><a data-color="color_0" class="color_0" tabindex="-1">1</a></li>
      <li><a data-color="color_1" class="color_1" tabindex="-1">1</a></li>
      <li><a data-color="color_2" class="color_2" tabindex="-1">2</a></li>
      <li><a data-color="color_3" class="color_3" tabindex="-1">3</a></li>
      <li><a data-color="color_4" class="color_4" tabindex="-1">4</a></li>
      <li><a data-color="color_5" class="color_5" tabindex="-1">5</a></li>
      <li><a data-color="color_6" class="color_6" tabindex="-1">6</a></li>
      <li><a data-color="color_7" class="color_7" tabindex="-1">7</a></li>
      <li><a data-color="color_8" class="color_8" tabindex="-1">8</a></li>
      <li><a data-color="color_9" class="color_9" tabindex="-1">9</a></li>
      <li><a data-color="color_10" class="color_10" tabindex="-1">10</a></li>
      <li><a data-color="color_11" class="color_11" tabindex="-1">10</a></li>
      <li><a data-color="color_12" class="color_12" tabindex="-1">12</a></li>
      <li><a data-color="color_13" class="color_13" tabindex="-1">13</a></li>
      <li><a data-color="color_14" class="color_14" tabindex="-1">14</a></li>
      <li><a data-color="color_15" class="color_15" tabindex="-1">15</a></li>
      <li><a data-color="color_16" class="color_16" tabindex="-1">16</a></li>
      <li><a data-color="color_17" class="color_17" tabindex="-1">17</a></li>
      <li><a data-color="color_18" class="color_18" tabindex="-1">18</a></li>
      <li><a data-color="color_19" class="color_19" tabindex="-1">19</a></li>
      <li><a data-color="color_20" class="color_20" tabindex="-1">20</a></li>
      <li><a data-color="color_21" class="color_21" tabindex="-1">21</a></li>
      <li><a data-color="color_22" class="color_22" tabindex="-1">22</a></li>
      <li><a data-color="color_23" class="color_23" tabindex="-1">23</a></li>
      <li><a data-color="color_24" class="color_24" tabindex="-1">24</a></li>
      <li><a data-color="color_25" class="color_25" tabindex="-1">25</a></li>
    </ul>
  </div>
</div>
<!-- End .background_changer -->
</div>
<!-- /container --> 

<!-- Le javascript
    ================================================== --> 
<!-- General scripts --> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/jquery.js" type="text/javascript"> </script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/enquire.min.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/jquery.sparkline.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/excanvas.compiled.js" type="text/javascript"></script> 
Modal Concept 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/avgrund.js"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-transition.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-alert.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-dropdown.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-tab.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-popover.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-button.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-carousel.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/bootstrap-affix.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/fileinput.jquery.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/jquery.touchdown.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/jquery.uniform.min.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/jnavigate.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/jquery.touchSwipe.min.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/jquery.peity.min.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 

<!-- Data tables plugin --> 
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/
  // Datatables
    $(document).ready(function() {
    
      var dontSort = [];
                $('#datatable_example thead th').each( function () {
                    if ( $(this).hasClass( 'no_sort' )) {
                        dontSort.push( { "bSortable": false } );
                    } else {
                        dontSort.push( null );
                    }
      } );
      $('#datatable_example').dataTable( {
        "sDom": "<'row-fluid table_top_bar'<'span12'<'to_hide_phone' f>>>t<'row-fluid control-group full top' <'span4 to_hide_tablet'l><'span8 pagination'p>>",
         "aaSorting": [[ 1, "asc" ]],
        "bPaginate": true,

        "sPaginationType": "full_numbers",
        "bJQueryUI": false,
        "aoColumns": dontSort,
        
      } );
      $.extend( $.fn.dataTableExt.oStdClasses, {
        "s`": "dataTables_wrapper form-inline"
      } );

       $(".chzn-select, .dataTables_length select").chosen({
                   disable_search_threshold: 10

        });
    });
  

</script>
</body>
</html>