<?php
define("LDAP_SERVER_UTCC", "10.7.46.103"); // //$server = 'cdc1.utcc-net.utcc-domain.local';
define("LDAP_BESE_DN_UTCC", 'OU=UTCC Organization Units,DC=utcc-net,DC=utcc-domain,DC=local');
define("DBHOST", "localhost");
define("DATABASE", "db_admission_ism");
define("DATABASE_USER", "db_admission_ism");
define("DATABASE_PASS", "sO2tbMKEHzvt3XNVBQAM");
define('TBL_APPS', 'tbl_application');
define('TBL_ENQ', 'tbl_enquiry');
define("APP_TITLE", "INTERNATIONAL SCHOOL OF MANAGEMENT");

define("SMTP_USER", "utcc-noreply@utcc.ac.th");
define("SMTP_PASS", "uTccreply123");
define("SMTP_NAME", "UTCC noreply");

// connect to  mysql server
$conn = mysqli_connect(DBHOST, DATABASE_USER, DATABASE_PASS, DATABASE);
if (mysqli_connect_errno()) {
  die('Could not connect: ' . mysqli_connect_error());
}

mysqli_query($conn, "SET time_zone = '+7:00'");
mysqli_query($conn, "SET character_set_results=utf8");
mysqli_query($conn, "SET collation_connection=utf8_general_ci");
mysqli_query($conn, "SET NAMES 'utf8'");

date_default_timezone_set("Asia/Bangkok");
//@session_start();
?>
