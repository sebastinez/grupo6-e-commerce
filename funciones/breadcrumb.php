<?php

function obtenerPagina($p)
{
    switch ($p) {
        case 'album':
            return "<span id='breadcrumb-barra'> / </span><span id='breadcrumb-page'>Albums</span><span id='breadcrumb-barra'> / </span>";
            break;

        default:
            # code...
            break;
    }
}
