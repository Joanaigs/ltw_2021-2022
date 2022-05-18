<?php

declare(strict_types = 1);


require_once('database/filter.class.php');
require_once('templates/common.tpl.php');


$db = $db = new PDO('sqlite:example.db');



drawHeader();

?>
    <div id = "typeFilter">
        <input type="radio" name ="typeFilter" value="restaurants" id="restaurants" checked="checked"><label>restaurants</label>
        <input type="radio" name ="typeFilter" id="dishes" value="dishes" ><label>dishes</label>
    </div>
<?php

drawFooter();
?>