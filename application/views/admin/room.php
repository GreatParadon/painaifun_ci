<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painaifun Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include('admin_headtag.php');?>
</head>
<body class="skin-green">
<div class="wrapper">

    <!-- Header -->
    <?php include('admin_header.php'); ?>

    <!-- Sidebar -->
    <?php include('admin_sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ROOM
        </h1>
    </section>

<section class="content">
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Room List</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Room Name</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($room_select as $r) {
                        // if($r["brand_status"] == 1){
                        //     $brand_status = "Active";
                        // }else{
                        //     $brand_status = "In-Active";
                        // }

                        // $img_path = asset('upload').'/brand_logo/'.$r["brand_logo"]; 
                        // $editpath = url('admin/room/edit/'.$r["room_id"].'');
                     print '<tr>
                            <td>' . $r["room_id"] . '</td>
                            <td>' . $r["room_name"]  . '</td>
                            <td><button onclick="deleteRoom(' . $r["room_id"] . ')" class="btn btn-default">DELETE</button></td>
                            </tr>';
                        }
                ?>
                </tbody>
            </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
</section>
<script type="text/javascript">
    var id = "";

    function deleteRoom(id){
        var confirm = window.confirm('Are you sure to delete?');
        if(confirm == true){
            $.ajax({
                url: "<?php echo url('admin/room/delete/"+id+"')?>",
                type: "GET",
                success: function(result){
                    alert('Delete success');
                    window.location.reload();
                },
                error: function(result){
                    alert('Delete failed');
            }});
        }
    }
</script>

</div>
    
</div>
</body>
</html>