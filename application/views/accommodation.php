<!DOCTYPE html>
<html lang="en">
<head>
<?php include('headtag.php') ?>
</head>
<body id="accommodation" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php include('navbar.php') ?>

<?php include('banner.php') ?>

<div id='container'>
  <h2 style="color:#94a316">ROOM AND RATE</h2>
  <br>
  <div class="row">
    <div class="col-md-4" style="border-left-style: solid; border-color: #856541;">
    <?php
    foreach($roomList as $r){
      print  "<h5 class='accomhover' style='text-transform: uppercase;' onclick='onShowRoomDetail(".$r['room_id'].")'>".$r['room_name']."</h5>";
    }
    ?>
    </div>
    <div class="col-md-8">
    <div >
      <?php 
      foreach($roomDetail as $r){
          print '<h5 style="text-transform: uppercase; color:#856541"><b>'.$r['room_name'].'</b></h5>';
      }
          print '<div>'.$r['room_detail'].'</div>';
          print '<div><table class="table">
                    <tr>
                      <th colspan="7" style="color:#856541; border:0" >Rate</th>
                    </tr>
                    <tr style="background-color:#856541; color:#FFF">
                        <th>From</th>
                        <th>To</th>
                        <th>Sun - Thu</th>
                        <th>Fri - Sat</th>
                        <th>Holiday</th>
                        <th>Breakfast</th>
                        <th>Extra Bed</th>
                    </tr>';
          foreach ($rate as $rates) {
            if($rates['rate_breakfast'] == 1){
              $rate_breakfast = 'Yes';
            }else{
              $rate_breakfast = 'No';
            }

            if($rates['rate_extrabed'] == NULL){
              $rate_extrabed = 'No';
            }else{
              $rate_extrabed = $rates['rate_extrabed'].' Baht';
            }
            print '<tr>
                      <td>'.DateThai($rates['rate_fromdate']).'</td>
                      <td>'.DateThai($rates['rate_todate']).'</td>
                      <td>'.$rates['rate_first'].' baht</td>
                      <td>'.$rates['rate_second'].' baht</td>
                      <td>'.$rates['rate_holiday'].' baht</td>
                      <td>'.$rate_breakfast.'</td>
                      <td>'.$rate_extrabed.'</td>
                  </tr>';
          }
          print '</table></div>';
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

      ?>
    </div>
      <div id="pnf-demo" class="owl-carousel gallery ac-bg" >
       <?php 
        foreach($roomImg as $r){
          print '<div class="item">
                <a href="'; 
                echo base_url("resource/img/room_img/".$r['image_path'].""); 
                print '" data-lightbox="painaifun"><img src="'; 
                echo base_url("resource/img/room_img/".$r['image_path'].""); 
                print '"></a></div>';
        }
      ?> 
      </div>
    </div>
  </div>
</div>

<?php include('footer.php') ?>

<script type="text/javascript">
  var id = '';

  $(document).ready(function() {
   
    $("#pnf-demo").owlCarousel({
   
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 4,
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [979,4],
      pagination: false
   
    });
  });

  function onShowRoomDetail(id){
        window.location.replace('<?php echo base_url("accommodation/'+id+'")?>');
  }
</script>
</body>
</html>