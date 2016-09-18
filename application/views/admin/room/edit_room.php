<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painaifun Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include(dirname(__FILE__) . '../../admin_headtag.php'); ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css"
          rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
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
                    <form class="form-horizontal" role="form"
                          action="<?= base_url('admin/room/update/' . $room_edit['room_id'] . '') ?>" method="POST"
                          enctype="multipart/form-data" runat="server" id="brandform">
                        <table class="table table-responsive" style="width:100%">
                            <tr>
                                <td><label>Room ID : </label>
                                    <input type="text" name="room_id" id="room_id" class="form-control input-sm"
                                           maxlength="7" value="<?= $room_edit['room_id'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Room Name : </label>
                                    <input type="text" name="room_name" id="room_name" class="form-control input-sm"
                                           value="<?= $room_edit['room_name'] ?>" maxlength="100" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Room Detail : </label>
                                    <textarea name="room_detail" id="room_detail" required
                                              rows="5"><?= $room_edit['room_detail'] ?></textarea>
                                    <script>
                                        $('#room_detail').summernote({
                                            height: 500
                                        });
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Submit" class="btn btn-default pull-right">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Rate</h3>
                    <button id="add_new_rate" onclick="onAddRate()" class="btn btn-success pull-right">New Rate</button>
                </div>
                <div class="box-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Sun-thu</th>
                            <th>Fri-Sat</th>
                            <th>Holiday</th>
                            <th>Breakfast</th>
                            <th>Extra Bed</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody id="rate_list">
                        <?php foreach ($room_rate as $rate) {
                            print'<tr>	
						<td><input type="date" id="rate_fromdate' . $rate['rate_id'] . '" class="form-control input-sm" value="' . $rate['rate_fromdate'] . '"></td>
						<td><input type="date" id="rate_todate' . $rate['rate_id'] . '" class="form-control input-sm" value="' . $rate['rate_todate'] . '"></td>
						<td><input type="number" id="rate_first' . $rate['rate_id'] . '" class="form-control input-sm" value="' . $rate['rate_first'] . '"></td>
						<td><input type="number" id="rate_second' . $rate['rate_id'] . '" class="form-control input-sm" value="' . $rate['rate_second'] . '"></td>
						<td><input type="number" id="rate_holiday' . $rate['rate_id'] . '" class="form-control input-sm" value="' . $rate['rate_holiday'] . '"></td>
						<td><select id="rate_breakfast' . $rate['rate_id'] . '" class="form-control input-sm" value="' . $rate['rate_breakfast'] . '">
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select></td>
						<td><input type="number" id="rate_extrabed' . $rate['rate_id'] . '" class="form-control input-sm" value="' . $rate['rate_extrabed'] . '"></td>
						<td><button onclick="saveRate(' . $rate['rate_id'] . ')" class="btn btn-default">SAVE</button>
							<button onclick="deleteRate(' . $rate['rate_id'] . ')" class="btn btn-default">DELETE</button></td>
					  </tr>';
                        };
                        ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section>

    </div>

</div>
<script type="text/javascript">

    $(document).ready(function () {

    });

    var id = "";
    function onAddRate() {
        var room_id = $("#room_id").val();
        var url = "<?= base_url('admin/room/rate/store') ?>";
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "json",
            data: {room_id: room_id},
            success: function (result) {
                $("#rate_list").empty();
                if (result.success == true) {
                    $.each(result.rate, function (key, value) {

                        $("#rate_list").append('<tr>'
                            + '<td><input type="date" id="rate_fromdate' + value['rate_id'] + '" class="form-control input-sm" value="' + value['rate_fromdate'] + '"></td>'
                            + '<td><input type="date" id="rate_todate' + value['rate_id'] + '" class="form-control input-sm" value="' + value['rate_todate'] + '"></td>'
                            + '<td><input type="number" id="rate_first' + value['rate_id'] + '" class="form-control input-sm" value="' + value['rate_first'] + '"></td>'
                            + '<td><input type="number" id="rate_second' + value['rate_id'] + '" class="form-control input-sm" value="' + value['rate_second'] + '"></td>'
                            + '<td><input type="number" id="rate_holiday' + value['rate_id'] + '" class="form-control input-sm" value="' + value['rate_holiday'] + '"></td>'
                            + '<td><select id="rate_breakfast' + value['rate_id'] + '" class="form-control input-sm" value="' + value['rate_breakfast'] + '">'
                            + '<option value="1">Yes</option>'
                            + '<option value="0">No</option>'
                            + '</select></td>'
                            + '<td><input type="number" id="rate_extrabed' + value['rate_id'] + '" class="form-control input-sm" value="' + value['rate_extrabed'] + '"></td>'
                            + '<td><button onclick="saveRate(' + value['rate_id'] + ')" class="btn btn-default">SAVE</button>'
                            + '<button onclick="deleteRate(' + value['rate_id'] + ')" class="btn btn-default">DELETE</button></td>'
                            + '</tr>');
                    });
                } else {

                }
            }
        });
    }

    function saveRate(id) {
        var rate_fromdate = $("#rate_fromdate" + id + "").val();
        var rate_todate = $("#rate_todate" + id + "").val();
        var rate_first = $("#rate_first" + id + "").val();
        var rate_second = $("#rate_second" + id + "").val();
        var rate_holiday = $("#rate_holiday" + id + "").val();
        var rate_breakfast = $("#rate_breakfast" + id + "").val();
        var rate_extrabed = $("#rate_extrabed" + id + "").val();
        var url = "<?= base_url('admin/room/rate/update/"+id+"') ?>";
        var confirm = window.confirm('Are you sure to save?');
        if (confirm == true) {
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
                success: function (result) {
                    if (result.success == true) {
                        alert(result.message);
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    alert('Save Artwork failed!');
                }
            });
        }
    }

    function deleteRate(id) {
        var url = "<?= base_url('admin/room/rate/delete/"+id+"') ?>";
        var confirm = window.confirm('Are you sure to delete?');
        if (confirm == true) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (result) {
                    if (result.success == true) {
                        alert(result.message);
                        window.location.reload();
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    alert('Delete Artwork failed!');
                }
            });
        }
    }

</script>
</body>
</html>