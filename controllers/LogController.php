<?php
require_once 'MysqliDb.php';
require_once 'display.php';
require_once 'models/Log.php';


/**
 * Description of LogController
 *
 * @author livares
 */
class LogController {
    
    function __construct(){
        $this->log = new Log(new MysqliDb());
        
    }
    
    function insert(){
        date_default_timezone_set('America/Chicago');
        $lcl_machine = $_GET['date'];
        $srvr_machine = date("d/m/Y") . " " . date("h:i:s");
        $localIP = $_SERVER['REMOTE_ADDR'];
        $this->log->insert($localIP, $lcl_machine, $srvr_machine);
    }
    
    function show(){
        $logs = $this->log->all();
        $disp_obj = new Display();
        $disp_obj->log($logs);
        $this->log->close();
    }
}
