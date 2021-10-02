<?php       
            require('../templates/Header.php');
?>
        <section class="Main">
            <h1>Spiel</h1>
            <p>Hier kannst du dir die Applikation 'Travel Through Galaxy' herunterladen. <br> Zur Auswahl stehen dir drei Optionen: </p><br>
            <table width=40% height=20% border="1" align="center" bordercolor="black">
                <tr> 
                <th height=50 align="center" bgcolor="green">Demo-Version</th>
                <th align="center" bgcolor="green">Vollversion</th>
                </tr>
                <tr>
                <td height=30 align="center"><a href="#" class="hovertext">32-Bit-Version</a></td>
                <td align="center" rowspan="2"><a href="#" class="hovertext">64-Bit-Version</a></td>
                </tr><tr>
                <td height=30 align="center"><a href="#" class="hovertext">64-Bit-Version</a></td>
                </tr>
            </table>
            <br><br>
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