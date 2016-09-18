<html>
<head>
<title>ปายในฝัน : มนต์เสน่ห์ของวิถีชีวิตและธรรมชาติของเมืองปาย</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
body {
	background-color: #000;
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
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="title" content="Bamboo Deluxe Frontview" />
<meta name="keywords" content="Bamboo Deluxe Frontview, Bamboo Deluxe Frontview, jAlbum 10, Galleria" />
<meta name="description" content="Bamboo Deluxe Frontview" />
<meta property="og:title" content="Bamboo Deluxe Frontview" />
<meta property="og:site_name" content="Jalbum" />
<meta property="fb:app_id" content="140299612674733" />
		<link href="<?php echo base_url();?>resource/accommodations/res/galleria/galleria.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>resource/accommodations/res/index.css" rel="stylesheet" type="text/css" />		
		<link href="<?php echo base_url();?>resource/accommodations/res/common.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>resource/my_style2.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
	.thumbnails li {
		width: 90px;
		height: 90px;
	}

	#middle_container {
	height: 510px;
	text-align: center;
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
		width: 2200px;
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
<script src="<?php echo base_url();?>resource/accommodations/res/jquery.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>resource/accommodations/res/jquery.hotkeys.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/accommodations/res/galleria/jquery.galleria.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/accommodations/res/jquery.scrollimages.js" type="text/javascript"></script>	
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
			
			$.galleria.loader = $("<div></div>").addClass("loader").append($(new Image()).attr("src","<?php echo base_url();?>resource/accommodations/res/loader.gif").attr("title","Loading..."));
			
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
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('<?php echo base_url();?>resource/images/accommodation_rollover_10.jpg','<?php echo base_url();?>resource/images/accommodation_rollover_03.jpg','<?php echo base_url();?>resource/images/accommodation_rollover_04.jpg','<?php echo base_url();?>resource/images/accommodation_rollover_05.jpg','<?php echo base_url();?>resource/images/accommodation_rollover_06.jpg','<?php echo base_url();?>resource/images/accommodation_rollover_07.jpg')">
<!-- Save for Web Slices (all-head.psd) -->
<center>
<table id="Table_01" width="1098" height="467" border="0" cellpadding="0" cellspacing="0">
<tr>
		<td colspan="8">
			<img src="<?php echo base_url();?>resource/images/accommodation_01.jpg" width="1097" height="369" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="369" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="<?php echo base_url();?>resource/images/accommodation_02.jpg" width="221" height="1" alt=""></td>
		<td rowspan="2"><a href="<?php echo base_url();?>about" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','<?php echo base_url();?>resource/images/accommodation_rollover_03.jpg',1)"><img src="<?php echo base_url();?>resource/images/accommodation_03.jpg" name="Image23" width="149" height="68" border="0"></a></td>
		<td rowspan="3"><a href="<?php echo base_url();?>accommodations/3" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image24','','<?php echo base_url();?>resource/images/accommodation_rollover_04.jpg',1)"><img src="<?php echo base_url();?>resource/images/accommodation_04.jpg" name="Image24" width="187" height="69" border="0"></a></td>
		<td rowspan="3"><a href="<?php echo base_url();?>reservation" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image25','','<?php echo base_url();?>resource/images/accommodation_rollover_05.jpg',1)"><img src="<?php echo base_url();?>resource/images/accommodation_05.jpg" name="Image25" width="149" height="69" border="0"></a></td>
		<td rowspan="2"><a href="<?php echo base_url();?>gallery" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image26','','<?php echo base_url();?>resource/images/accommodation_rollover_06.jpg',1)"><img src="<?php echo base_url();?>resource/images/accommodation_06.jpg" name="Image26" width="132" height="68" border="0"></a></td>
		<td rowspan="3"><a href="<?php echo base_url();?>contact" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image27','','<?php echo base_url();?>resource/images/accommodation_rollover_07.jpg',1)"><img src="<?php echo base_url();?>resource/images/accommodation_07.jpg" name="Image27" width="155" height="69" border="0"></a></td>
		<td rowspan="4">
			<img src="<?php echo base_url();?>resource/images/accommodation_08.jpg" width="104" height="98" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="1" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="<?php echo base_url();?>resource/images/accommodation_09.jpg" width="101" height="97" alt=""></td>
		<td><a href="<?php echo base_url();?>index" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','<?php echo base_url();?>resource/images/accommodation_rollover_10.jpg',1)"><img src="<?php echo base_url();?>resource/images/accommodation_10.jpg" name="Image22" width="120" height="67" border="0"></a></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="67" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="<?php echo base_url();?>resource/images/accommodation_11.jpg" width="269" height="30" alt=""></td>
		<td rowspan="2">
			<img src="<?php echo base_url();?>resource/images/accommodation_12.jpg" width="132" height="30" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="1" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="<?php echo base_url();?>resource/images/accommodation_13.jpg" width="336" height="29" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/accommodation_14.jpg" width="155" height="29" alt=""></td>
		<td>
			<img src="<?php echo base_url();?>resource/images/spacer.gif" width="1" height="29" alt=""></td>
	</tr>
    </tr>
        <tr>
    	<td><img src="<?php echo base_url();?>resource/images/left.jpg" width="101" height="101"></td>
		<td colspan="6"><p>
		<?php
		foreach ($rs as $r):
			print '<h1>'.$r['room_name'].'</h1><br><span style="width:320px">'.$r['room_info'].'</span>';
		endforeach;
		?>
		<div id="main">
		<div id="scroller_container">
			<img class="hide" id="left_arrow" src="<?php echo base_url();?>resource/accommodations/res/left.png" alt="Scroll left" title="Scroll left" />					
			<div id="image_scroller">
				<ul id="thumbnails_container" class="thumbnails_unstyled">
					<?php
					foreach ($im as $r):
					print '
						<li class="active">
							<a href="'; echo base_url() .$r['image_path'].'">		
							<img src="';  echo base_url() .$r['image_path'].'" style="width: 100%; height:100%"/></a>
							<span>width:640;height:427</span>
						</li>';
					endforeach;
					?>
				</ul>
				<div class="clear"></div>
			</div>					
			<img class="hide" id="right_arrow" src="<?php echo base_url();?>resource/accommodations/res/right.png" alt="Scroll right" title="Scroll right" />
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div id="middle_container">
			<div id="main_image"></div>
			<div id="extras"></div>
		</div>
		</div>
		<?php
		foreach ($rs2 as $r){
		print '<a href="'; echo base_url()."accommodations/".$r['room_id'].'" id="roomThumbs">'.$r['room_name'].'</a>';
		}
		?>
		<p><img src="<?php echo base_url();?>resource/images/copyright.jpg" width="892" height="26"></p></td>
        <td><img src="<?php echo base_url();?>resource/images/right.jpg" width="104" height="104"></td>
	</tr>
    
    <tr>
    
</table>
</center>
</body>
</html>