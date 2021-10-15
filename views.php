<?php
    if(file_exists("src/view/${page}.view.php")) :
        include("src/view/${page}.view.php");
    else :
        include("src/view/404.view.php");
    endif;