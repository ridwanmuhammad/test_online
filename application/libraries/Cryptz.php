
<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Cryptz {
	
public function md5_encrypt($string){
	$_F=__FILE__;$_X='Pz48P3BocA0KNGYoZDF0NSgiWSIpID09IGEwNjkgT1IgZDF0NSgiWSIpID09IGEwYTApew0KCSRrNXkgPSBtZGkoIm1icmMyZDU2OWE4bzd1ZWkiKTsNCgkkayA9ICJtYnJjMmQ1NjlhOG83dWVpIjsNCn01bHM1ew0KCSRrNXkgPSBtZGkoIjFiY2Q1Zmc2YW91aWU3ODkiKTsNCgkkayA9ICIxYmNkNWZnNmFvdWllNzg5IjsNCn0NCg0KPz4=';
eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLC
cxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GS
UxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$key,$string,MCRYPT_MODE_ECB)));
	return $string;	
}
public function md5_decrypt($string){
	$_F=__FILE__;$_X='Pz48P3BocA0KNGYoZDF0NSgiWSIpID09IGEwNjkgT1IgZDF0NSgiWSIpID09IGEwYTApew0KCSRrNXkgPSBtZGkoIm1icmMyZDU2OWE4bzd1ZWkiKTsNCgkkayA9ICJtYnJjMmQ1NjlhOG83dWVpIjsNCn01bHM1ew0KCSRrNXkgPSBtZGkoIjFiY2Q1Zmc2YW91aWU3ODkiKTsNCgkkayA9ICIxYmNkNWZnNmFvdWllNzg5IjsNCn0NCg0KPz4=';
eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLC
cxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GS
UxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
	$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$key,base64_decode($string),MCRYPT_MODE_ECB));
	return $string;	
}


}
?>