<?php
class GuestBook
{
    protected string $bookDirectory = __DIR__ . '/guest_book.txt';
    protected array $book = [];
    public function __construct()
    {
        $this->fillBook();
        if ($this->book != null && array_key_first($this->book) == null) {
            array_pop($this->book);
        }
    }

    protected function fillBook()
    {
        if (is_readable($this->bookDirectory)) {
            $handle = fopen($this->bookDirectory, 'r');
            while (!feof($handle)) {
                array_push($this->book, fgets($handle));
            }
            fclose($handle);
        } else {
            echo 'cannot read file';
            die;
        }
    }

    protected function getNumber(): int
    {
        if ($this->getData() == null) {
            return 0;
        } else {
            $arr = $this->book;
            $lastElement = $arr[array_key_last($arr)];
            $lastString = explode('. ', $lastElement);
            return $lastString[array_key_first($lastString)];
        }
    }

    public function getData(): array
    {
        return $this->book;
    }

    public function append($text)
    {
        array_push($this->book, $this->getNumber() + 1 . '. ' . $text);
    }

    public function save()
    {
        $bookSeparated = implode("\n", $this->book);
        file_put_contents($this->bookDirectory, $bookSeparated);
    }
}
