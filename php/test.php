<?php

$globaltype = GLOBALTYPE;
$unitid = UNITID;
$userid = USERID;
$termtype = TERMTYPE;

function foo bar(){}
class Queries
{
    public static function RegisterQuery($tel, $Firstname, $Lastname)
    {
        global $globaltype, $unitid, $userid, $termtype;

        $LoginQuery = <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <Message Action="Login" Terminal_Type="$termtype" Global_Type="$globaltype" Unit_ID="$unitid" User_ID="$userid">
           <Is_Virtual_Card>True</Is_Virtual_Card>
           <Login Auto_Registry="True">%s</Login>
           <F_Name>%s</F_Name>
           <L_Name>%s</L_Name>
           <Full_Name>%s</Full_Name>
           <Auth_Code/>
        </Message>
XML;

        return sprintf($LoginQuery, $tel, $Firstname, $Lastname, $Firstname." ".$Lastname);
    }


    public static function ResetQuery($tel)
    {
        global $globaltype, $unitid, $userid, $termtype;

        $LoginQuery = <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <Message Action="Login" Terminal_Type="$termtype" Global_Type="$globaltype" Unit_ID="$unitid" User_ID="$userid">
           <Is_Virtual_Card>True</Is_Virtual_Card>
           <Login Auto_Registry="True">%s</Login>
           <Auth_Code/>
        </Message>
XML;

        return sprintf($LoginQuery, $tel);
    }

}


?>