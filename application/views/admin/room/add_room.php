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
            ROOM
        </h1>
    </section>

<section class="content">
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Room Description</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
	<form class="form-horizontal" role="form" action="store" method="POST" enctype="multipart/form-data" runat="server" id="brandform">
   <table class="table table-responsive" style="width:100%">
		<tr>
			<td><label>Room ID : </label>
				<input type="text" name="room_id" id="room_id" class="form-control input-sm" maxlength="7" disabled>
			</td>
		</tr>
		<tr>
			<td><label>Room Name : </label>
				<input type="text" name="room_name" id="room_name" class="form-control input-sm" maxlength="100" required>
			</td>
		</tr>
		<tr>
			<td><label>Room Detail : </label>
				<textarea name="room_detail" id="room_detail" class="form-control input-sm" maxlength="100" required></textarea>
			</td>
		</tr>
<!-- 		<tr>
			<td><label>Status : </label><br>
				<label class="radio-inline"><input type="radio" name="brand_status" id="brand_status" value="1" required>Active</label>
				<label class="radio-inline"><input type="radio" name="brand_status" id="brand_status" value="0" required checked>Inactive</label>
			</td>
		</tr> -->
		<tr>
			<td>
				<input type="reset" value="Reset" class="btn btn-default pull-right">
				<input type="submit" value="Submit" class="btn btn-default pull-right">
			</td>
		</tr>

	</table>
	</form>
  </div><!-- /.box-body -->
</div><!-- /.box -->
</section>

</div>
    
</div>
</body>
</html>