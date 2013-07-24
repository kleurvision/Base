<? /* Bolt it on
------------------------------
** ClientCare db config file
------------------------------
** Here we go */

// Create database setup using EzSql
// Database variables
$db_u	= 'clickity_db';
$db_p	= '128fyembo4hs';
$db_n	= 'clickity_framework';
$db_h	= 'localhost';
	
// Include ezSQL core
include_once (PATH.LIBRARY.'/ezsql/shared/ez_sql_core.php');

// Include ezSQL database specific component
include_once (PATH.LIBRARY.'/ezsql/mysql/ez_sql_mysql.php');

// Include PHP Form Builder Class
include(PATH.LIBRARY."/PFBC/Form.php");


// Initialise database object and establish a connection
// at the same time - db_user / db_password / db_name / db_host
$db = new ezSQL_mysql($db_u,$db_p,$db_n,$db_h);