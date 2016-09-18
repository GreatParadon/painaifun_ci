<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PNF Admin</title>

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>resource/materialMdl/material.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resource/my_styles.css">

  </head>

  <body>
    
          <!-- Always shows a header, even in smaller screens. -->
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

        <header id="navHeader" class="mdl-layout__header">
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Painaifun Managment</span>

            <div id="navTitle2" class="mdl-layout-spacer"></div>
             <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                <i class="material-icons">more_vert</i>
              </button>
              <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <li class="mdl-menu__item"><a href="pnfAuth">Logout</a></li>
              </ul>
          </div>
        </header>

          <div id="sideBar" class="mdl-layout__drawer">
            <span id="sideImg" class="mdl-layout-title"><img src="<?php echo base_url();?>resource/img/pnf_logo3.png"></span>
            <nav id="sideMenu" class="mdl-navigation">
            <a class="mdl-navigation__link" href="pnfManagement">Home</a>
            <a class="mdl-navigation__link" href="pnfRoom">Room</a>
            <a class="mdl-navigation__link" href="pnfRoom">Reservation</a>    
            <a class="mdl-navigation__link" href="pnfCheckIn">Check-In</a>
            <a class="mdl-navigation__link" href="pnfCus">Customer</a>
            <a class="mdl-navigation__link" href="pnfStock">Stock</a>
            </nav>
          </div>

        <main class="mdl-layout__content">
          <div class="page-content">
            
            <div class="demo-grid-1 mdl-grid">
              <div id="manageCell" class="mdl-cell mdl-cell--4-col">
                  <div id="manageCard" class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                      <h2 class="mdl-card__title-text">Room</h2>
                    </div>
                    <!-- <div class="mdl-card__supporting-text">
                      Add Description
                    </div> -->
                    <div class="mdl-card__actions mdl-card--border">
                      <a href='pnfRoom' class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Manage
                      </a>
                    </div>
                  </div>
              </div>
              <div id="manageCell" class="mdl-cell mdl-cell--4-col">
                  <div id="manageCard" class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                      <h2 class="mdl-card__title-text">Reservation</h2>
                    </div>
                    <!-- <div class="mdl-card__supporting-text">
                      Add Description
                    </div> -->
                    <div class="mdl-card__actions mdl-card--border">
                      <a href="pnfResv" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Manage
                      </a>
                    </div>
                  </div>

              </div>
              <div id="manageCell" class="mdl-cell mdl-cell--4-col">
                  <div id="manageCard" class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                      <h2 class="mdl-card__title-text">Check-In</h2>
                    </div>
                    <!-- <div class="mdl-card__supporting-text">
                      Add Description
                    </div> -->
                    <div class="mdl-card__actions mdl-card--border">
                      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Manage
                      </a>
                    </div>
                  </div>
              </div>
              <div id="manageCell" class="mdl-cell mdl-cell--4-col">
                  <div id="manageCard" class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                      <h2 class="mdl-card__title-text">Customer</h2>
                    </div>
                    <!-- <div class="mdl-card__supporting-text">
                      Add Description
                    </div> -->
                    <div class="mdl-card__actions mdl-card--border">
                      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Manage
                      </a>
                    </div>
                  </div>
              </div>
              <div id="manageCell" class="mdl-cell mdl-cell--4-col">
                  <div id="manageCard" class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                      <h2 class="mdl-card__title-text">Stock</h2>
                    </div>
                    <!-- <div class="mdl-card__supporting-text">
                      Add Description
                    </div> -->
                    <div class="mdl-card__actions mdl-card--border">
                      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Manage
                      </a>
                    </div>
                  </div>
              </div>            

            </div>

          </div>
        </main>

      </div>

    <script src="<?php echo base_url();?>resource/materialMdl/material.min.js"></script>

  </body>

</html>
