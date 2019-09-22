<?php

function cargarAvatar($file, $uid)
{
    move_uploaded_file($file, "img/$uid.jpg");
}
