<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painaifun Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include(dirname(__FILE__) . '../../admin_headtag.php');?>
    <style type="text/css" media="screen">
    	.reserv-box-border{
    		/*border-style: solid;*/
    		/*border-width: 1px;*/
    		/*width: 100px;*/
    		height: 100%;
    		padding: 2px;
    	}

    	.content-box-border{
    		padding: 5px;
    		border-style: solid;
    		border-width: 1px;
    		height: 100%;
    	}

    	.center-text{
		    text-align: center;
    	}

    	.content-box-border:hover{
			cursor: pointer;
			background-color: #ECEFF1;
    	}

    	.bamboo{
    		width: 12.5%;
    		height: 100%;
    		padding: 2px;
    	}
    </style>
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

    $reservation_date = DateThai($reservation_show['0']['reservation_date']);
?>
        <h1>
            RESERVATION : <?= $reservation_date?>
        </h1>
    </section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="reservation_room_name"></h4>
      </div>
      <div class="modal-body">
      	<label for="reservation_name">Name</label>
        <input type="text" value="" name="reservation_name" id="reservation_name" class="form-control input-sm" required>
        <label for="reservation_tel">Telephone Number</label>
        <input type="text" value="" name="reservation_tel" id="reservation_tel" class="form-control input-sm" required>
        <label for="reservation_guest">Guest</label>
        <input type="number" value="" name="reservation_guest" id="reservation_guest" class="form-control input-sm" min="1" required>
        <label for="reservation_cost">Cost</label>
        <input type="number" value="" name="reservation_cost" id="reservation_cost" class="form-control input-sm" min="0" required>
        <label for="reservation_agency">Agency</label>
        <select name="reservation_agency" id="reservation_agency" class="form-control input-sm" required>
        	<option value="0">None Agency</option>
        	<option value="1">Agoda</option>
        	<option value="2">Booking</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="saveReservButton" onclick="updateReserv()">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	var id = 0 ;
	function editReserv(id){
		$.ajax({
			url: '<?php echo base_url("admin/reservation/'+id+'/edit")?>',
			tpye: 'GET',
			dataType: 'json',
			success: function(result){
				$("#reservation_name").empty();
				$("#reservation_tel").empty();
				$("#reservation_guest").empty();
				$("#reservation_cost").empty();
				// $("#reservation_agency").empty();

				if(result.success == true){
					$("#reservation_room_name").text(result.message.reservation_edit[0].room_name+' : '+result.message.reservation_edit[0].room_seq);
					$("#reservation_name").val(result.message.reservation_edit[0].reservation_customer_name);
					$("#reservation_tel").val(result.message.reservation_edit[0].reservation_tel);
					$("#reservation_guest").val(result.message.reservation_edit[0].reservation_guest);
					$("#reservation_cost").val(result.message.reservation_edit[0].reservation_cost);
					$("#reservation_agency").val(result.message.reservation_edit[0].reservation_agency);
					$("#saveReservButton").attr('onclick', 'updateReserv('+result.message.reservation_edit[0].reservation_room_id+')');
				}else{
					alert(result.message);
				}
			},
			error: function(result){
				alert('Failed');
			}
		});
	}

	function updateReserv(id){
		var reservation_name = $("#reservation_name").val();
		var reservation_tel = $("#reservation_tel").val();
		var reservation_guest = $("#reservation_guest").val();
		var reservation_cost = $("#reservation_cost").val();
		var reservation_agency = $("#reservation_agency").val();

		$.ajax({
			url: '<?php echo base_url("admin/reservation/update/'+id+'")?>',
			type: 'POST',
			data:{
				reservation_name: reservation_name,
				reservation_tel: reservation_tel,
				reservation_guest: reservation_guest,
				reservation_cost: reservation_cost,
				reservation_agency: reservation_agency
			},
			dataType: 'json',
			success: function(result){
				if(result.success == true){
					alert(result.message);
					window.location.reload();
				}else{
					alert(result.message);
				}
			},
			error: function(result){
				alert('Failed');
			}
		});
	}
</script>
<?php 
	for($i = 0; $i <= 27; $i++){
		if($reservation_show[$i]['reservation_agency'] == 0){
			$reservation_agency[$i] = '';
		}else if($reservation_show[$i]['reservation_agency'] == 1){
			$reservation_agency[$i] = 'Agoda';
		}else{
			$reservation_agency[$i] = 'Booking'; 
		}
	}

