<?php
    require_once 'app/app.php';

    $output = array(
        'data'      => array(),
        'err'       => false,
    );

    try {
        $countrySearchApp = New Router();

        $output['data'] = $countrySearchApp->run();
    } catch(Exception $e) {
        $output['err'] = true;
        $output['data'] = $e;
    }

    header('Access-Control-Allow-Origin: *');
    die(json_encode($output));
?>