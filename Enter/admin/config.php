<?php
/*
This script was downloaded at:
LightPHPScripts.com
Please support us by visiting
out website and letting people
know of it.
Produced under: LGPL
*/

/* Main Options */
//----------------

/* Which page user goes to after logoss */
$logoutPage = '../../index.php';
$bdaypage = 'mybday.php';
/* Secure page to redirect to after login */
$loginPagedoc = 'doctor/index.php';
$loginPageadmin = 'admin/index.php';
$loginPageuser = 'user/index.php';

/* Start session? Set this to false, if
you are already starting the session elsewhere
*/
@$startSession = true;

/* Use Cookies with sessions*/
$useCookies = false;

/* Stay loged in for? -> cookies */
/* in seconds:
3600 ->  1 hr, 86400 -> 1 day
604800 -> 1 week, 2419200 -> 1 month
29030400 -> 1 year
*/
$logedInFor = 2419200;

/* Domain name -> cookies */
$domainName = 'http://localhost/slumBook2/';

/*
Notes: Please note that using sessions,
will store a cookie with the ID on userside.
To make this work for users without cookies,
propagate the ID through the URLS
in this manner: 
nextpage.php?<?php echo htmlspecialchars(SID); ?>
*/

/* Connect to database? Set to false, if you
are already conneted */
$connectDatabase = TRUE;



/* Table Info */
$tableName = 'userlist';
$userNameField = 'userName';
$userPasswordField = 'password';

/** SEC 334 **/
$errpage = 'errorpage.html';
?>