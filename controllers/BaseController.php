<?php

function base_controller_index() {
    //
    //http://localhost:7080/2395286/MVC/index.php?module=base&action=index
    //echo 'Base';
    render(VIEW_DIR.'/base/welcome.php');
}

?>