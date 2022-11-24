<?php
// basic sequence with LDAP is connect, bind, search, interpret search
// result, close connection

echo "<h3>LDAP query test</h3>";
echo "Connecting ...";
$ds=ldap_connect("ldap://ldap.forumsys.com"); // must be a valid LDAP server!
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
print_r("connect result is ");
print_r($ds);
print_r("<br />");
if ($ds) {
echo "Binding ...";
$r=ldap_bind($ds); // this is an "anonymous" bind, typically
// read-only access
echo "Bind result is " . $r . "<br />";

echo "Searching for (sn=S*) ...";
// Search surname entry
$sr=ldap_search($ds, "dc=example,dc=com", "sn=*");
echo "Search result is ";
print_r($sr);
echo "<br />";

echo "Number of entries returned is " . ldap_count_entries($ds, $sr) . "<br />";

echo "Getting entries ...<p>";
$info = ldap_get_entries($ds, $sr);
echo "Data for " . $info["count"] . " items returned:<p>";

for ($i=0; $i<$info["count"]; $i++) {
	echo "dn is: " . $info[$i]["dn"] . "<br />";
	echo "first cn entry is: " . $info[$i]["cn"][0] . "<br />";
	if (isset($info[$i]["mail"][0])) {
		echo "first email entry is: " . $info[$i]["mail"][0] . "<br /><hr />";
	}
}

echo "Closing connection";
ldap_close($ds);

} else {
echo "<h4>Unable to connect to LDAP server</h4>";
}
?>