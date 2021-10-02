<?php    require('../templates/Header.php');
          if(istEingeloggt() == 2)
          {
            echo('<p>Diese Seite ist nur für angemeldete Benutzer zugänglich!</p>'); 
          }
          else{
            echo('<section class="Main">'); 
            echo('<h1>Feedback und Neuigkeiten</h1>'); 
            if(ADMIN_ACCOUNT() == true)
            {
              echo('<div name="ADMIN">'); 
                echo('<p> Hallo Admin ' . $_SESSION['Name'] . '!</p>'); 
?>
                <p class="description">Erstelle entweder eine Neuigkeit oder scrolle ein wenig hinunter für einen Nutzerbeitrag.</p>
                <h1>Neuigkeiten: </h1>
                <p class="description"> Hier kannst du eine Neuigkeit erstellen: </p>
                <form action="Check your Article.php" method="POST" autocomplete>
                <label>Dein Nachrichtentyp: </label>
                  <select name="newstype" tabindex="1">
                    <option value="Ticketinformation">Ticketinformation</option>
                    <option value="Webseiteninformation">Webseiteninformation</option>
                    <option value="TTGInformation">Spieleinformation</option>
                    <option value="Bewerbungsphase">Bewerbung</option>
                    <option value="Warnings">Warnungen</option>
                    <option value="Others">Anderes</option>
                  </select><br>
                  <label>Dein Betreff: </label><br>
                    <textarea name="NewsHeadline" type="text" rows="1" cols="85" maxlength="100" tabindex="2" placeholder="Dein Betreff" required></textarea><br>
                    <label>Deine Neuigkeit: </label><br>
                    <textarea name="NewsMessage" type="text" rows="7" cols="85" maxlength="500" tabindex="3" placeholder="Deine Neuigkeit" required></textarea><br>
                    <label>Kommentare aktivieren für...
                  <select name="Commenttype" tabindex="5">
                    <option value="jeden">jeden.</option>
                    <option value="niemanden">niemanden.</option>
                    <option value="Angemeldete">angemeldete Nutzer.</option></select></label><br><br>
                  <input type="submit" value="Neuigkeit abschicken" name="submitid" tabindex="6"><input type="reset" value="Neuigkeit löschen" name="resetid" tabindex="7">
                  </form> 
            </div>
            </section>
            <section class="Main"> 
            <h1 class="Userarticle">Nutzerbeitrag: </h1>
                
<?php
            }
?>
              <div name="USER">
                  <p class="description">Wenn irgendwelche Fragen bzw. Anregungen auftreten, könnt ihr hier eine öffentliche Nachricht verfassen: </p>
                  <form action="Check your Article.php" method="POST" autocomplete>
                  <label>Dein Nachrichtentyp: 
                      <select name="messagetype">
                        <option value="Feedback">Feedback </option>
                        <option value="Bugreport">Bugreport</option>
                        <option value="Others">Others</option>
                      </select></label><br>
                      <label>Dein Betreff: </label><br>
                        <textarea name="MessageHeadline" type="text" rows="1" cols="85" maxlength="100" tabindex="3" placeholder="Dein Betreff" required></textarea><br>
                        <p class="description">Bitte verwenden Sie keine Anführungszeichen(",',`,´).</p>
                      <label>Deine Nachricht: </label><br>
                        <textarea name="message" type="text" rows="7" cols="85" maxlength="500" tabindex="4" placeholder="Deine Nachricht" required></textarea><br>
                        <p class="description">Bitte verwenden Sie keine Anführungszeichen(",',`,´).</p>
                        <label>Kommentare aktivieren: 
                        <input type="checkbox" name="checkboxAnswer" value="Kommentarsektion aktiviert für jeden." tabindex="4"> </label><br>
                        <label>Kommentare deaktivieren: 
                        <input type="checkbox" name="checkboxAnswer" value="Kommentarsektion deaktiviert für jeden." tabindex="5" checked> </label><br>
                        <label>Kommentare nur für angemeldete Benutzer aktivieren: 
                        <input type="checkbox" name="checkboxAnswer" value="Kommentarsektion nur für angemeldete Benutzer aktiviert." tabindex="6"> </label><br>
                        <label><input type="submit" value="Beitrag abschicken" name="submitid" tabindex="7"> <input type="reset" value="Nachricht löschen" name="resetid" tabindex="8"></p>
                  </form>
              </div>
          </section>

<?php     
          }
          require('../templates/Footer.php'); ?>