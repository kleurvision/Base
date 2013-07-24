<? /* Dynamic Sitemap Build
------------------------------
** Title: Kleurvision Elements
** Version: 1.0
** Authoring Date: April 2013
** Description: Elements is a dynamic CMS for small business websites
** Client: Keane Hollett Group
------------------------------
** Here we go */

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Load the primary 
require('./bootstrap-light.php');

global $db;
$pages = $db->get_results("SELECT pagename, pagetitle, pagedate, pagepriority, pagechangefreq FROM app_pages");

header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">

<? if($pages){
	foreach($pages as $page){ ?>
		<url>
			<loc><? if($page->pagename != 'home-page'){
					echo URL.'/'.$page->pagename;
				} else {
					echo URL;
				} ?></loc>
			<lastmod><? if($page->pagedate != ''){
					echo $page->pagedate;
				} else {
					echo date('Y-m-d');
				} ?></lastmod>
			<changefreq><? if($page->pagechangefreq != ''){
					echo $page->pagechangefreq;
				} else {
					echo 'yearly';
				} ?></changefreq>
			<priority><? if($page->pagepriority != ''){
					echo $page->pagepriority;
				} else {
					echo '1.0';
				} ?></priority>
		</url>
	<? }
}

?>

</urlset>