<?php       
            require('../templates/Header.php');
?>
        <section class="Main">
            <h1>Scores und Referenzen</h1>
            <p>Hier kannst du dir deine Spielstände und anderen Errungenschaften im Spiel "Travel Through Galaxy" ansehen. </p>
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