<?php

class Book {

    // Add properties as Private
    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    private $name;
    private $borrowedBooks = array();

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function borrowBook(Book $book) {
        if ($book->borrowBook()) {
            $this->borrowedBooks[] = $book;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook(Book $book) {
        $key = array_search($book, $this->borrowedBooks);
        if ($key !== false) {
            unset($this->borrowedBooks[$key]);
            $book->returnBook();
            return true;
        } else {
            return false;
        }
    }

    public function getBorrowedBooks() {
        return $this->borrowedBooks;
    }
}

// usage

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Apply Borrow book method to each member
$member1->borrowBook($book1);
$member2->borrowBook($book2);

// Print Available Copies with their names:
echo "Available Copies of '".$book1->getTitle()."': ".$book1->getAvailableCopies()."\n\n";
echo "Available Copies of '".$book2->getTitle()."': ".$book2->getAvailableCopies();

?>