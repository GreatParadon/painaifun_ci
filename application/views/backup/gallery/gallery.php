<html>
<head>
<title>ปายในฝัน : มนต์เสน่ห์ของวิถีชีวิตและธรรมชาติของเมืองปาย</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="title" content="Environment" />
<meta name="keywords" content="Environment, Environment, jAlbum 10, Galleria" />
<meta name="description" content="Environment" />
<meta property="og:title" content="Environment" />
<meta property="og:site_name" content="Jalbum" />
<meta property="fb:app_id" content="140299612674733" />
		<link href="<?php echo base_url();?>resource/gallery/res/galleria/galleria.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>resource/gallery/res/index.css" rel="stylesheet" type="text/css" />		
		<link href="<?php echo base_url();?>resource/gallery/res/common.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
	.thumbnails li {
		width: 90px;
		height: 90px;
	}

	#middle_container {
		height: 510px;
	}

	#scroller_container {
		margin-top: 20px;
		margin-bottom: 10px;
		width: 812px;	
	}

	#image_scroller {
		margin: 0 10px 0 20px;
		width: 742px;
	}
	
	#thumbnails_container {
		width: 1802px;
	}
	
	#scroller_container,
	#image_scroller,
	#thumbnails_container {
		height: 106px;
	}
	
	#folders_container {
		;
	}		
	
	.folders {
		width: 0px;
	}
	
	.folders li {
		width: 106px;
		height: 106px;
	}
	
	.caption,
	.description {
		width: 742px;
	}
