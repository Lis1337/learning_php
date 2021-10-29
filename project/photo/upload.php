<?php
include '../auth/main.php';

$filesPhoto = $_FILES['photo'];
$name = $filesPhoto['name'];

if (isset($filesPhoto)) {
    if (0 == $filesPhoto['error']) {
        if (in_array($filesPhoto['type'], array('image/jpeg', 'image/png'))) {
            move_uploaded_file(
                    $filesPhoto['tmp_name'],
                    __DIR__ . "/photos/$name.png"
            );

            $logFile = __DIR__ . '../logs/log1.txt';
            if (is_writeable('log1.txt')) {
                $logText =
                    'photo: ' . $name .
                    'added by: ' . getCurrentUser() .
                    'at: ' . time('d.m.y');
                fopen($logFile, 'rw');
                fwrite($logFile, $logText);
                fclose($logFile);
            echo 'Upload successful';
            ?>

            <form action="show_gallery.php" method="get">
                <button>
                    <label>
                        Показать галлерею
                    </label>
                </button>
            </form>

            <?php
        }
        else {echo 'please, use another file format';}
        }
    }
}
?>