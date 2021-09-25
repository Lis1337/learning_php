<?php
include 'guest_control.php';
static $line_num = 3;
add_record_guest_book($line_num);

sleep(5);
header('Location: http://localhost:63342/learning_php/lesson_04/1_task/guest_control.php');
exit();