?>
<section class="content">
<div class="container-fluid">
  	<div class="row">

  		<div class="col-md-4">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['7']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['7']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['7']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['7']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['7']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['7']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['7'];
						?>
					</div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>

		 <div class="col-md-8">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['16']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
				<div class="col-md-3 reserv-box-border">		
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['19']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['19']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['19']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['19']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['19']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['19'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-3 reserv-box-border">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['18']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['18']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['18']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['18']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['18']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['18'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-3 reserv-box-border">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['17']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['17']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['17']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['17']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['17']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['17'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-3 reserv-box-border">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['16']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['16']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['16']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['16']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['16']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['16'];
						?>
				  	</div>
				  </div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['6']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['6']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['6']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['6']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['6']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['6']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['6'];
						?>
					</div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>

		 <div class="col-md-8">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['0']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
				<div class="col-md-3 reserv-box-border">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['3']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['3']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['3']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['3']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['3']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['3'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-3 reserv-box-border">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['2']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['2']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['2']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['2']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['2']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['2'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-3 reserv-box-border">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['1']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['1']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['1']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['1']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['1']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['1'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-3 reserv-box-border">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['0']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['0']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['0']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['0']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['0']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['0'];
						?>
				  	</div>
				  </div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['4']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	<div class="col-md-6 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['5']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['5']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['5']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['5']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['5']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['5'];
						?>
					</div>
				</div>
			  	<div class="col-md-6 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['4']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['4']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['4']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['4']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['4']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['4'];
						?>
					</div>
				</div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
		<div class="col-md-8">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['8']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	<div class="col-md-4 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['8']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['8']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['8']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['8']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['8']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['8'];
						?>
					</div>
				</div>
			  	<div class="col-md-4 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['9']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['9']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['9']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['9']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['9']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['9'];
						?>
					</div>
				</div>
				<div class="col-md-4 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['10']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['10']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['10']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['10']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['10']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['10'];
						?>
					</div>
				</div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['11']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	<div class="col-md-12 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['11']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['11']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['11']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['11']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['11']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['11'];
						?>
					</div>
				</div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
		<div class="col-md-8">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['12']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	<div class="col-md-3 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['12']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['12']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['12']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['12']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['12']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['12'];
						?>
					</div>
				</div>
			  	<div class="col-md-3 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['13']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['13']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['13']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['13']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['13']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['13'];
						?>
					</div>
				</div>
				<div class="col-md-3 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['14']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['14']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['14']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['14']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['14']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['14'];
						?>
					</div>
				</div>
				<div class="col-md-3 reserv-box-border">
					<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['15']['reservation_room_id'] ?>)">
						<?php
							echo '<b>Name: </b>'.$reservation_show['15']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['15']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['15']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['15']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['15'];
						?>
					</div>
				</div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-success">
			  <div class="box-header with-border">
			    <h3 class="box-title"><?= $reservation_show['20']['room_name']?></h3>
			  </div><!-- /.box-header -->
			  <div class="box-body">
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['27']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['27']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['27']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['27']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['27']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['27'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['26']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['26']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['26']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['26']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['26']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['26'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['25']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['25']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['25']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['25']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['25']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['25'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['24']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['24']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['24']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['24']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['24']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['24'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['23']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['23']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['23']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['23']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['23']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['23'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['22']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['22']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['22']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['22']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['22']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['22'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['21']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['21']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['21']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['21']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['21']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['21'];
						?>
				  	</div>
				  </div>
				  <div class="col-md-1 bamboo">
				  	<div class="content-box-border" data-toggle="modal" data-target="#myModal" onclick="editReserv(<?= $reservation_show['20']['reservation_room_id'] ?>)">
				  		<?php 
							echo '<b>Name: </b>'.$reservation_show['20']['reservation_customer_name'].'<br>';
							echo '<b>Tel: </b>'.$reservation_show['20']['reservation_tel'].'<br>';
							echo '<b>Guest: </b>'.$reservation_show['20']['reservation_guest'].'<br>';
							echo '<b>Cost: </b>'.$reservation_show['20']['reservation_cost'].'<br>';
							echo '<b>Agency: </b>'.$reservation_agency['20'];
						?>
				  	</div>
				  </div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

</div>

</section>

</div>
    
</div>
<script type="text/javascript">
	var id = "";

	function saveRate(id){
		var rate_fromdate = $("#rate_fromdate"+id+"").val();
		var rate_todate = $("#rate_todate"+id+"").val();
		var rate_first = $("#rate_first"+id+"").val();
		var rate_second = $("#rate_second"+id+"").val();
		var rate_holiday = $("#rate_holiday"+id+"").val();
		var rate_breakfast = $("#rate_breakfast"+id+"").val();
		var rate_extrabed = $("#rate_extrabed"+id+"").val();
		var url = "<?= base_url('admin/room/rate/update/"+id+"') ?>";
		var confirm = window.confirm('Are you sure to save?');
		if(confirm == true){
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: {
						rate_fromdate: rate_fromdate,
						rate_todate: rate_todate,
						rate_first: rate_first,
						rate_second: rate_second,
						rate_holiday: rate_holiday,
						rate_breakfast: rate_breakfast,
						rate_extrabed: rate_extrabed
						},
				success: function(result){
					if(result.success == true){
						alert(result.message);
					}else{
						alert(result.message);
					}
				},
				error: function(result){
					alert('Save Artwork failed!');
				}
			});
		}
	}

	function deleteRate(id){
		var url = "<?= base_url('admin/room/rate/delete/"+id+"') ?>";
		var confirm = window.confirm('Are you sure to delete?');
		if(confirm == true){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				success: function(result){
					if(result.success == true){
						alert(result.message);
						window.location.reload();
					}else{
						alert(result.message);
					}
				},
				error: function(result){
					alert('Delete Artwork failed!');
				}
			});
		}
	}

</script>
</body>
</html>