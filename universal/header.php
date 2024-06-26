
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$CompanyName;?> Support | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=$URL?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$URL?>bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$URL?>bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=$URL?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=$URL?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=$URL?>bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="<?=$URL?>bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?=$URL?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?=$URL?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?=$URL?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      
      <a href="index2.html" class="logo">
        
        <span class="logo-mini"><b><?=$CompanyName;?></b></span>
        
        <span class="logo-lg"><b><?=$CompanyName;?></b> Support</span>
      </a>
      
      <nav class="navbar navbar-static-top">
        
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  
                  
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
                  <!-- <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                        page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul> -->
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
                  <!-- <ul class="menu">
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
                    <li>
                      <a href="#">
                        <h3>
                          Create a nice theme
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <h3>
                          Some task I need to do
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <h3>
                          Make beautiful transitions
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul> -->
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?=$URL?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?=$user_full_name;?></span>
              </a>
              <!-- <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?=$URL?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul> -->
            </li>
            <!-- <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> -->
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?=$URL?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?=$user_full_name;?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Introduction</li>
          <li>
            <a href="<?=$URL;?>dashboard">
              <i class="fa fa-laptop"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
          <li class="header">Settings</li>
          <!-- <li>
            <a href="<?=$URL;?>dashboard/organization">
              <i class="fa fa-bank"></i> <span>Organization Settings</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li> -->
          <li>
            <a href="<?=$URL;?>dashboard/mailsettings">
              <i class="fa fa-envelope"></i> <span>Mail Settings</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
          <li>
            <a href="<?=$URL;?>dashboard/users">
              <i class="fa fa-users"></i> <span>User List</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
          <li class="header">Featured</li>
          <li>
            <a href="<?=$URL;?>dashboard/ticketlist">
              <i class="fa fa-calendar"></i> <span>Ticket List</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li>li class
            <a href="<?=$URL;?>dashboard/who_are_we">
              <i class="fa fa-file-pdf-o"></i> <span>who_are_we</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
          <li>
            <a href="<?=$URL;?>dashboard/our_values">
              <i class="fa fa-file-pdf-o"></i> <span>our_values</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
          <li>
            <a href="<?=$URL;?>dashboard/clients">
              <i class="fa fa-file-pdf-o"></i> <span>clients</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li>
            <a href="<?=$URL;?>dashboard/recent_posts">
              <i class="fa fa-file-pdf-o"></i> <span>Recent_posts</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
          <li>
            <a href="<?=$URL;?>dashboard/contact_us">
              <i class="fa fa-file-pdf-o"></i> <span>contact_us</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li>
            <a href="<?=$URL;?>dashboard/contact_us_details">
              <i class="fa fa-file-pdf-o"></i> <span>contact_us_details</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li>
            <a href="<?=$URL;?>dashboard/team">
              <i class="fa fa-file-pdf-o"></i> <span>TEAM</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <!-- testimonials -->
         
          <li>
            <a href="<?=$URL;?>dashboard/testimonials">
              <i class="fa fa-file-pdf-o"></i> <span>Testimonials</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

        <!-- services -->
        <li>
            <a href="<?=$URL;?>dashboard/services">
              <i class="fa fa-file-pdf-o"></i> <span>Services</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <!-- pricing -->
          <li>
            <a href="<?=$URL;?>dashboard/pricing">
              <i class="fa fa-file-pdf-o"></i> <span>pricing</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <!-- faq -->
          <li>
            <a href="<?=$URL;?>dashboard/faq">
              <i class="fa fa-file-pdf-o"></i> <span>F.A.Q</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>


<!-- organization -->

          <li>
            <a href="<?=$URL;?>dashboard/organization">
              <i class="fa fa-file-pdf-o"></i> <span>organization</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <!-- notice -->



          <li>
            <a href="<?=$URL;?>dashboard/notice">
              <i class="fa fa-file-pdf-o"></i> <span>notice</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>


          <!-- gallery -->
          <li>
            <a href="<?=$URL;?>dashboard/gallery">
              <i class="fa fa-file-pdf-o"></i> <span>gallery</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

         <!-- slider -->
         <li>
            <a href="<?=$URL;?>dashboard/slider">
              <i class="fa fa-file-pdf-o"></i> <span>slider</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
        <!-- blog -->
        <li>
            <a href="<?=$URL;?>dashboard/blog">
              <i class="fa fa-file-pdf-o"></i> <span>blog</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>


          <!-- blog_comments -->

          <li>
            <a href="<?=$URL;?>dashboard/blog_comments">
              <i class="fa fa-file-pdf-o"></i> <span>comments</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <!-- <li class="header">MAIN NAVIGATION recent_posts</li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
              <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
          </li> -->
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">