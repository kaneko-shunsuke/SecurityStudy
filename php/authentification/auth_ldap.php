<?php

	////////// LDAP Login logic //////////
	// ldap サーバ情報
	$ldap_host  = "ubuntu.example.com";
	$ldap_uid   = 'kaneko_s';
	$ldap_upass = 'kaneko_s';
	$ldap_ou    = 'ou=People';
	$ldap_dn    = 'dc=example, dc=com';

	// ldap サーバーに接続する
	$ldapconn = ldap_connect($ldap_host) or exit("Could not connect to LDAP server.");

	if ($ldapconn) {
		echo "Connect LDAP Completed !!! <br />";
		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
		//$ldapbind = ldap_bind($ldapconn, 'uid='.$ldap_uid.',ou=People, '.$ldap_dn, $ldap_upass);
		//$ldapbind = ldap_bind($ldapconn, 'uid='.$ldap_uid.','.$ldap_ou.','.$ldap_dn, $ldap_upass);
		$ldapbind = ldap_bind($ldapconn);
		if($ldapbind){
			echo 'LDAP bind succeeded! <br />';
			$base_dn = "dc=example, dc=com";
			$result = ldap_search( $ldapconn, $base_dn, "(uid=*)");
			$info = ldap_get_entries($ldapconn, $result);
			echo $info["count"]." 個のエントリが返されました\n";
		}else{
			echo 'LDAP bind failed.';
		}
	}else{
	  echo "Fail to Connected!!!";
	}
	////////// LDAP Login logic //////////

	$url = './redirect.php';
	header("Location: {$url}");
	exit;

?>
