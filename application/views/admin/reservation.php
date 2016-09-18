<!DOCTYPE html>
<html>

  <head>
  <?php include('head.php') ?>
  </head>

  <body>
    
    <div class="demo-layout">
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header id="navHeader" class="mdl-layout__header">
          <div class="mdl-layout__header-row">
            <span id="NavTitle" class="mdl-layout-title">Reservation Manangement</span>
            <div id="navTitle2" class="mdl-layout-spacer">
          </div>
  <?php include('logoutnavbar.php') ?>
        </header>
  <?php include('navbar.php') ?>

        <main class="mdl-layout__content">
          <div class="page-content">
            
            <div class="mdl-grid">

              <div id="gridCont" class="mdl-cell mdl-cell--3-col">
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
                          <th class="mdl-data-table__cell--non-numeric">Time</th>
                        </tr>
                      <tbody>
                          <?php
                          $no = 1;
                          foreach ($rs as $r){
                            print "<tr onclick='onResvInfo(this)' id='handCursor'>
                                    <td class='mdl-data-table__cell--non-numeric'><input type='hidden' id='resvId' value='".$r['resv_id']."'>".$r['resv_id']."</td>
                                    <td class='mdl-data-table__cell--non-numeric'>".$r['resv_time']."</td>
                                  </tr>";
                          }
                          $no ++;
                          ?>
                      </tbody>
                    </table>
                </div>
              </div>

              <div id="gridCont" class="mdl-cell mdl-cell--9-col">
                <div id="gridCard" class='mdl-card mdl-shadow--2dp'>
                  <div class='mdl-card__title' >
                    Reservation Description
                  </div>
                  <div class="mdl-card__media">
                    <br>
                  </div>

                  <div id="resvInfo" class="mdl-card__supporting-text">



                  </div>

                </div>
              </div>

          </div>
        </main>

      </div>
    </div>

    <script src="<?php echo base_url();?>resource/assets/materialMdl/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
      function onResvInfo(e){
        var resvId = $(e).find('#resvId').val();
        $.ajax({
            url: '/pnf/reservation_controller/resvInfo',
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
  </body>

</html>
