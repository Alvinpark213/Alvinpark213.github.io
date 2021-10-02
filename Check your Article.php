<?php    require('../templates/Header.php'); 
        if(istEingeloggt() == 2)
        {
             echo('<p>Diese Seite ist nur für angemeldete Benutzer zugänglich!</p>'); 
        }
        else
        {
?>
            <section class="Main">
                <h1>Feedback und Neuigkeiten</h1>
<?php
            if (isset($_POST['messagetype']) && isset($_POST['MessageHeadline']) && isset($_POST['message']) && isset($_POST['checkboxAnswer']))
            {
                echo "<p class='articles'> Nachrichtentyp: " .  $_POST['messagetype'] . "</p>"; 
                echo "<p class='articles'> Betreff: " . $_POST['MessageHeadline'] . "<p>"; 
                echo "<p class='articles'> Nachricht: " . "</p>" . "<p class='articles'>" . $_POST['message'] . "</p>"; 
                echo "<p class='articles'>" . $_POST['checkboxAnswer'] . "</p>"; 
                newArticle($_POST['messagetype'], $_POST['MessageHeadline'], $_POST['message'], $_POST['checkboxAnswer']); 

                if (!isset($_POST['submitmessage']) && !isset($_POST['deletemessage']))
                    {
?>
                    <form action="Check your Article.php" method="POST" autocomplete>
                    <label>Beitrag: </label><br>
                    <label> Veröffentlichen: 
                    <input type="submit" value="Beitrag abschicken" name="submitmessage" tabindex="1"></label><br>
                    <label> Löschen:
                    <input type="submit" value="Beitrag löschen" name="deletemessage" tabindex="2"></label>
                    </form>
<?php
                    }
            }
            
                if(isset($_POST['submitmessage']))
                    {
                        echo('<p>Dein Beitrag wurde abgeschickt. <br>Du kannst ihn dir auf deiner Profilseite oder der "News and Comments"-Seite ansehen</p>'); 
                    }
                else if(isset($_POST['deletemessage']))
                    {
                    runSQL("DELETE FROM `commentsttg` ORDER BY ID DESC LIMIT 1"); 
                    echo('<p>Dein Beitrag wurde gelöscht.'); 
                    }
            if (isset($_POST['newstype']) && isset($_POST['NewsHeadline']) && isset($_POST['NewsMessage']) && isset($_POST['Commenttype']))
                {
                    echo "<p class='articles'> Neuigkeitentyp: " .  $_POST['newstype'] . "</p>"; 
                    echo "<p class='articles'> Betreff: " . "</p>" . "<p class='articles'>" . $_POST['NewsHeadline'] . "</p>"; 
                    echo "<p class='articles'> Neuigkeit: " . "</p>" . "<p class='articles'>" . $_POST['NewsMessage'] . "</p>"; 
                    echo "<p class='articles'>Kommentare aktiviert für " . $_POST['Commenttype'] . "</p>"; 
                    newNews($_POST['newstype'], $_POST['NewsHeadline'], $_POST['NewsMessage'], $_POST['Commenttype']); 
        
                    if (!isset($_POST['submitNEWS']) && !isset($_POST['deleteNEWS']))
                        {
?>
                        <form action="Check your Article.php" method="POST" autocomplete>
                        <label>Neuigkeit: </label><br>
                        <label> Veröffentlichen: 
                        <input type="submit" value="Neuigkeit abschicken" name="submitNEWS" tabindex="1"></label><br>
                        <label> Löschen:
                        <input type="submit" value="Neuigkeit löschen" name="deleteNEWS" tabindex="2"></label>
                        </form>
<?php
                        }
                }
                    
                    if(isset($_POST['submitNEWS']))
                        {
                            echo('<p>Deine Neuigkeit wurde abgeschickt. <br>Du kannst sie dir auf deiner Profilseite oder der "News and Comments"-Seite ansehen</p>'); 
                        }
                    else if(isset($_POST['deleteNEWS']))
                        {
                        runSQL("DELETE FROM `newsttg` ORDER BY ID DESC LIMIT 1"); 
                        echo('<p>Deine Neuigkeit wurde gelöscht.'); 
                        }
?>
        </section>
<?php       
        }
            
        require('../templates/Footer.php'); ?> 
        
