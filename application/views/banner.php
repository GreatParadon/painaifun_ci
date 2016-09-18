<div id="banner" class="owl-carousel owl-theme">
<!--       <div class="item">
        <img src="<?php echo base_url();?>resource/img/banner01.png" alt="about_01">
      </div> -->

      <div class="item">
        <img src="<?php echo base_url();?>resource/img/banner02.png" alt="accommodation_01">
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>resource/img/banner03.png" alt="contact_01">
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>resource/img/banner04.png" alt="gallery_01">
      </div>

      <div class="item">
        <img src="<?php echo base_url();?>resource/img/banner05.png" alt="index_01">
      </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
   
    $("#banner").owlCarousel({
   
        navigation : false, // Show next and prev buttons
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        singleItem: true,
        pagination: false,
        autoPlay: 5000,
        stopOnHover : true
   
        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
   
    });
  });
  </script>