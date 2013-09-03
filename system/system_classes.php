<? /* Bolt it on
------------------------------
** ClientCare class loader file
------------------------------
** Here we go */

// Standard Classes
include_once(SYSTEM.'/classes/page.class.php');
include_once(SYSTEM.'/classes/options.class.php');
include_once(SYSTEM.'/classes/qr.class.php');
include_once(SYSTEM.'/classes/image.class.php');
include_once(SYSTEM.'/classes/user.class.php');


// Library Classes
// All library based class or third party SDKs
include_once(SYSTEM.'/library/upload/upload.class.php');
//include(SYSTEM.'/library/PFBC/Form.php'); No need for this class — remove once stable version is complete
include(SYSTEM.'/library/postmark/postmark.php'); // Postmark API
include(SYSTEM.'/library/yellowapi/YellowAPI.class.php'); // Yellow Pages API
include(SYSTEM.'/library/podio/PodioAPI.php'); // Podio API