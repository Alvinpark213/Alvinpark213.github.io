<?php   $handle = fopen("../templates/Besucherzähler.txt", "r");
        $besucherzahl = fgets($handle); 
        fclose($handle); 

        $besucherzahl++; 
        $handle = fopen('../templates/Besucherzähler.txt', 'w'); 
        fwrite($handle, $besucherzahl); 
        fclose($handle); 
?>