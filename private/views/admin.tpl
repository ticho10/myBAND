<h2>Album Toevoegen</h2>
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
    <label></label><input type="file" name="albumimage"><br>
    <input type="text" name="naamalbum" placeholder="naamalbum"><br><br>
    <textarea name="albumsongs" cols="20" rows="10" placeholder="1.Nummer 1&#10;2.Nummer 2&#10;etc."></textarea>
    <input type="submit" name="submitAlbum" value="Toevoegen">
</form>