<?php    
          require('../templates/Header.php'); 
?>
          <section class="Main">
<?php
          if(isset($_POST['logout']))
          {
                logout(); 
                echo('<p class="loggedIN">Erfolgreich ausgeloggt!</p>'); 
          }
          else if(isset($_POST['login']))
          {
              //Auswertung
              if (empty($_POST['Name']) || empty($_POST['password']))
              {
                  echo('<p class="loggedIN">Bitte alle Felder ausfüllen!</p>'); 
              }
              else
              {
                  $erg = login($_POST['Name'], $_POST['password']); 
                  echo('<p class="loggedIN">' . $erg . '</p>'); 
                  if (ADMIN_ACCOUNT() == true)
                  {
                      echo('<p class="loggedIN">Hallo Herr Admin!</p>'); 
                  }
                  if(istEingeloggt() == 1)
                  echo('<p class="loggedIN"><a href="Profil.php" target=_blank>Hier geht es zu deinem Profil</a> <br></p>'); 
                  
              }
          }
          else{
?> 
            <br>
            <h1>Login</h1>
            <p class = 'Registrationslink'>==>  Zur <a href="Registration.php">Registration</a> geht's hier lang</p>
            <p class="description">Füllen Sie zum Einloggen die Felder aus: </p>
            <form action='Login.php' method='POST'>
                <label>Benutzername: </label>
                    <input name="Name" type='text' size="35" maxlenght="20" placeholder='Benutzername max. 20 Zeichen' tabindex='4' required></p>
                <label>Passwort: </label>
                    <input name="password" type="password" size="30"  placeholder='Passwort max. 20 Zeichen' tabindex='5' required></p>
                <p><input type='submit' name='login' value='Login'></p>
<?php       }
?>          </section>
<?php
            require('../templates/Footer.php'); ?> 