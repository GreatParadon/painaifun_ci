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
    
    <div class="demo-layout">
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header id="navHeader" class="mdl-layout__header">
          <div class="mdl-layout__header-row">
            <span id="NavTitle" class="mdl-layout-title">Reservation Manangement</span>
            <div id="navTitle2" class="mdl-layout-spacer">
          </div>
           <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
              <li class="mdl-menu__item"><a href="pnfAuth">Logout</a></li>
            </ul>
        </header>
        <div id="sideBar" class="mdl-layout__drawer">
          <span id="sideImg" class="mdl-layout-title"><img src="<?php echo base_url();?>resource/img/pnf_logo3.png"></span>
          <nav id="sideMenu" class="mdl-navigation">
            <a class="mdl-navigation__link" href="pnfManagement">Home</a>
            <a class="mdl-navigation__link" href="pnfRoom">Room</a>
            <a class="mdl-navigation__link" href="pnfCheckIn">Check-In</a>
            <a class="mdl-navigation__link" href="pnfCus">Customer</a>
            <a class="mdl-navigation__link" href="pnfStock">Stock</a>
          </nav>
        </div>

        <main class="mdl-layout__content">
          <div class="page-content">
            
            <div class="mdl-grid">

              <div id="gridCont" class="mdl-cell mdl-cell--5-col">
                <div id="gridCard" class='mdl-card mdl-shadow--2dp'>
                  <div class='mdl-card__title' >
                    Reservation Lists
                  </div>
                  <div class="mdl-card__media">
                    <br>
                  </div>
                    <table id="resvTable" class="mdl-card__supporting-text mdl-data-table mdl-js-data-table">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric">Reservation ID</th>
                          <th class="mdl-data-table__cell--non-numeric">Customer Name</th>
                          <th class="mdl-data-table__cell--non-numeric">Time</th>
                        </tr>
                      <tbody>
                          <?php
                          $no = 1;
                          foreach ($rs as $r){
                            print "<tr onclick='onResvInfo(this)' id='handCursor'>
                                    <td class='mdl-data-table__cell--non-numeric'><input type='hidden' id='resvId' value='".$r['resv_id']."'>".$r['resv_id']."</td>
                                    <td class='mdl-data-table__cell--non-numeric'>".$r['customer_id']."</td>
                                    <td class='mdl-data-table__cell--non-numeric'>".$r['resv_time']."</td>
                                  </tr>";
                          }
                          $no ++;
                          ?>
                      </tbody>
                    </table>
                </div>
              </div>

              <div id="gridCont" class="mdl-cell mdl-cell--7-col">
                <div id="gridCard" class='mdl-card mdl-shadow--2dp'>
                  <div class='mdl-card__title' >
                    Reservation Description
                  </div>
                  <div class="mdl-card__media">
                    <br>
                  </div>

                  <div id="resvInfo" class="mdl-card__supporting-text">

                        <div id="resvDes" class="mdl-card">
                          <div id="resvTitle" class="mdl-card__title">
                          Information
                          </div>
                          <div class="mdl-card__supporting-text">
                          <script>
                            function onResvInfo(e){
                              var resvId = $(e).find('#resvId').val();
                              $.ajax({
                                  url: 'resvInfo',
                                  type: 'POST',
                                  data: {
                                      resvId: resvId
                                  }
                              }).success(function(result) {
                                  var obj = jQuery.parseJSON(result);
                                  $.each(obj, function(key, val) {
                                      $("#resv_id").val(val['resv_id']);
                                      $("#room_id").val(val['room_id']);
                                      $("#customer_id").val(val['customer_id']);
                                      $("#resv_time").val(val['resv_time']);
                                      $("#resv_numPerson").val(val['resv_numPerson']);
                                      $("#resv_totalCost").val(val['resv_totalCost']);
                                      $("#resv_crTime").val(val['resv_crTime']);
                                      $("#resv_stat").val(val['resv_stat']);
                                  });
                              });
                            }
                          </script>
                            <table>
                              <form method='POST' action='editResvInfo'>
                              <tr>
                                <td>Reservation ID : </td>
                                <td><input type="text" id='resv_id' disabled></td>
                              </tr>
                              <tr>
                                <td>Room ID : </td>
                                <td><input type="text" id='room_id'></td>
                              </tr>
                              <tr>
                                <td>Customer ID : </td>
                                <td><input type="text" id='customer_id'></td>
                              </tr>
                              <tr>
                                <td>Reservation Time : </td>
                                <td><input type="text" id='resv_time'></td>
                              </tr>
                              <tr>
                                <td>Number of Person : </td>
                                <td><input type="text" id='resv_numPerson'></td>
                              </tr>
                               <tr>
                                <td>Service Cost : </td>
                                <td><input type="text" id='resv_totalCost'></td>
                              </tr>
                               <tr>
                                <td>Create Time : </td>
                                <td><input type="text" id='resv_crTime'></td>
                              </tr>
                               <tr>
                                <td>Status : </td>
                                <td><input type="text" id='resv_stat'></td>
                              </tr>
                            </form>
                          </table>
                          </div>
                        </div>
                        <br>
                        <div id="resvDes" class="mdl-card">
                          <div id="resvTitle" class="mdl-card__title">
                          Receipt Evidence
                          </div>
                          <div class="mdl-card__supporting-text">
                          <img src="<?php echo base_url();?>resource/img/">
                          </div>
                        </div>

                  </div>

                </div>
              </div>

          </div>
        </main>

      </div>
    </div>

    <script src="<?php echo base_url();?>resource/materialMdl/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  </body>

</html>
