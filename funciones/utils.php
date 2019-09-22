<?php

function isLogged()
{
    if (!isset($_SESSION["usuario"]["uid"])) {
        header("Location: index.php?p=login");
    }
}
