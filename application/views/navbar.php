<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index"><img style="width:140px" src="<?php echo base_url("resource/img/logo_brown.PNG"); ?>"><!-- <b style="color:#856541">ปายในฝัน</b> --></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li onclick='onAbout()'><a href="#about">ABOUT</a></li>
        <li onclick='onAccom()'><a href="#accommodation">ROOM & RATE</a></li>
        <li onclick='onReser()'><a href="#reservation">RESERVATION</a></li>
        <li onclick='onGalle()'><a href="#gallery">GALLERY</a></li>
        <li onclick='onConta()'><a href="#contact">CONTACT US</a></li>
      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">
  function onAbout(){
    window.location.replace('<?php echo base_url("about"); ?>');
  }

  function onAccom(){
    window.location.replace('<?php echo base_url("accommodation"); ?>');
  }

  function onReser(){
    window.location.replace('<?php echo base_url("reservation"); ?>');
  }

  function onGalle(){
    window.location.replace('<?php echo base_url("gallery"); ?>');
  }

  function onConta(){
    window.location.replace('<?php echo base_url("contact"); ?>');
  }
</script>