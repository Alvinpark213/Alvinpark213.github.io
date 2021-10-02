<?php
  
    $db_link = mysqli_connect('localhost', 'root', '', 'messagedb');

    if(!$db_link) 
    {
        die("<p>Verbindung zur Datenbank konnte nicht hergestellt werden! Das Programm wird beendet!"); 
    }
    
    function runSQL($sql) 
    {
        global $db_link; 
        $db_res = mysqli_query($db_link, $sql) or die("SQL-Abfrage: " . $sql . ", Fehler: " . mysqli_error($db_link));
        return $db_res; 
    }
?>