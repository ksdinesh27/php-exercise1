<?php
namespace Db;
/**
 *
 * @author livares
 */
interface DbDriver {
    
    const serverName = "localhost";
    const username = "root";
    const password = "123456";
    const dbname = "time_App";

    function close();
    
    function execute(string $sql, array $arguments);

    function select(string $sql, array $arguments);
    
    function getError(): string;
    
}
