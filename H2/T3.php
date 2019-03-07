<title>T3</title>
<meta charset="UTF-8">
<h2>Valitse haluamasi aihealue</h2>
<form method="get">
	<select name="hobby[]" size="3" multiple>
		<option value="sport">Urheilu</option>
		<option value="music">Musiikki</option>
		<option value="computer">Tietokoneet</option>
	</select><br><br>
	<input type="submit" value="Tulosta linkit">
</form>


<?php
if (!isset($_GET['hobby'])) {
    echo "Et ole valinnut aihetta.";
    exit();
 }

  if (isset($_GET['hobby'])) {
     foreach($_GET['hobby'] as $arvo) {
             if ($arvo == "sport"){
                 echo "Päivää urheilun ystävä, tässäpä muutama linkki:";
                 echo "<ul><li><a href='http://www.mtv.fi/sport'/>MTV Sport</a></li>";
                 echo "<li><a href='http://yle.fi/urheilu/'/>Yle Urheilu</a></li></ul>";
             }
             if ($arvo == "music"){
                 echo "Päivää musiikin ystävä, tässäpä muutama linkki:";
                 echo "<ul><li><a href='https://www.spotify.com/fi/'/>Spotify</a></li>";
                 echo "<li><a href='https://www.youtube.com/'/>YouTube</a></li><ul>";
                 
             }
             if ($arvo == "computer"){
                 echo "Päivää tietokoneiden ystävä, tässäpä muutama linkki:";
                 echo "<ul><li><a href='https://www.gigantti.fi/'/>Gigantti</a></li>";
                 echo "<li><a href='https://www.verkkokauppa.com/fi/catalog/5a/Tietokoneet'/>Verkkokauppa.com</a></li></ul>";
             }
     }
 }
?>