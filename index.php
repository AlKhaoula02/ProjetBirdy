<?php
if(isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page = 'envoi';
}

include('Controllers/'.$page.'Controller.php');