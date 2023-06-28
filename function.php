<?php
function renderTemplate($path,$data=[] ){
    if(!file_exists($path)){
        return '';
    }

    extract($data);

    ob_start();
    require $path;
    $html=ob_get_contents();

    ob_end_clean();

    return $html;
}