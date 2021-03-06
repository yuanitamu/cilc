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
<link href="<?php echo base_url(); ?>assets/metrostyle/css/twitter/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/metrostyle/css/base.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/metrostyle/css/twitter/responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/metrostyle/css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/modernizr.custom.32549.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>assets/metrostyle/../../../html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
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
        <li class="accordion-group  color_10 "> <?php echo anchor('admin/homeListCountry',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/dashboard.png"><span>Dashboard</span>'); ?> </li>
        <li class="accordion-group  color_7 "> <?php echo anchor('admin/homeAddCountry',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/forms.png"><span>Add Country</span>'); ?> </li>
        <li class="accordion-group  color_13 "> <?php echo anchor('admin/homeListPrice',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/widgets.png"><span>Price List</span>'); ?> </li>
        <li class="accordion-group  color_10 "> <?php echo anchor('admin/homeListMap',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/maps.png"><span>Country Location</span>'); ?> </li>
        <li class="accordion-group  color_7 active"> <?php echo anchor('admin/homeDaftarMap',' <img src="'.base_url().'assets/metrostyle/img/menu_icons/explorer.png"><span>Maps</span>'); ?> </li>
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
          </li>
        </ul>
      </div>
      <!-- End top-right --> 
    </div>
    <div id="main_container">
      <h2>List Country</h2>
          <div class="row-fluid">
            <div class="span12">
                <div class="title">
                <h3> <i class="icon-sitemap"></i> <span>Country Location</span> </h3>
                </div>
                  <div class="content"> 
                    <?php echo $detail['mapedit']['map']['js']; ?>
                    <?php echo $detail['mapedit']['map']['html']; ?>
                  </div>
              <!-- End .box --> 
            </div>
            <!-- End .span12 --> 
           </div>
          <!-- End .row-fluid -->
    <!-- End #container --> 
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

<!-- Flot charts --> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/flot/jquery.flot.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/flot/jquery.flot.stack.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/flot/jquery.flot.pie.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/flot/jquery.flot.resize.js"></script> 

<!-- Data tables --> 
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Task plugin --> 
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/metrostyle/js/plugins/knockout-2.0.0.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="<?php echo base_url(); ?>assets/metrostyle/js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/
/* Todo Plugin */
var data = [
{id: 1, title: "<i class='gicon-gift icon-white'><\/i>Have tea with the Queen", isDone: false},
{id: 2, title: "<i class='gicon-briefcase icon-white'><\/i>Steal  James Bond car", isDone: true},
{id: 3, title: "<i class='gicon-heart icon-white'><\/i>Confirm that this template is awesome", isDone: false},
{id: 4, title: "<i class='gicon-thumbs-up icon-white'><\/i>Nothing", isDone: false},  
{id: 5, title: "<i class='gicon-fire icon-white'><\/i>Play solitaire", isDone: false}         
];


function Task(data) {
  this.title = ko.observable(data.title);
  this.isDone = ko.observable(data.isDone);
  this.isEditing = ko.observable(data.isEditing);

  this.startEdit = function (event) {
      console.log("editing");
      this.isEditing(true);
  }

  this.updateTask = function (task) {
      this.isEditing(false);
  }
}

function TaskListViewModel() {
          // Data
          var self = this;
          self.tasks = ko.observableArray([]);
          self.newTaskText = ko.observable();
          self.incompleteTasks = ko.computed(function() {
              return ko.utils.arrayFilter(self.tasks(), 
                function(task) { 
                  return !task.isDone() && !task._destroy;
              });
          });

          self.completeTasks = ko.computed(function(){
              return ko.utils.arrayFilter(self.tasks(), 
                function(task) { 
                  return task.isDone() && !task._destroy;
              });
          });

          // Operations
          self.addTask = function() {
              self.tasks.push(new Task({ title: this.newTaskText(), isEditing: false }));

              self.newTaskText("");

          };
          self.removeTask = function(task) { self.tasks.destroy(task) };

          self.removeCompleted = function(){
              self.tasks.destroyAll(self.completeTasks());
          };

          /* Load the data */
          var mappedTasks = $.map(data, function(item){
              return new Task(item);
          });

          self.tasks(mappedTasks);      
      }

      ko.applyBindings(new TaskListViewModel());  
      //End Todo Plugin

      </script><script type="text/javascript">
      //Chart - Campaigns
      $(function () {
        var d4 = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], [37,9], [38,10],[39,12],[40,14],[41,15],[42,13],[43,11],[44,10],[45,9],[46,8],[47,12],[48,14],[49,16],[50,12],[51,10], [52,9], [53,8], [54,6], [55,5], [56,3], [57,9], [58,10],[59,12],[60,14],[61,15],[62,13],[63,11],[64,10],[65,9],[66,8],[67,12],[68,14],[69,16]];
        var d5 = [[1,12], [2,10], [3,9], [4,8], [5,8], [6,8], [7,8], [8,8],[9,9],[10,9],[11,10],[12,11],[13,12],[14,11],[15,10],[16,10],[17,9],[18,10],[19,11],[20,11],[21,12],[22,13],[23,14],[24,13],[25,12],[25,12],[26,11],[27,10],[28,9],[29,8],[30,7],[31,7], [32,8], [33,8], [34,7], [35,6], [36,6], [37,7], [38,8],[39,8],[40,9],[41,10],[42,11],[43,11],[44,12],[45,12],[46,11],[47,10],[48,9],[49,8],[50,8],[51,9], [52,10], [53,11], [54,12], [55,12], [56,12], [57,13], [58,13],[59,12],[60,11],[61,10],[62,9],[63,8],[64,7],[65,7],[66,6],[67,5],[68,4],[69,3]];

        var plot = $.plot($("#placeholder"),
            [ { data: d4, color:"rgba(0,0,0,0.2)", shadowSize:0, 
            bars: {
              show: true,
              lineWidth: 0,
              fill: true,

              fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
          }
      } , 
      { data: d5, 

          color:"rgba(255,255,255, 0.4)", 
          shadowSize:0,
          lines: {show:true, fill:false}, points: {show:false},
          bars: {show:false},
      },  
      ],     
      {
        series: {
         bars: {show:true, barWidth: 0.6}
     },
     grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
     yaxis: { min: 0, max: 20 },

 });

        function showTooltip(x, y, contents) {
            $('<div id="tooltip"><div class="date">12 Nov 2012<\/div><div class="title text_color_3">'+x/10+'%<\/div> <div class="description text_color_3">CTR<\/div><div class="title ">'+x*12+'<\/div><div class="description">Impressions<\/div><\/div>').css( {
                position: 'absolute',
                display: 'none',
                top: y - 125,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff',
                opacity: 10
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#placeholder").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                  previousPoint = item.dataIndex;
                  $("#tooltip").remove();
                  var x = item.datapoint[0].toFixed(2),
                  y = item.datapoint[1].toFixed(2);
                  showTooltip(item.pageX, item.pageY,
                    x);
              }
          }
      });

         //Fundraisers chart
         var d6 = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], ];
         $.plot($("#placeholder2"),
           [ { data: d6, color:"#fff", shadowSize:0, 
           bars: {
              show: true,
              lineWidth: 0,
              fill: true,
              highlight: {
                opacity: 0.3
            },
            fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
        },
    } , 
    ],     
    {
       series: {
         bars: {show:true, barWidth: 0.6}
     },
     grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
     yaxis: { min: 0, max: 23 },

 });

         function showTooltip2(x, y, contents) {
          $('<div id="tooltip"><div class="title ">'+x*2+'</div><div class="description">Impressions</div></div>').css( {
            position: 'absolute',
            display: 'none',
            top: y - 58,
            left: x - 40,
            border: '0px solid #ccc',
            padding: '2px 6px',
            'background-color': '#fff',
            opacity: 10
        }).appendTo("body").fadeIn(200);
      }

      var previousPoint = null;
      $("#placeholder2").bind("plothover", function (event, pos, item) {
          $("#x").text(pos.x.toFixed(2));
          $("#y").text(pos.y.toFixed(2));
          if (item) {
            if (previousPoint != item.dataIndex) {
              previousPoint = item.dataIndex;
              $("#tooltip").remove();
              var x = item.datapoint[0].toFixed(2),
              y = item.datapoint[1].toFixed(2);
              showTooltip2(item.pageX, item.pageY,
                x);
          }
      }
  });
    //Envato chart
    $.plot($("#placeholder3"),
       [ { data: d6, color:"rgba(0,0,0,0.2)", shadowSize:0, 
       bars: {

          lineWidth: 0,
          fill: true,

          fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
      },
      lines: {show:false, fill:true}, points: {show:false},
  } , 
  ],     
  {
   series: {
     bars: {show:true, barWidth: 0.6}
 },
 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
 yaxis: { min: 0, max: 23 },

});
    //Facebook chart
    $.plot($("#placeholder4"),
       [ { data: d6, color:"rgba(0,0,0,0.2)", shadowSize:0, 
       bars: {

          lineWidth: 0,
          fill: true,

          fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
      },
      lines: {show:false, fill:true}, points: {show:false},
  } , 
  ],     
  {
   series: {
     bars: {show:true, barWidth: 0.6}
 },
 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
 yaxis: { min: 0, max: 23 },

});
    // End Fundraiser chart
});
</script>
<script type="text/javascript">

      function getLangLat(lat,lang)
      {
        var lats=lat;
        var langs=lang;
        document.getElementById('langz').value=langs;
        document.getElementById('latz').value=lats;
      }
    </script>
    <script type="text/javascript">
    function getLangLatStart(lat,lang)
      {
        var lats=lat;
        var langs=lang;
        document.getElementById('langzStart').value=langs;
        document.getElementById('latzStart').value=lats;
      }

    </script>

    <script type="text/javascript">
    if (document.isReady){
      google.maps.event.trigger(map, 'resize');
    }
    </script>
</body>
</html>