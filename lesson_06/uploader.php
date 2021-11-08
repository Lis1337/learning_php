<?php
class Uploader
{
    public array $uploadArr;

    public function __construct(string $nameForm)
    {
        if (isset($_FILES)) {
            $this->uploadArr = $_FILES["$nameForm"];
        }
    }

    public function isUploaded(): bool
    {
        return (!$this->uploadArr['name'] == 0);
    }

    public function upload()
    {
        $name = $this->uploadArr['name'];
        if ($this->isUploaded()) {
            move_uploaded_file(
                $this->uploadArr['tmp_name'],
                __DIR__ . "/temp/$name"
            );
        }
    }
}
