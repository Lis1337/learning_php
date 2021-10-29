<?php

class GuestBook
{
    protected string $bookDirectory = __DIR__ . '/guest_book.txt';
    protected array $book = [];
    protected function fillBook()
    {
        if (is_readable($this->bookDirectory)) {
            $handle = fopen($this->bookDirectory, 'r');
            while (!feof($handle)) {
                array_push($this->book, fgets($handle));
            }
            fclose($handle);
        } else {return 'cannot read file';}
    }

    public function __construct()
    {
        $this->fillBook();
        if ($this->book[0] == null) {
            array_pop($this->book);
        }
    }

    public function getData(): array
    {
        return $this->book;
    }

    protected function getNumber(): int
    {
        if ($this->getData() == null) {
            return 0;
        } else {
            $arr = $this->book;
            $lastElement = $arr[array_key_last($arr)];
            $num = explode('. ', $lastElement)[0];
            return $num;
        }
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

$book = new GuestBook();

//var_dump($book->getData()[0] == null);


$book->append('for the emperor!');

print_r ($book->getData());

$book->save();

print_r ($book->getData());