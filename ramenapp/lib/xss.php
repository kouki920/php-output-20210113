<?php

function xss($string){
    return htmlspecialchars($string,ENT_QUOTES,'UTF-8');
}
