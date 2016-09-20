<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painaifun Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include(dirname(__FILE__) . '../../admin_headtag.php'); ?>

    <style type="text/css" media="screen">

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
                $strYear = date("Y", strtotime($strDate)) + 543;
                $strMonth = date("n", strtotime($strDate));
                $strDay = date("j", strtotime($strDate));
                $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                $strMonthThai = $strMonthCut[$strMonth];
                $subYear = substr($strYear, 2);
                return "$strDay $strMonthThai $subYear";
            }

            $reservation_date = DateThai($reservation_show['0']['reservation_date']);

            ?>
            <h1>
                RESERVATION : <?= $reservation_date ?>
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
                        <label for="reservation_name">ชื่อผู้จอง</label>
                        <input type="text" value="" name="reservation_name" id="reservation_name"
                               class="form-control input-sm" required>
                        <label for="reservation_tel">เบอร์โทรศัพท์ ติดต่อ</label>
                        <input type="text" value="" name="reservation_tel" id="reservation_tel"
                               class="form-control input-sm" required>
                        <label for="reservation_guest">จำนวนแขก</label>
                        <input type="number" value="" name="reservation_guest" id="reservation_guest"
                               class="form-control input-sm" min="1" required>
                        <label for="reservation_cost">ราคา</label>
                        <input type="number" value="" name="reservation_cost" id="reservation_cost"
                               class="form-control input-sm" min="0" required>
                        <label for="reservation_agency">เอเจนซี่</label>
                        <select name="reservation_agency" id="reservation_agency" class="form-control input-sm"
                                required>
                            <option value="0">None Agency</option>
                            <option value="1">Agoda</option>
                            <option value="2">Booking</option>
                        </select>
                        <label for="reservation_status">สถานะ</label>
                        <select name="reservation_status" id="reservation_status" class="form-control input-sm"
                                required>
                            <option value="0">ว่าง</option>
                            <option value="1">จอง</option>
                            <option value="2">จ่ายแล้ว</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="saveReservButton" onclick="updateReserv()">
                            SAVE
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <?php

//                    for ($i = 0; $i <= 27; $i++) {
//                        if ($reservation_show[$i]['reservation_agency'] == 0) {
//                            $reservation_agency[$i] = '';
//                        } else if ($reservation_show[$i]['reservation_agency'] == 1) {
//                            $reservation_agency[$i] = 'Agoda';
//                        } else {
//                            $reservation_agency[$i] = 'Booking';
//                        }
//                    }

                    $reservation_room = array('7' => ['7'],
                        '16' => ['19', '18', '17', '16'],
                        '6' => ['6'],
                        '0' => ['3', '2', '1', '0'],
                        '4' => ['5', '4'],
                        '8' => ['8', '9', '10'],
                        '11' => ['11'],
                        '12' => ['12', '13', '14', '15'],
                        '20' => ['27', '26', '25', '24', '23', '22', '21', '20'],
                    );

                    foreach ($reservation_room as $key => $value) { ?>

                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?= $reservation_show[$key]['room_name'] ?></h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <?php foreach ($value as $r) { ?>
                                            <tr onclick="editReserv(<?= $reservation_show[$r]['reservation_room_id'] ?>)"
                                                data-toggle="modal" data-target="#myModal" style="cursor: pointer">
                                                <td>
                                                    <?= '<b>ชื่อ: </b>' . $reservation_show[$r]['reservation_customer_name']; ?>
                                                </td>
                                                <td>
                                                    <?= '<b>โทร: </b>' . $reservation_show[$r]['reservation_tel']; ?>
                                                </td>
                                                <td>
                                                    <?= '<b>แขก: </b>' . $reservation_show[$r]['reservation_guest']; ?>
                                                </td>
                                                <td>
                                                    <?= '<b>ราคา: </b>' . $reservation_show[$r]['reservation_cost']; ?>
                                                </td>
                                                <td>
                                                    <b>เอเจนซี่: </b>
                                                    <?php if ($reservation_show[$r]['reservation_agency'] == 0) {
                                                        echo '-';
                                                    } elseif ($reservation_show[$r]['reservation_agency'] == 1) {
                                                        echo 'Agoda';
                                                    } else {
                                                        echo 'Booking';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if ($reservation_show[$r]['reservation_status'] == 0) {
                                                        echo '<span class="label label-warning">ว่าง</span>';
                                                    } elseif ($reservation_show[$r]['reservation_status'] == 1) {
                                                        echo '<span class="label label-danger">จองแล้ว (ค้างชำระ)</span>';
                                                    } else {
                                                        echo '<span class="label label-success">จ่ายแล้ว</span>';
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

                    <?php } ?>
                </div>

        </section>

    </div>

</div>
<script type="text/javascript">

    var id = 0;

    function editReserv(id) {
        console.log(id);
        $.ajax({
            url: '<?php echo base_url("admin/reservation/'+id+'/edit")?>',
            tpye: 'GET',
            dataType: 'json',
            success: function (result) {
                $("#reservation_name").empty();
                $("#reservation_tel").empty();
                $("#reservation_guest").empty();
                $("#reservation_cost").empty();
                // $("#reservation_agency").empty();

                if (result.success == true) {
                    $("#reservation_room_name").text(result.message.reservation_edit[0].room_name + ' : ' + result.message.reservation_edit[0].room_seq);
                    $("#reservation_name").val(result.message.reservation_edit[0].reservation_customer_name);
                    $("#reservation_tel").val(result.message.reservation_edit[0].reservation_tel);
                    $("#reservation_guest").val(result.message.reservation_edit[0].reservation_guest);
                    $("#reservation_cost").val(result.message.reservation_edit[0].reservation_cost);
                    $("#reservation_agency").val(result.message.reservation_edit[0].reservation_agency);
                    $("#reservation_status").val(result.message.reservation_edit[0].reservation_status);
                    $("#saveReservButton").attr('onclick', 'updateReserv(' + result.message.reservation_edit[0].reservation_room_id + ')');
                } else {
                    alert(result.message);
                }
            },
            error: function () {
                alert('Failed');
            }
        });
    }

    function updateReserv(id) {
        var reservation_name = $("#reservation_name").val();
        var reservation_tel = $("#reservation_tel").val();
        var reservation_guest = $("#reservation_guest").val();
        var reservation_cost = $("#reservation_cost").val();
        var reservation_agency = $("#reservation_agency").val();
        var reservation_status = $("#reservation_status").val();

        $.ajax({
            url: '<?php echo base_url("admin/reservation/update/'+id+'")?>',
            type: 'POST',
            data: {
                reservation_name: reservation_name,
                reservation_tel: reservation_tel,
                reservation_guest: reservation_guest,
                reservation_cost: reservation_cost,
                reservation_agency: reservation_agency,
                reservation_status: reservation_status
            },
            dataType: 'json',
            success: function (result) {
                if (result.success == true) {
                    alert(result.message);
                    window.location.reload();
                } else {
                    alert(result.message);
                }
            },
            error: function (result) {
                alert('Failed');
            }
        });
    }

    var id = "";

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
                error: function (result) {
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
                error: function (result) {
                    alert('Delete Artwork failed!');
                }
            });
        }
    }

</script>
</body>
</html>