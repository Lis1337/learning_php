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
            echo 'Upload successful';
        } else {
            echo 'please, use another file format';
        }
    }
}
/*array(1)
{ ["photo"]=> array(5)
{ ["name"]=> string(5) "1.png" ["type"]=> string(9) "image/png" ["tmp_name"]=> string(14)
 "/tmp/phpKM9ySR" ["error"]=> int(0) ["size"]=> int(76436) }
} */