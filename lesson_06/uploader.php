<?php
class Uploader
{
    public array $uploadArr = [];

    public function __construct(string $nameForm)
    {
        if (isset($_FILES[$nameForm])) {
            $this->uploadArr = $_FILES[$nameForm];
        }
    }

    public function isUploaded(): bool
    {
        return is_uploaded_file($this->uploadArr['tmp_name']);
    }

    public function upload()
    {
        if ($this->isUploaded()) {
            if ($this->uploadArr['name'] != null) {
                $name = $this->uploadArr['name'];
            } else {$name = uniqid();}

            move_uploaded_file(
                $this->uploadArr['tmp_name'],
                __DIR__ . "/temp/$name"
            );
        }
    }
}
