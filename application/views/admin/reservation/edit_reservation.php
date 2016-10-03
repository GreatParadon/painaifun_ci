<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painaifun Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include(dirname(__FILE__) . '../../admin_headtag.php'); ?>

    <style type="text/css" media="screen">
        textarea {
            resize: vertical;
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
                        <label for="reservation_email">อีเมลล์</label>
                        <input type="email" value="" name="reservation_email" id="reservation_email"
                               class="form-control input-sm" required>
                        <label for="reservation_tel">เบอร์โทรศัพท์ ติดต่อ</label>
                        <input type="text" value="" name="reservation_tel" id="reservation_tel"
                               class="form-control input-sm" required>
                        <label for="reservation_guest">จำนวนผู้ใหญ่</label>
                        <input type="number" value="" name="reservation_guest" id="reservation_guest"
                               class="form-control input-sm" min="0" required>
                        <label for="reservation_child">จำนวนเด็ก(ต่ำกว่า10ขวบ)</label>
                        <input type="number" value="" name="reservation_child" id="reservation_child"
                               class="form-control input-sm" min="0" required>
                        <label for="reservation_cost">ราคา</label>
                        <input type="number" value="" name="reservation_cost" id="reservation_cost"
                               class="form-control input-sm" min="0" required>
                        <label for="agency">เอเจนซี่</label>
                        <select name="agency" id="agency" class="form-control input-sm"
                                required onchange="changeAgency()">
                            <option value="None Agency">None Agency</option>
                            <option value="Agoda">Agoda</option>
                            <option value="Booking">Booking</option>
                            <option value="Expedia">Expedia</option>
                            <option value="WAKA">WAKA</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" value="" name="reservation_agency_code" id="reservation_agency_code"
                               class="form-control input-sm" placeholder="Agency Code" required>
                        <input type="hidden" name="reservation_agency" id="reservation_agency"
                               class="form-control input-sm" required placeholder="Other Agency">
                        <label for="reservation_status">สถานะ</label>
                        <select name="reservation_status" id="reservation_status" class="form-control input-sm"
                                required onchange="changeStatus()">
                            <option value="0">ว่าง</option>
                            <option value="1">จอง(ค้างชำระ)</option>
                            <option value="2">จ่ายครบจำนวน</option>
                        </select>
                        <input type="hidden" name="out_balance" id="out_balance"
                               class="form-control input-sm" min="0" required placeholder="ยอดค้างชำระ">
                        <label for="note">หมายเหตุ</label>
                        <textarea name="note" id="note" class="form-control input-sm" required rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="saveReservButton" onclick="updateReserv()">
                            SAVE
                        </button>
                    </div>
                    <script>
                        function changeAgency() {
                            var reservation_agency = $("#agency").val();
                            if (reservation_agency == 'Other') {
                                $("#reservation_agency").prop('type', 'text');
                                $("#reservation_agency").val('');
                            } else {
                                $("#reservation_agency").prop('type', 'hidden');
                                $("#reservation_agency").val(reservation_agency);
                            }
                        }

                        function changeStatus() {
                            var reservation_status = $("#reservation_status").val();
                            if (reservation_status == 1) {
                                $("#out_balance").prop('type', 'number');
                            } else {
                                $("#out_balance").prop('type', 'hidden');
                            }
                        }
                    </script>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <?php

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
                                                class="fa fa-minus"></i>
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
                                                    <?= '<b>เอเจนซี่: </b>' . $reservation_show[$r]['reservation_agency']; ?>
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
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $("#reservation_name").empty();
                $("#reservation_email").empty();
                $("#reservation_tel").empty();
                $("#reservation_guest").empty();
                $("#reservation_child").empty();
                $("#reservation_cost").empty();
//                $("#reservation_agency").empty();
//                $("#reservation_status").empty();
                $("#reservation_agency_code").empty();
                $("#out_balance").empty();
                $("#note").empty();

                if (result.success == true) {
//                    console.log(result.message.reservation_edit[0].reservation_agency);
                    arr = $.inArray(result.message.reservation_edit[0].reservation_agency, ['None Agency', 'Agoda', 'Booking', 'Expedia', 'WAKA']);
                    if (arr > 0) {
                        $("#reservation_agency").prop('type', 'hidden');
                        $("#agency").val(result.message.reservation_edit[0].reservation_agency);
                    } else {
                        $("#reservation_agency").prop('type', 'text');
                        $("#agency").val('Other');
                    }

                    if (result.message.reservation_edit[0].reservation_status == 1) {
                        $("#out_balance").prop('type', 'number');
                    } else {
                        $("#out_balance").prop('type', 'hidden');
                    }

                    $("#reservation_room_name").text(result.message.reservation_edit[0].room_name + ' : ' + result.message.reservation_edit[0].room_seq);
                    $("#reservation_name").val(result.message.reservation_edit[0].reservation_customer_name);
                    $("#reservation_email").val(result.message.reservation_edit[0].reservation_email);
                    $("#reservation_tel").val(result.message.reservation_edit[0].reservation_tel);
                    $("#reservation_guest").val(result.message.reservation_edit[0].reservation_guest);
                    $("#reservation_child").val(result.message.reservation_edit[0].reservation_child);
                    $("#reservation_cost").val(result.message.reservation_edit[0].reservation_cost);
                    $("#reservation_agency").val(result.message.reservation_edit[0].reservation_agency);
                    $("#reservation_agency_code").val(result.message.reservation_edit[0].reservation_agency_code);
                    $("#reservation_status").val(result.message.reservation_edit[0].reservation_status);
                    $("#out_balance").val(result.message.reservation_edit[0].out_balance);
                    $("#note").html(result.message.reservation_edit[0].note);
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
        var reservation_email = $("#reservation_email").val();
        var reservation_tel = $("#reservation_tel").val();
        var reservation_guest = $("#reservation_guest").val();
        var reservation_child = $("#reservation_child").val();
        var reservation_cost = $("#reservation_cost").val();
        var reservation_agency = $("#reservation_agency").val();
        var reservation_agency_code = $("#reservation_agency_code").val();
        var reservation_status = $("#reservation_status").val();
        var out_balance = $("#out_balance").val();
        var note = $("#note").val();

        $.ajax({
            url: '<?php echo base_url("admin/reservation/update/'+id+'")?>',
            type: 'POST',
            data: {
                reservation_name: reservation_name,
                reservation_email: reservation_email,
                reservation_tel: reservation_tel,
                reservation_guest: reservation_guest,
                reservation_child: reservation_child,
                reservation_cost: reservation_cost,
                reservation_agency: reservation_agency,
                reservation_agency_code: reservation_agency_code,
                reservation_status: reservation_status,
                out_balance: out_balance,
                note: note
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
            error: function () {
                alert('Failed');
            }
        });
    }

</script>
</body>
</html>