<? /* Define general Imagemagick vars */
/* Confirm that Imagemagick is running on your server ---

function alist ($array) {  //This function prints a text array as an html list.
  $alist = "<ul>";
  for ($i = 0; $i < sizeof($array); $i++) {
    $alist .= "<li>$array[$i]";
  }
  $alist .= "</ul>";
  return $alist;
}
exec("convert -version", $out, $rcode); //Try to get ImageMagick "convert" program version number.
echo "Version return code is $rcode <br>"; //Print the return code: 0 if OK, nonzero if error.
echo alist($out); //Print the output of "convert -version"

---
*/

class Image {

	function _construct($image_src) {
		if($image_src){
			$this->image = $image_src;
		} else {
			echo 'Add image src';
		};
	}		

	function thumbnail($w = '100', $h = '0') {
		$thumb = $this->image;
		$image = new Imagick($thumb);
		
		$thumnail = $image->thumbnailImage(100, 0);
		return $thumbnail;
	}

}