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
          <span id='NavTitle' class="mdl-layout-title">Room Manangement</span>            
          <div id="navTitle2" class="mdl-layout-spacer">
          </div>

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
            <a class="mdl-navigation__link" href="pnfResv">Reservation</a>
            <a class="mdl-navigation__link" href="pnfCheckIn">Check-In</a>
            <a class="mdl-navigation__link" href="pnfCus">Customer</a>
            <a class="mdl-navigation__link" href="pnfStock">Stock</a>
          </nav>
        </div>
        <main class="mdl-layout__content">
          <div class="page-content">

            <div class="mdl-grid">

              <div id="gridCont" class="mdl-cell mdl-cell--4-col">
                <div id="gridCard" class='mdl-card mdl-shadow--2dp'>
                  <div class='mdl-card__title' >
                    Room Lists
                  </div>
                  <div class="mdl-card__media">
                    <br>
                  </div>

                    <table id="roomTable" class="mdl-card__supporting-text mdl-data-table mdl-js-data-table mdl-shadow--1dp">
                      <thead>
                        <tr>
                          <th class='mdl-data-table__cell--non-numeric'>Name</th>
                          <th class='mdl-data-table__cell--non-numeric'>Type</th>
                        </tr>
                      </thead>
                      <tbody id="room_list">
                      </tbody>
                    </table>
                </div>
              </div>

              <div id="gridCont" class="mdl-cell mdl-cell--8-col">
                <div id="gridCard" class='mdl-card mdl-shadow--2dp'>
                  <div class='mdl-card__title' >
                    Room Description
                  </div>
                  <div class="mdl-card__media">
                    <br>
                  </div>

                  <div id="resvInfo" class="mdl-card__supporting-text">

                    <div id="resvDes" class="mdl-card">
                      <div id="resvTitle" class="mdl-card__title">
                        Room Information
                      </div>
                      <div class="mdl-card__supporting-text">

                        <div class="mdl-grid">
                          <div class="mdl-cell mdl-cell--6-col" id='roomInfo'>

                              <table>
                                <tr>
                                  <td>Name : </td>
                                  <td><input type="text" id='room_name'><input type="hidden" id='room_id' disabled></td>
                                </tr>
                                <tr>
                                  <td>Type : </td>
                                  <td><input type="text" id='room_type'></td>
                                </tr>
                                <tr>
                                  <td>Cost : </td>
                                  <td><input type="text" id='room_cost'></td>
                                </tr>
                                <tr>
                                  <td>Capacity : </td>
                                  <td><input type="text" id='room_capacity'></td>
                                </tr>
                                <tr>
                                  <td>Status : </td>
                                  <td><input type="text" id='room_stat'></td>
                                </tr>
                              </table>
                            </div>

                            <div class="mdl-cell mdl-cell--6-col">
                              Information :<br>
                              <textarea id='room_info'></textarea>
                              <button onclick="onInsertRoom()">Insert</button>
                              <button onclick="onUpdateRoom()">Update</button>
                              <button onclick="onDeleteRoom()">Delete</button>                        
                            </div>
                        </div>

                      </div>
                    </div>

                    <br>

                    <div id="resvDes" class="mdl-card">
                      <div id="resvTitle" class="mdl-card__title">
                        Sub-Room<button id="addSubRoom" onclick="onAddSubRoom()">Add</button>
                      </div>
                      <div class="mdl-card__supporting-text">
                        <table id="roomTable" class="mdl-card__supporting-text mdl-data-table mdl-js-data-table mdl-shadow--1dp">
                      <thead>
                        <tr>
                          <th class='mdl-data-table__cell--non-numeric'>ID</th>
                          <th class='mdl-data-table__cell--non-numeric'>Delete</th>
                        </tr>
                      </thead>
                      <tbody id="subRoomList">

                      </tbody>
                    </table>
                      </div>
                    </div>

                    <br>

                    <div id="resvDes" class="mdl-card">
                      <div id="resvTitle" class="mdl-card__title">
                        Room Gallery<div id="div_img"><input id="imgpath" type="text" placeholder='image path'><button onclick="onAddImage()">Add</button></div>
                      </div>
                      <div class="mdl-card__supporting-text">
                        <ul id='imgPathList'>
                          
                        </ul>
                        <!-- <img src="<?php echo base_url();?>resource/img/"> -->
                      </div>
                    </div>

                  </div>

                </div>
              </div>

            </div>
          </main>
        </div>
      </div>

  <script type="text/javascript" src="<?php echo base_url();?>resource/materialMdl/material.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        onRoomList();
    })

    function onRoomList(){
      $("#room_list").empty();
      $.ajax({
              url: 'roomList',
              type: 'GET',
              async: false,
              dataType: 'json'
              ,success: function(result) {
                $.each(result, function(key,val){
                  $("#room_list").append('<tr onclick="onRoomInfo(this)" id="handCursor"><input type="hidden" id="roomId" value="'+val['room_id']+'" disabled><td class="mdl-data-table__cell--non-numeric">'+val['room_name']+'</td><td class="mdl-data-table__cell--non-numeric">'+val['room_type']+'</td></tr>');
                });
      }});
    }

    function onRoomInfo(e){
          var roomId = $(e).find('#roomId').val();
            $.ajax({
              url: 'roomInfo',
              type: 'GET',
              async: false,
              dataType: 'json',
              data: {
              roomId: roomId
              },success:function(result) {
                $("#room_id").val(result[0].room_id);
                $("#room_name").val(result[0].room_name);
                $("#room_info").val(result[0].room_info);
                $("#room_type").val(result[0].room_type);
                $("#room_cost").val(result[0].room_cost);
                $("#room_capacity").val(result[0].room_capacity);
                $("#room_stat").val(result[0].room_stat);
                onSubRoom(roomId);
                onShowImgPath(roomId);
            }});
    }

    function onRoomInfoRefresh(roomId){
            $.ajax({
              url: 'roomInfo',
              type: 'GET',
              async: false,
              dataType: 'json',
              data: {
              roomId: roomId
              },success:function(result) {
                $("#room_id").val(result[0].room_id);
                $("#room_name").val(result[0].room_name);
                $("#room_info").val(result[0].room_info);
                $("#room_type").val(result[0].room_type);
                $("#room_cost").val(result[0].room_cost);
                $("#room_capacity").val(result[0].room_capacity);
                $("#room_stat").val(result[0].room_stat);
                onRoomList();
                onSubRoom(roomId);
                onShowImgPath(roomId);
            }});
    }

    function onSubRoom(roomId){
            $('#subRoomList').empty();
            $.ajax({
              url: 'subRoomInfo',
              type: 'GET',
              async: false,
              dataType: 'json',
              data: {
              subRoomId: roomId
              }}).success(function(result) {
                $.each(result, function(key, val) {
                $("#subRoomList").append('<td class="mdl-data-table__cell--non-numeric" >'+val['subRoom_id']+'</td><td class="mdl-data-table__cell--non-numeric"><button onclick="onDeleteSubRoom(this)">Delete<input type="hidden" id="subRoomId" value="'+val['subRoom_id']+'" disabled></button></td>');
              });
            });
    }

    function onShowImgPath(roomId){
            $('#imgPathList').empty();
            $.ajax({
              url: 'imageList',
              type: 'GET',
              async: false,
              dataType: 'json',
              data: {
              roomId: roomId
              }}).success(function(result) {
                $.each(result, function(key, val) {
                $("#imgPathList").append('<li>'+val['image_path']+'</li>');
              });
            });
    }

    function onAddSubRoom(){
            var roomId = $("#room_id").val();
            $.ajax({
              url: "addSubRoom",
              type: 'POST',
              data: {InsRoomId: roomId}
            });
            setTimeout(function(){
              onRoomInfoRefresh(roomId);
            },200)
    }

    function onDeleteSubRoom(e){
            var subRoomId = $(e).find('#subRoomId').val();
            var roomId = $("#room_id").val();
            $.ajax({
              url: "deleteSubRoom",
              type: 'POST',
              data: {delRoomId: subRoomId}
            });
            setTimeout(function(){
              onRoomInfoRefresh(roomId);
            },200)
    }

    function onInsertRoom(){
              var roomId = $("#room_id").val();
              var roomName = $("#room_name").val();
              var roomInfo = $("#room_info").val();
              var roomType = $("#room_type").val();
              var roomCost = $("#room_cost").val();
              var roomCapa = $("#room_capacity").val();
              var roomStat = $("#room_stat").val();
              
              $.ajax({
                url: 'insertRoom',
                type: 'POST',
                async: false,
                dataType: 'json',
                data: {
                  roomName: roomName,
                  roomInfo: roomInfo,
                  roomType: roomType,
                  roomCost: roomCost,
                  roomCapa: roomCapa,
                  roomStat: roomStat
                },success: function(result) {
                alert('Insert Success');
                roomId = result[0].room_id;
                onRoomInfoRefresh(roomId);
                },error: function() {
                  alert('Failed');
                }});
    }

    function onUpdateRoom(){
              var roomId = $("#room_id").val();
              var roomName = $("#room_name").val();
              var roomInfo = $("#room_info").val();
              var roomType = $("#room_type").val();
              var roomCost = $("#room_cost").val();
              var roomCapa = $("#room_capacity").val();
              var roomStat = $("#room_stat").val();

              $.ajax({
                url: 'updateRoom',
                type: 'POST',
                async: false,
                dataType: 'json',
                data: {
                  roomId: roomId,
                  roomName: roomName,
                  roomInfo: roomInfo,
                  roomType: roomType,
                  roomCost: roomCost,
                  roomCapa: roomCapa,
                  roomStat: roomStat
                },success: function(result) {
                    alert('Update Success');
                    roomId = result[0].room_id;
                    onRoomInfoRefresh(roomId);
                },error: function(result){
                  alert('Failed');
                }
              });
    }

    function onDeleteRoom(){
          var r = window.confirm('Do you want to delete this room?');
            if(r == true){
            var roomId = $('#room_id').val();
              $.ajax({
                url: 'deleteRoom',
                type: 'POST',
                async: false,
                dataType: 'json',
                data: {
                roomId: roomId
                }
                }).success(function(result) {
                  alert('Delete Success');
                  onRoomList();
              });
            }
            
    }

    function onAddImage(){
      var roomId = $('#room_id').val();
      var imgpath = $('#imgpath').val();

      if(!roomId){
        alert('Please Select Room');
      }else{
        $.ajax({
          url: 'addImage',
          type: 'POST',
          async: false,
          dataType: 'json',
          data: {
            roomId: roomId,
            imgpath: imgpath
          },
          success: function(result){
            onRoomInfoRefresh(roomId);
            alert('Success');
          },
          error: function(result) {
            alert('Failed');
          }
        });
      }
    }


  </script>
</body>
</html>