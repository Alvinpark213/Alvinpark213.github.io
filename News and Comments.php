<?php     require('../templates/Header.php');
            if(istEingeloggt() != 1)
            {
                echo('<p>Diese Seite ist nur für angemeldete Benutzer zugänglich!</p>'); 
            }
            else{
?>
        <section class="Main">
            <h1>Neuigkeiten: </h1>
<?php       if(ADMIN_ACCOUNT() == true)
                {
                    echo('<p class="Registrationslink"><a href="Create your Article.php">Erstelle eine neue Neuigkeit</a></p>'); 
                }
                
                $db_res = runSQL("SELECT `ID`, `Name`, `Neuigkeitentyp`, `MessageHeadline`, `Message`, `Comments`, `PublishingTime` FROM newsttg");

                echo('<table class="profil">');
                while($row = mysqli_fetch_array($db_res))
                {
                    echo('<tr class="profil">'); 
                    if(ADMIN_ACCOUNT() == true)
                    {
                        echo('<td class="profil">ID = ' . $row['ID'] . '</td>');
                    }
                    echo('<td class="profil">' . $row['Name'] . '</td>'); 
                    echo('<td class="profil">' . $row['Neuigkeitentyp'] . '</td>'); 
                    echo('<td class="profil">' . $row['MessageHeadline'] . '</td>');
                    echo('<td class="profil">' . $row['Message'] . '</td>');
                    echo('<td class="profil">' . $row['Comments'] . '</td>');
                    echo('<td class="profil">' . $row['PublishingTime'] . '</td>'); 
                    echo('</tr>'); 
                }
                echo('</table><br>');
?>
            <h1>Nutzerbeiträge: </h1> 
            <p class="Registrationslink"><a href="Create your Article.php">Erstelle einen neuen Artikel</a></p>
<?php
                
                $db_res = runSQL("SELECT `ID`, `Name`, `Messagetype`, `MessageHeadline`, `Message`, `Commenttype`, `PublishingTime` FROM commentsttg");

                echo('<table class="profil">');
                while($row = mysqli_fetch_array($db_res))
                {
                    echo('<tr class="profil">'); 
                    if(ADMIN_ACCOUNT() == true)
                    {
                        echo('<td class="profil">ID = ' . $row['ID'] . '</td>');
                    }
                    echo('<td class="profil">' . $row['Name'] . '</td>'); 
                    echo('<td class="profil">' . $row['Messagetype'] . '</td>'); 
                    echo('<td class="profil">' . $row['MessageHeadline'] . '</td>');
                    echo('<td class="profil">' . $row['Message'] . '</td>');
                    echo('<td class="profil">' . $row['Commenttype'] . '</td>');
                    echo('<td class="profil">' . $row['PublishingTime'] . '</td>');
                    if($row['Commenttype'] == 'Kommentarsektion aktiviert für jeden.')
                    {
                        echo('<td class="profil"><input type="submit" value="Kommentieren" name="answer" tabindex="1"></td>'); 
                    }
                    echo('</tr>'); 
                }
                echo('</table><br>');
                if(ADMIN_ACCOUNT() == true) 
                {
                    
                    echo('<p class="description">Zum Löschen Artikel über ID in der Datenbank suchen.<br>'); 
                    echo('Artikel können ausschließlich in der Datenbank gelöscht werden.</p>');
                } 
?>
        </section>
<?php       }
            require('../templates/Footer.php'); ?> 