<?php
   session_start(); 

   function istEingeloggt()
   {
       if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'] == 1) 
       {
           return 1; 
       }
       else 
       {
       return 2; 
       } 
   }
   function register($Name, $anrede, $Passwort, $EMail, $Geburtsdatum)
   {
    global $db_link;  
      
        $Name = mysqli_real_escape_string($db_link, $Name); 
        $Geburtsdatum = mysqli_real_escape_string($db_link, $Geburtsdatum); 
        $EMail = mysqli_real_escape_string($db_link, $EMail); 
        #$Passwort = md5($Passwort); 

        // Benutzer schon registriert?
        $db_res = runSQL("SELECT COUNT(*) FROM login WHERE EMail= '" . $EMail . "'"); 
        $row = mysqli_fetch_array($db_res);

        if($row['COUNT(*)'] > 0)
        {
            return 'Es gibt bereits einen Benutzer mit der angegebenen E-Mail-Adresse!'; 
        }

        $db_resname = runSQL("SELECT COUNT(*) FROM login WHERE Name= '" . $Name . "'"); 
        $rowname = mysqli_fetch_array($db_resname); 

        if($rowname['COUNT(*)'] > 0)
        {
            return 'Es gibt bereits einen Benutzer mit dem angegebenen Benutzernamen!'; 
        }

        runSQL("INSERT INTO login (Name, Anrede, Password, DateOfBirth, EMail, DateOfFirstLogin) VALUES ('" . $Name . "','" . $anrede . "','" . $Passwort . "','" . $Geburtsdatum . "', '" . $EMail . "', now())"); 
        return 'Sie haben sich erfolgreich registriert!'; 
    }

    function login($Name, $password)
    {
    global $db_link; 

        // Kein SQL-Code?
        $Name = mysqli_real_escape_string($db_link, $Name); 

        // Benutzer registriert?
        $db_res = runSQL("SELECT * FROM `login` WHERE Name='$Name' AND Password='$password'"); 
        if(mysqli_num_rows($db_res) == 0)
        {
            return 'Ungültiger Benutzername oder ungültiges Passwort!'; 
        }
        else 
        {
            $row = mysqli_fetch_array($db_res); 
            $_SESSION['eingeloggt'] = 1; 
            $_SESSION['Name'] = $row['Name']; 
            $_SESSION['Password'] = $row['Password']; 
            $_SESSION['EMail'] = $row['EMail']; 
            return 'Erfolgreich eingeloggt!'; 
        }
    }
    function logout()
    {
        $_SESSION['eingeloggt'] = '2'; 
    }
    function newArticle($messagetype, $messageHeadline, $message, $checkboxAnswer)
    {
        global $db_link; 
        $message = mysqli_real_escape_string($db_link, $message); 
        $messagetype = mysqli_real_escape_string($db_link, $messagetype); 
        $messageHeadline = mysqli_real_escape_string($db_link, $messageHeadline); 

        runSQL("INSERT INTO commentsttg (`Name`, `Messagetype`, `MessageHeadline`, `Message`, `Commenttype`, `PublishingTime`) VALUES ('" . $_SESSION['Name'] . "', '" . $messagetype . "', '" . $messageHeadline . "' , '" . $message . "', '" . $checkboxAnswer . "', now())"); 
    }
    function newNews($newstype, $NewsHeadline, $NewsMessage, $Commenttype)
    {
        global $db_link; 
        $newstype = mysqli_real_escape_string($db_link, $newstype); 
        $NewsHeadline = mysqli_real_escape_string($db_link, $NewsHeadline); 
        $NewsMessage = mysqli_real_escape_string($db_link, $NewsMessage); 
        $Commenttype = mysqli_real_escape_string($db_link, $Commenttype); 

        runSQL("INSERT INTO newsttg (`Name`, `Neuigkeitentyp`, `MessageHeadline`, `Message`, `Comments`, `PublishingTime`) VALUES ('" . $_SESSION['Name'] . "', '" . $newstype . "', '" . $NewsHeadline . "', '" . $NewsMessage . "', '" . $Commenttype . "', now())"); 
    }
    function ADMIN_ACCOUNT()
    {
    if(isset($_SESSION['Name']) && $_SESSION['Name'] == 'Tobias Hufnagel' && $_SESSION['Password'] == 'HufnagelTobiasADMIN' && $_SESSION['EMail'] == 'Hufnagel-Tobias@gmx.de' && istEingeloggt() == 1)
    {
        $_SESSION['ADMIN'] = true;
    }
    else
    {
        $_SESSION['ADMIN'] = false; 
    }
    return $_SESSION['ADMIN']; 
    }
    function date_OK($Geburtsdatum)
    {
        function check_date($date,$format,$sep)
        {    
            $pos1    = strpos($format, 'd');
            $pos2    = strpos($format, 'm');
            $pos3    = strpos($format, 'Y'); 

            $check   = explode($sep,$date);
            return checkdate($check[$pos2],$check[$pos1],$check[$pos3]);
        }
    
        if(check_date($Geburtsdatum,"dmY","."))
            {
                return true; 
            } 
        else
            {
                return false; 
            } 
    }
?>
