<?php       require('../templates/connectDB.php'); 
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
                                <form action="Index.php" method="POST">
                                    <input type="submit" value="Cookies akzeptieren" name="acceptCookie" tabindex="1">
                                    <?php
                                        if(isset($_POST['acceptCookie']))
                                        {
                                                $_SESSION['CookiesAccepted'] = true;   
                                                echo("<br><br><a class='Cookies'>Möchten Sie die Datenschutzerklärung und die AGB wirklich akzeptieren?</a>"); 
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
        <section class="Main">
            <h1>Startseite</h1>
            <p class = "einleitendegedanken">Hallo Freunde, <br>ich habe euch ein Spiel mitgebracht, welches Ihr kostenlos spielen könnt. <br></p>
            <p class = "einleitendegedanken">Es wurde von mir selbst entwickelt und designed. Falls Ihr Verbesserungsvorschläge habt, <br>
            könnt Ihr sie mir gerne mitteilen. Dazu müsst Ihr euch vorher anmelden bzw. registrieren<br>
            und anschließend könnt Ihr sie unter dem Link "News and Comments" im unteren Bereich der Startseite<br>
            verfassen und danach veröffentlichen. <br>Bitte beachte, dass die Beiträge für jeden einsichtig sind. <br></p>
            <p class = "einleitendegedanken">Das Spiel "Travel Through Galaxy" basiert auf einem universellen Konzept, das ich ebenfalls selbst konzipiert habe.<br>
            Es soll Kindern und Jugendlichen dabei helfen, die Themengebiete der Schule aufzuarbeite/verstehen zu können
            und den Zusammenhang bzw. die Nützlichkeit von ebendiesen Themen im Alltag begreifen zu können. </p>
            <p class = "einleitendegedanken">Näheres erfahrt Ihr noch auf der Seite "Spiel".</p>
        </section>
        <footer class = "ScARe">
            <table type = none>
                <tr>
                    <th> <a href="Kommunikation.php">Kommunikation</a></th>
<?php               if(istEingeloggt() == 1)
                    {
?>
                        <th> <a href="News and Comments.php">News and Comments</a></th>
<?php               }
?>
                    <th> <a href="Hilfe zu iGP.php">Hilfe</a></th>
                    <th> <a href="Impressum.php">Impressum</a></th>
                </tr>
            </table>
        </footer>
    </body>
</html>
<?php 
    }
?>      
