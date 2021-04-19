<?php
 
//LDAP Bind paramters, need to be a normal AD User account.
$ldap_un =  $_POST["username"];
$ldap_password =  $_POST["password"];
$ldap_username = "cn=" . $_POST["username"] . ",ou=Users,ou=TPC,dc=apac,dc=local";
$ldap_connection = ldap_connect("10.243.1.107");
if(empty($ldap_password)){
        echo "Invalid password";
}else{
    if (FALSE === $ldap_connection) {
    // Uh-oh, something is wrong...
    echo 'Unable to connect to the ldap server';
}
 
// We have to set this option for the version of Active Directory we are using.
ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.

$bind = @ldap_bind($ldap_connection, $ldap_username, $ldap_password);
 
if ($bind)
{ 
    //Your domains DN to query
    $ldap_base_dn = 'ou=Users,ou=TPC,dc=apac,dc=local';
 
    //Get standard users and contacts
    $search_filter = '(|(objectCategory=person)(objectCategory=contact))';
 
    //Connect to LDAP
    $result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter);
 
    if (FALSE !== $result) {
        $entries = ldap_get_entries($ldap_connection, $result);
 
        // Uncomment the below if you want to write all entries to debug somethingthing 
        //var_dump($entries);
 
        //For each account returned by the search
        for ($x = 0; $x < $entries['count']; $x++)
        { 
            //
            //Retrieve values from Active Directory
            //
 
            //Windows Usernaame
            $LDAP_samaccountname = "";
 
            if (!empty($entries[$x]['samaccountname'][0]))
            {
                $LDAP_samaccountname = $entries[$x]['samaccountname'][0];
                if ($LDAP_samaccountname == "NULL")
                {
                    $LDAP_samaccountname = "";
                }
            }
 
            //Last Name
            $LDAP_LastName = "";
 
            if (!empty($entries[$x]['sn'][0]))
            {
                $LDAP_LastName = $entries[$x]['sn'][0];
                if ($LDAP_LastName == "NULL")
                {
                    $LDAP_LastName = "";
                }
            }
 
            //First Name
            $LDAP_FirstName = "";
 
            if (!empty($entries[$x]['givenname'][0]))
            {
                $LDAP_FirstName = $entries[$x]['givenname'][0];
                if ($LDAP_FirstName == "NULL")
                {
                    $LDAP_FirstName = "";
                }
            }
 
            //Company
            $LDAP_CompanyName = "";
 
            if (!empty($entries[$x]['company'][0]))
            {
                $LDAP_CompanyName = $entries[$x]['company'][0];
                if ($LDAP_CompanyName == "NULL")
                {
                    $LDAP_CompanyName = "";
                }
            }
 
            //Department
            $LDAP_Department = "";
 
            if (!empty($entries[$x]['department'][0]))
            {
                $LDAP_Department = $entries[$x]['department'][0];
                if ($LDAP_Department == "NULL")
                {
                    $LDAP_Department = "";
                }
            }
 
            //Job Title
            $LDAP_JobTitle = "";
 
            if (!empty($entries[$x]['title'][0]))
            {
                $LDAP_JobTitle = $entries[$x]['title'][0];
                if ($LDAP_JobTitle == "NULL")
                {
                    $LDAP_JobTitle = "";
                }
            }
 
            //Email address
            $LDAP_InternetAddress = "";
 
            if (!empty($entries[$x]['mail'][0]))
            {
                $LDAP_InternetAddress = $entries[$x]['mail'][0];
                if ($LDAP_InternetAddress == "NULL")
                {
                    $LDAP_InternetAddress = "";
                }
            }

            if($LDAP_samaccountname == $ldap_un)
            {
                echo "Last Name: " . $LDAP_LastName . "</br>";
                echo "First Name: " . $LDAP_FirstName . "</br>";
                echo "Company Name: " . $LDAP_CompanyName . "</br>";
                echo "Department: " . $LDAP_Department . "</br>";
                echo "Job Title: " . $LDAP_JobTitle . "</br>";
                echo "E-mail Address: " . $LDAP_InternetAddress . "</br>";
                break;
            }            
        } //END for loop        
    } //END FALSE !== $result    
 
    ldap_unbind($ldap_connection); // Clean up after ourselves.
} //END ldap_bind
else
{
    echo "Invalid";
}
}
?>