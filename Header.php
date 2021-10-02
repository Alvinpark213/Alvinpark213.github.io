<?php       require('connectDB.php'); 
            require('../templates/loginSystem.php'); 
            require('../templates/Besucher.php'); 
            if(!isset($_SESSION['CookiesAccepted']) || $_SESSION['CookiesAccepted'] == false)
            {
                ?>
                <html> 
                    <head>
                        <meta charset="UTF-8"/>
                        <title>Travel Through Galaxy</title>
                        <link rel="stylesheet" type="text/css" href="../stylesheets/stylesheetfo.css" />
                    </head>
                    <body>
                        <section class="Cookies">
                        <br><br><br><br><br><br>
                            <p class="Cookies">Datenschutz und Ihre Datensicherheit</p>
                            <a class="Cookies">Im Rahmen der uns zur Verfügung stehenden Ressourcen und Ihrer bei uns <br>angegebenen Daten möchten wir Sie über Folgendes informieren: <br> 
                                                Zur Personalisierung unserer Webseite müssen wir, spätenstens bei der Anmeldung bzw. Registration, <br> die von Ihnen erhaltenen Informationen in unseren Datenbanken abspeichern. <br>
                                                Wir gehen mit äußerster Diskretion und Sorgfalt mit ihren persönlichen Daten um. <br> <br> Mit Akzeptieren dieser Info-Einblende, akzepieren Sie unsere <br>Datenschutzbedingungen und -einstellungen, ebenso wie die Allgemeinen Nutzungsbedingungen unserer Gruppe. <br><br>
                                <form action="../additive files ttg/Index.php" method="POST">
                                    <input type="submit" value="Cookies akzeptieren" name="acceptCookie" tabindex="1">
                                    <?php
                                        if(isset($_POST['acceptCookie']))
                                        {
                                                $_SESSION['CookiesAccepted'] = true;   
                                        }
                                        if(!isset($_POST['acceptCookie']))
                                        {
                                                $_SESSION['CookiesAccepted'] = false; 
                                        }
                                    ?>
                                </form>
                        </section>
                    </body>
                </html>
<?php
            }
            else  
            {
?>
<!DOCTYPE HTML>
<html> 
    <head>
        <meta charset="UTF-8"/>
        <title>Travel Through Galaxy</title>
        <link rel="stylesheet" type="text/css" href="../stylesheets/stylesheetfo.css" />
    </head>
    <body>
        <header class = "headerLogo"> 
<?php   if(istEingeloggt() == 1)    
        {
            if(ADMIN_ACCOUNT() == true)
            {
                echo('<p>Aufrufe: ' . $besucherzahl); 
            }
            echo('<p><a href="Profil.php" target=_blank>Profil</a></p>'); 
        }
        else {
?>
        <br> <p> <a href="../additive files ttg/Registration.php" target=_blank>Registration</a></p>
        <br> <p> <a href="../additive files ttg/Login.php" target=_blank>Login</a></p> <br> 
<?php   }  ?>
        </header>
        <nav class = "impressum">
            <a href="Index.php"><p>Startseite</p></a>
            <a href="../additive files ttg/Spiel.php"><p>Spiel</p></a>
            <a href="../additive files ttg/Scores und Referenzen.php"><p>Scores und Referenzen</p></a>
        </nav>
<?php 
    }
?>