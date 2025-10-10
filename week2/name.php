<?php 
$name = $_GET['name'];
print 'welcome to out website,'.$name.'!';
htmlspecialchars($name, ENT_QUOTES, 'UTF-8').'!';
?>