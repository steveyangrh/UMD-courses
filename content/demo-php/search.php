<!doctype html>
<html lang="en">
<head>
<title>Chinook Music Catalog</title>
<meta charset="utf-8">
</head>
<body>

<h1>Chinook Music Catalog: Complete Collection</h1>

<?php

$artist = htmlspecialchars($_POST['name']);

$con = mysql_connect("mysql17.000webhost.com","a8061156_db1","abc123$");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("a8061156_db1", $con);

$result = mysql_query("select Artist.Name, Album.Title, Track.Name from Artist " .
    "join Album on Album.ArtistId = Artist.ArtistId " .
    "join Track on Album.AlbumId = Track.AlbumId " .
    "where Artist.Name = \"" . $artist . "\"");

echo "<table border=\"1\">";
echo "<tr><td><b>Artist</b></td><td><b>Album</b></td><td><b>Track</b></td></tr>";
while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td>\n";
  echo "</tr>";
}
echo "</table>";

mysql_close($con);

?>

</body>
</html>

