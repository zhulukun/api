<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/avatar');?>
<input type="file" name="avatar" size="20" />
<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>