<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painaifun Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include(dirname(__FILE__) . '../../admin_headtag.php');?>
</head>
<body class="skin-green">
<div class="wrapper">

    <!-- Header -->
    <?php include(dirname(__FILE__) . '../../admin_header.php'); ?>

    <!-- Sidebar -->
    <?php include(dirname(__FILE__) . '../../admin_sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            RESERVATION
            <a href="" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">Add Reservation Date</a>
        </h1>
    </section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="reservation_room_name"></h4>
      </div>
      <div class="modal-body">
        <label for="reservation_date">Date</label>
        <input type="date" value="" name="reservation_date" id="reservation_date" class="form-control input-sm" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="saveReservButton" onclick="onAddReservation()">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<section class="content">
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Reservation List</h3>
<!--     <button id="add_new_reservation" onclick="onAddReservation()" class="btn btn-success pull-right" style="margin-left:5px">New Reservation</button>
<input type="date" class="form-control input-sm pull-right" id="reservation_date" style="width:150px"> -->
  </div><!-- /.box-header -->
  <div class="box-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Reservation Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                    function DateThai($strDate)
                    {
                      $strYear = date("Y",strtotime($strDate))+543;
                      $strMonth= date("n",strtotime($strDate));
                      $strDay= date("j",strtotime($strDate));
                      $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                      $strMonthThai=$strMonthCut[$strMonth];
                      $subYear = substr($strYear, 2);
                      return "$strDay $strMonthThai $subYear";
                    }

                    foreach ($reservation_select as $r) {
                        $editpath = base_url('admin/reservation/'.$r["reservation_id"].'');
                        print '<tr>
                            <td>' . $r["reservation_id"] . '</td>
                            <td>' . DateThai($r["reservation_date"])  . '</td>
                            <td><a href="'.$editpath.'" class="btn btn-default">EDIT</a>
                            <button onclick="deleteReservation(' . $r["reservation_id"] . ')" class="btn btn-default">DELETE</button></td>
                            </tr>';
                    }
                ?>
                </tbody>
            </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
</section>
<script type="text/javascript">
    function onAddReservation(){
        var url = "<?= base_url('admin/reservation/store') ?>";
        var reservation_date = $("#reservation_date").val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {reservation_date: reservation_date},
            success: function(result){
                if(result.success == true){
                    window.location.reload();
                }else{
                    alert('Something went wrong!');
                }
            },
            error: function(){
                alert('Something went wrong!');
            }
        });
        
    }

    var id = "";

    function deleteReservation(id){
        var url = "<?= base_url('admin/reservation/delete/"+id+"') ?>";
        var confirm = window.confirm('Are you sure to delete?');
        if(confirm == true){
            $.ajax({
                url: url,
                type: "GET",
                success: function(result){
                    alert('Delete success');
                    window.location.reload();
                },
                error: function(){
                    alert('Delete failed');
            }});
        }
    }
</script>

</div>
    
</div>
</body>
</html>