<?php
$files_photo = $_FILES['photo'];
$name = $_FILES['photo']['name'];

if (isset($files_photo)) {
    if (0 == $files_photo['error']) {
        if (in_array($files_photo['type'], array('image/jpeg', 'image/png'))) {
            move_uploaded_file(
                $files_photo['tmp_name'],
                __DIR__ . "/photos/$name.png"
            );
            echo 'Upload successful'; ?>
<form action="show_gallery.php" method="get">
    <button>
        <label>
            Показать галлерею
        </label>
    </button>
</form>
        <?php
        }
    else {
            echo 'please, use another file format';
        }
    }
}
?>
