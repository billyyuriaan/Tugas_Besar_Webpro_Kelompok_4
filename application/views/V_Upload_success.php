<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<!-- Lengkapi baris 10-14 agar mmemberikan output sesuai yang diharapkan -->
<ul>
<?php foreach ($data as $val) :?>
<li><?php  echo $val?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('C_Upload', 'Upload Another File!'); ?></p>

</body>
</html>