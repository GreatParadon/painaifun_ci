<html>
<head>
<title>Upload Form</title>
</head>
<body>

<div id="upload" class="uploadify"></div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>resource/js/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#upload').uploadify({
			uploader: "<?php echo site_url('do_upload'); ?>",
			swf: "<?php echo base_url('resource/js/uploadify/uploadify.swf'); ?>"
		});
	});
</script>
</body>
</html>