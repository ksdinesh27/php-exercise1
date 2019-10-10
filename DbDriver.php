<?php

/**
 *
 * @author livares
 */
interface DbDriver {
    
    function close();
    
    function query(string $sql, array $arguments);
    
    function getError(): string;
    
}