</style>
		<script src="<?php echo base_url();?>resource/gallery/res/jquery.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>resource/gallery/res/jquery.hotkeys.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/gallery/res/galleria/jquery.galleria.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/gallery/res/jquery.scrollimages.js" type="text/javascript"></script>	
	<script type="text/javascript"><!--//--><![CDATA[//><!--	
		$(function() {
			$("#thumbnails_container").imageScroller({
				onBeforeScroll: function() { $.galleria.stop() },
				onScroll: function() { $.galleria.start() }, 
				duration: 120, 
				imageWidth: 106, 
				size: 7,
				fastSteps: 5
			});
			
			var formattedThumbnailOpacity = 67/100;
			
			$(".thumbnails_unstyled").addClass("thumbnails");
			$("ul.thumbnails").galleria({
				history: false,
				clickNext: true,
				insert: "#main_image",
				onImage: function(image, caption, thumb) {
					var extras = $("#extras").css("display", "none").empty();
					image.css("display", "none").fadeIn(500);
					caption.css("display", "none").fadeIn(500);
					
					if (false) {
						var extrasList = $("<ul></ul>");
						extrasList.addMetadata("Date", thumb.data("originalDate"));
						extrasList.addMetadata("Camera", thumb.data("cameraModel"));
						extrasList.addMetadata("Exposure time", thumb.data("exposureTime"));
						extrasList.addMetadata("ISO", thumb.data("isoEquivalent"));
						extrasList.addMetadata("Aperture", thumb.data("aperture"));
						extrasList.addMetadata("Focus distance", thumb.data("focusDistance"));
						extrasList.addMetadata("Focal length", thumb.data("focalLength35mm"));
						extrasList.addMetadata("Keywords", thumb.data("keywords"));
						if (extrasList.children().length > 0) {
							extras.append(extrasList);						
							extrasList.find(":first-child").addClass("first");
							extras.css({ 
								width : (image.outerWidth() - (5 * 2) + 100) + "px" 
							}).fadeIn(500);
						}
					}
					
					var li = thumb.parents("li");
					li.siblings().children("img.selected").fadeTo(500, formattedThumbnailOpacity);
					thumb.fadeTo("fast", 1).addClass("selected");
					image.attr("title", "Next image");
					
					var original = thumb.data("original");
					if (original) {
						var originalLink = $("<a></a>").attr("href", original).text("Download original");
						caption.append(" (").append(originalLink).append(")");
					}
				},
				onThumb: function(thumb) {
					var li = thumb.parents("li");
					var fadeTo = li.is(".active") ? "1" : formattedThumbnailOpacity;
					thumb.css({display: "none", opacity: fadeTo}).fadeIn(1500);
					thumb.hover(
						function() { 
							thumb.fadeTo("fast", 1);		
						},
						function() {
							li.not(".active").children("img").fadeTo("fast", formattedThumbnailOpacity);
						}
					)
				},
				preloads: 3,
				fastSteps: 5,
				onPrev: function() {
					$.imageScroller.scrollLeft();
				},
				onNext: function() {
					$.imageScroller.scrollRight();
				},
				onPrevFast: function() {
					$.imageScroller.fastScrollLeft();
				},
				onNextFast: function() {
					$.imageScroller.fastScrollRight();
				},
				enableSlideshow : false,
				autostartSlideshow : false,
				slideshowDelay : 3000,
				onSlideshowPlayed : function() {
					$('.play').hide();
					$('.pause').show();	
				},
				onSlideshowPaused : function() {
					$('.play').show();
					$('.pause').hide();
				}
			});
			
			$.galleria.loader = $("<div></div>").addClass("loader").append($(new Image()).attr("src","<?php echo base_url();?>resource/gallery/res/loader.gif").attr("title","Loading..."));
			
			prepareArrow = function(arrow) {
				arrow.css({display: "none", opacity: 0.5, "padding-top": "28px"}).fadeIn( 1000);			
				arrow.hover(
					function() {
						arrow.fadeTo("fast", 1);
					},
					function() {
						arrow.fadeTo("fast", 0.5);			
					}
				);	
			}
			
			var leftArrow = $("#left_arrow");
			prepareArrow(leftArrow);
			leftArrow.click(function() {
				$.galleria.prev();	
			});
			
			var rightArrow = $("#right_arrow");
			prepareArrow(rightArrow);
			rightArrow.click(function() {
				$.galleria.next();
			});
			
			if (false) {
				var leftFastArrow = $("#left_fast_arrow");
				prepareArrow(leftFastArrow);
				leftFastArrow.click(function() {
					$.galleria.prevFast();
				});
				
				var rightFastArrow = $("#right_fast_arrow");
				prepareArrow(rightFastArrow);
				rightFastArrow.click(function() {
					$.galleria.nextFast();
				});
			}
		});

		$(document).bind("keydown", "left", function() {
			if (!KeyboardNavigation.widgetHasFocus()) {
				$.galleria.prev();
			}
		});
		$(document).bind("keydown", "right", function() {
			if (!KeyboardNavigation.widgetHasFocus()) {
				$.galleria.next();
			}
		});
		$(document).bind("keydown", "space", function() {
			if (!KeyboardNavigation.widgetHasFocus()) {
				$.galleria.toggleSlideshow();
			}
		});

		var KeyboardNavigation = {
			widgetHasFocus: function() {
				if(typeof _jaWidgetFocus != 'undefined' && _jaWidgetFocus) {
					return true;
				}
				return false;
			}
		}
	//--><!]]></script>
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620">
<style type="text/css">
body {
	background-color: #000;
}
#image_scroller {		margin: 0 10px 0 20px;
		width: 742px;
}
#image_scroller {		height: 106px;
}
#middle_container {		height: 510px;
}
#scroller_container {		margin-top: 20px;
		margin-bottom: 10px;
		width: 812px;	
}
#scroller_container {		height: 106px;
}
#thumbnails_container {		width: 1802px;
}
#thumbnails_container {		height: 106px;
}
</style>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('<?php echo base_url();?>resource/images/gallery_rollover_10.jpg','<?php echo base_url();?>resource/images/gallery_rollover_03.jpg','<?php echo base_url();?>resource/images/gallery_rollover_04.jpg','<?php echo base_url();?>resource/images/gallery_rollover_05.jpg','<?php echo base_url();?>resource/images/gallery_rollover_07.jpg')">
<!-- Save for Web Slices (all-head.psd) -->
<center>
<table id="Table_01" width="1098" height="467" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="8">
			<img src="<?php echo base_url();?>resource/images/gallery_01.jpg" width="1097" height="369" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="369" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="<?php echo base_url();?>resource/images/gallery_02.jpg" width="221" height="1" alt=""></td>
		<td rowspan="2"><a href="about" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','<?php echo base_url();?>resource/images/gallery_rollover_03.jpg',1)"><img src="<?php echo base_url();?>resource/images/gallery_03.jpg" name="Image23" width="149" height="68" border="0"></a></td>
		<td rowspan="3"><a href="accommodations/3" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image24','','<?php echo base_url();?>resource/images/gallery_rollover_04.jpg',1)"><img src="<?php echo base_url();?>resource/images/gallery_04.jpg" name="Image24" width="187" height="69" border="0"></a></td>
		<td rowspan="3"><a href="reservation" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image25','','<?php echo base_url();?>resource/images/gallery_rollover_05.jpg',1)"><img src="<?php echo base_url();?>resource/images/gallery_05.jpg" name="Image25" width="149" height="69" border="0"></a></td>
		<td rowspan="2"><a href="gallery" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image26','','<?php echo base_url();?>resource/images/gallery_rollover_06.jpg',1)"><img src="<?php echo base_url();?>resource/images/gallery_06.jpg" name="Image26" width="132" height="68" border="0"></a></td>
		<td rowspan="3"><a href="contact" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image27','','<?php echo base_url();?>resource/images/gallery_rollover_07.jpg',1)"><img src="<?php echo base_url();?>resource/images/gallery_07.jpg" name="Image27" width="155" height="69" border="0"></a></td>
		<td rowspan="4">
			<img src="<?php echo base_url();?>resource/images/gallery_08.jpg" width="104" height="98" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="1" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="<?php echo base_url();?>resource/images/gallery_09.jpg" width="101" height="97" alt=""></td>
		<td><a href="index" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','<?php echo base_url();?>resource/images/gallery_rollover_10.jpg',1)"><img src="<?php echo base_url();?>resource/images/gallery_10.jpg" name="Image22" width="120" height="67" border="0"></a></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="67" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="<?php echo base_url();?>resource/images/gallery_11.jpg" width="269" height="30" alt=""></td>
		<td rowspan="2">
			<img src="<?php echo base_url();?>resource/images/gallery_12.jpg" width="132" height="30" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="1" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="<?php echo base_url();?>resource/images/gallery_13.jpg" width="336" height="29" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/gallery_14.jpg" width="155" height="29" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="29" alt=""></td>
	</tr>
        <tr>
    	<td><img src="<?php echo base_url();?>resource/images/left.jpg" width="101" height="101"></td>
		<td colspan="6"><div id="main">
		  <div id="scroller_container"> <img class="hide" id="left_arrow" src="<?php echo base_url();?>resource/gallery/res/left.png" alt="Scroll left" title="Scroll left" />
		    <div id="image_scroller">
		      <ul id="thumbnails_container" class="thumbnails_unstyled">
		        <li class="active"> <a href="<?php echo base_url();?>resource/gallery/slides/environment01.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment01.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:408</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment02.JPG" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment02.JPG" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:429</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment03.JPG" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment03.JPG" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:429</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment04.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment04.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:408</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment05.JPG" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment05.JPG" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:427</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment06.JPG" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment06.JPG" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:427</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment07.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment07.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:478</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment08.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment08.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:604;;height:401</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment09.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment09.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:478</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment10.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment10.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:478</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment11.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment11.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:480;;height:480</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment12.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment12.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:478</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment13.jpeg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment13.jpeg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:479</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment14.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment14.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:359;;height:480</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment15.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment15.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:478</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment16.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment16.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:299;;height:206</span> </li>
		        <li class=""> <a href="<?php echo base_url();?>resource/gallery/slides/environment17.jpg" title=""> <img src="<?php echo base_url();?>resource/gallery/thumbs/environment17.jpg" alt="" title="" style="width: 90px; height: 90px;" /> </a> <span>width:640;;height:478</span> </li>
	          </ul>
		      <div class="clear"></div>
	        </div>
		    <img class="hide" id="right_arrow" src="<?php echo base_url();?>resource/gallery/res/right.png" alt="Scroll right" title="Scroll right" />
		    <div class="clear"></div>
	      </div>
		  <div class="clear"></div>
		  <div id="middle_container">
		    <div id="main_image"></div>
		    <div id="extras"></div>
	      </div>
		  <div class="clear"></div>
		  </div>
		  <p>&nbsp;</p>
		  <p><img src="<?php echo base_url();?>resource/images/copyright.jpg" width="892" height="26"></p></td>
		<td><img src="<?php echo base_url();?>resource/images/right.jpg" width="104" height="104"></td>
	</tr>
</table>
</center>
<!-- End Save for Web Slices -->
</body>
</html>