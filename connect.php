<?php
$ldapServer = 'ldap://ldap2.corp.sensata.com';
$ldapPort = 389;
$ldapUsername = 'SRV_CAFERATING';
$ldapPassword = 'г@3k4!$3FxDu';

$ldapConn = ldap_connect($ldapServer, $ldapPort);

if (!$ldapConn) {
    die("Could not connect to LDAP server");
}

$ldapBind = ldap_bind($ldapConn, $ldapUsername, $ldapPassword);

if (!$ldapBind) {
    die("LDAP bind failed");
}

ldap_close($ldapConn);
?>
