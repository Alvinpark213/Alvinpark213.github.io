<?php   
        require('../templates/Header.php');
?>
        <section class="Main">
              <h1>Profil</h1>
              <div>
<?php
        if(istEingeloggt() == 1)
        {
                      echo('<p class = "profil">Hallo ' . $_SESSION['Name'] . '...</p>'); 
?>
                      <p class = "profil">- hier können Sie Ihre Account-Daten einsehen: <p>
                <br>   Benutzername:
<?php                 echo($_SESSION['Name'] . '<br>'); 
?>              <br>   Passwort:
<?php                 echo($_SESSION['Password'] .'<br>'); 
?>              <br>   E-Mail:
<?php                 echo($_SESSION['EMail'] . '<br>'); 
?>              <br>   
<?php                  $db_res = runSQL("SELECT `DateOfFirstLogin` FROM `login` WHERE Name='" . $_SESSION['Name'] . "'"); 
                        if(isset($db_res))
                        {
                                $timezone = date_default_timezone_get(); 
                                echo('Sie befinden sich in der ' . $timezone . ' Zeitzone.<br><br> '); 
                                echo('Erstanmeldung: '); 
                                while($row = mysqli_fetch_array($db_res))
                                {
                                        echo($row['DateOfFirstLogin'] . '<br>'); 
                                }
                        }
                        echo('<p>Zur Änderung Ihrer Account-Daten Webseitenbetreiber kontaktieren!</p>')
?>
                      <p class = "profil"><a href="Create your Article.php" target=_blank>- hier kannst du einen neuen Artikel verfassen.</a></p>
                      <p class = "profil"><a href="News and Comments.php" target=_blank>- hier kannst du dir alle Beiträge ansehen.</a></p>
                      
<?php     
                $db_res = runSQL("SELECT `Messagetype`, `MessageHeadline`, `Message`, `PublishingTime`, `Commenttype` FROM commentsttg WHERE Name='" . $_SESSION['Name'] . "'"); 

                if(isset($db_res))
                {
                        echo('<p class = "profil">- dies sind Ihre veröffentlichten Beiträge: </p>'); 
                        echo('<table class="profil">');
                        while($row = mysqli_fetch_array($db_res))
                        {
                            echo('<tr class="profil">'); 
                            echo('<td class="profil">' . $row['Messagetype'] . '</td>');  
                            echo('<td class="profil">' . $row['MessageHeadline'] . '</td>');
                            echo('<td class="profil">' . $row['Message'] . '</td>');
                            echo('<td class="profil">' . $row['Commenttype'] . '</td>');
                            echo('<td class="profil">' . $row['PublishingTime'] . '</td>'); 
                            echo('</tr>'); 
                        }
                        echo('</table>');
                }
                if(ADMIN_ACCOUNT() == true)
                {
                        $db_res = runSQL("SELECT `Neuigkeitentyp`, `MessageHeadline`, `Message`, `Comments`, `PublishingTime` FROM newsttg WHERE Name='" . $_SESSION['Name'] . "'"); 

                        if(isset($db_res))
                        {
                                echo('<p class = "profil">- dies sind deine veröffentlichten Neuigkeiten: </p>'); 
                                echo('<table class="profil">');
                                while($row = mysqli_fetch_array($db_res))
                                {
                                        echo('<tr class="profil">'); 
                                        echo('<td class="profil">' . $row['Neuigkeitentyp'] . '</td>'); 
                                        echo('<td class="profil">' . $row['MessageHeadline'] . '</td>');
                                        echo('<td class="profil">' . $row['Message'] . '</td>');
                                        echo('<td class="profil">' . $row['Comments'] . '</td>');
                                        echo('<td class="profil">' . $row['PublishingTime'] . '</td>'); 
                                        echo('</tr>'); 
                                }
                                echo('</table>');
                        }       
                }
                
?>      <p>
                <form action="Login.php" method="POST">
                        <input type="submit" name="logout" value="Logout">
                </form>
        </p>
<?php
        } 
        else 
        {
                echo('<p>Diese Seite ist nur für eingeloggte Benuzter zugänglich!</p>'); 
        }
        ?>
        </div>
        </section>
<?php   require('../templates/Footer.php'); ?> 