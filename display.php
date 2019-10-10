<?php

require_once 'PDO_Db.php';

Class Display {

    function log($logs) {
        if ($logs->fetchColumn() > 0) {
            echo "<table align='center'>
        <tr>
        <th><b>Client IP Address</b></th>
        <th><b>Client TimeStamp</b></th>
        <th><b>Server TimeStamp</b></th>
        </tr>";
            // output data of each row
            while ($log = $logs->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>"
                . "<td>" . $log["ip_address"] . "</td>"
                . "<td>" . $log["lcl_date_time"] . "</td>"
                . "<td>" . $log["srvr_date_time"] . "</td>"
                . "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

}
