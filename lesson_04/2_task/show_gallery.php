<form action="photo.php" method="get" enctype="text/plain">
    <button type="submit">return to main page</button>
</form>

<?php
function show_gallery() {
    $dir = __DIR__ . '/photos';
    $photo_dir = new DirectoryIterator($dir);
    foreach ($photo_dir as $photo) {
        echo "<img src='$photo'>";
    }
}
show_gallery();
?>