<?php     
          require('../templates/Header.php'); 
?>          <section class ="Main">
<?php
          if(isset($_POST['submit']))
          {
                  if(empty($_POST['Name']) || empty($_POST['anrede']) || empty($_POST['Passwort']) || empty($_POST['EMail']) || empty($_POST['Geburtsdatum']))
                  {
                        echo('<p>Bitte alle Felder ausfüllen! </p>'); 
                  }
                  else if(!filter_var($_POST['EMail'], FILTER_VALIDATE_EMAIL))
                  {
                        echo('<p>Die angegebene E-Mail-Adresse ist ungültig!</p>'); 
                  }
                  else if(!date_OK($_POST['Geburtsdatum']) == true)
                  {
                      echo('Datum ungültig'); 
                  }
                  else
                  {
                        $ergDBA = register($_POST['Name'], $_POST['anrede'], $_POST['Passwort'], $_POST['EMail'], $_POST['Geburtsdatum']);
                        echo('<p>' . $ergDBA . '</p>');  
                  }
          }
          else 
          {
?>
            <h1>Registration</h1>
            <p class = 'Registrationslink'>==>  Zum <a href="Login.php">Login</a> geht's hier lang</p>
            <p class="description">Wenn Sie sich bei uns registrieren möchten, füllen Sie bitte die folgenden Felder aus. <br> 
            Bitte beachten Sie, dass Sie mit folgender Anmeldung unsere Datenschutzrichtlinien akzeptieren und vollständig gelesen haben sollten.<br>
            Wir bitten Sie ebenfalls, Ihre vollständigen und korrekten Daten einzugeben und mögliche Verwechslungen zu vermeiden. <br></p>
            <p>Das Anmeldungsformular:  </p>
            <form action='Registration.php' method='POST'>
            <label>Benutzername: </label>
                <input name="Name" type='text' size="35" maxlenght="20" placeholder='Benutzername max. 20 Zeichen' tabindex='4' required><br>
                <p class="description">Bitte geben Sie einen sinnvollen Benutzernamen ein, da jeder diesen sehen kann.</p>
            <label>Anrede: </label>
                <select name="anrede" tabindex='5'>
                  <option value="Herr">Herr</option>
                  <option value="Frau">Frau</option>
                </select> <br>
                <p class="description">Sie benötigen diese Angabe, um später mit Ihrem Namen angesprochen zu werden.</p>
            <label>Passwort: </label>
                <input name="Passwort" type="password" size="30" maxlength="20" placeholder='Passwort max. 20 Zeichen' tabindex='6' required><br>
                <p class="description">Bitte geben Sie ein sinnvolles Passwort an, welches aus genügend abwechslungsreichen Zahlen und Buchstaben besteht. <br>Bitte beachten Sie, dass anderweitige Zeichen ihr Passwort noch sicherer machen können. </p>
            <label>E-Mail: </label>
                <input name="EMail" type="text" size="65" maxlength="150" placeholder='E-Mail max. 150 Zeichen' tabindex='7' required><br>
                <p class="description">Bitte geben Sie eine gültige E-Mail an, um geschützte Informationen auch selbst beziehen und darauf zugreifen zu können. </p>
            <label>Geburtsdatum: </label>
                <input name="Geburtsdatum" type="text" size="25" maxlength="20" placeholder='Geburtsdatum max. 20 Zeichen' tabindex='8' required><br>
                <p class="description">Bitte geben Sie ein gültiges Geburtsdatum an.</p>
                <p><input type='submit' name='submit' value='Registrieren'></p>
        	</form>
<?php   
        }
?>          </section>
<?php
        require('../templates/Footer.php'); ?> 