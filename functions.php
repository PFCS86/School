<?php

function checkStatistic()
{
    if (isset($_SESSION['id'])) {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];
        $user = $_SERVER['PHP_AUTH_USER'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $ref = $_SERVER['HTTP_REFERER'];
        $dtime = date('r');

        if ($ref == "") {
            $ref = "None";
        }
        if ($user == "") {
            $user = "None";
        }

        $entry_line = "$dtime - IP: $ip | Agent: $agent | URL: $uri
 | Referrer: $ref | Username: $user n";
        $fp = fopen("logins.txt", "a");
        fputs($fp, $entry_line);
        fclose($fp);
        $_SESSION['id'];
    }

}
