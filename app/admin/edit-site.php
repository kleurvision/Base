<?
ob_start();
$pagetitle = 'Edit Site';
include 'header.php';

	$site_id = $_GET['id'];
	edit_site($site_id); 

include 'footer.php';
ob_end_flush();
?>