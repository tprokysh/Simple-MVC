<?php
$host = "host=localhost dbname=blog user=postgres password=postgres";
$db = pg_connect($host)
    or die("Can't connect" . pg_last_error());