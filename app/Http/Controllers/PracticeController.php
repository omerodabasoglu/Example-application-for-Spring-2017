<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rych\Random\Random;
use App\Book;
class PracticeController extends Controller
{
    /**
    * ANY (GET/POST/PUT/DELETE)
    * /practice/{n?}
    *
    * This method accepts all requests to /practice/ and
    * invokes the appropriate method.
    */
    public function index($n) {

          $method = 'practice'.$n;
          if(method_exists($this, $method))
              return $this->$method();
          else
              dd("Pratice route [{$n}] not defined");

    }

    /*
    * example 9 using config function
    */
    public function practice11() {

      # First get a book to delete
      $book = Book::find(5);

      if(!$book) {
        dump('Did not delete- Book not found.');
      }
      else {
        $book->delete();
        dump('Deletion complete; check the database to see if it worked...');
      }
          }



    /*
    * example 9 using config function
    */
    public function practice9() {

        # First get a book to update
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        if(!$book) {
            dump("Book not found, can't update.");
        }
        else {

            # Change some properties
            $book->title = 'The Really Great Gatsby';
            $book->published = '2025';

            # Save the changes
            $book->save();

            dump('Update complete; check the database to confirm the update worked.');
        }
    }

    /*
    * example 8 using config function
    */
    public function practice8() {


        $books = Book::where('title', 'LIKE', '%Harry Potter%')
            ->orWhere('published', '>=', 1800)
            ->orderBy('created_at', 'desc')
            ->get();

        dump($books->toArray());
    }


    /*
    * example 7 using config function
    */
    public function practice7() {

        $book = new Book();

        $books = $book->all();

        dump($books->toArray());
    }

    /*
    * example 2 using config function
    */
    public function practice6() {

        $newBook = new Book();

        $newBook->title = 'Harry Potter and the Sorcerer\'s Stone';
        $newBook->author = 'J.K. Rowling';
        $newBook->published = 1997;
        $newBook->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $newBook->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

        $newBook->save();

        dump($newBook->toArray());


    }


    /*
    * Rych example
    */
    public function practice3() {
        $random = new Random();

        // Generate a 16-byte string of random raw data
        $randomBytes = $random->getRandomBytes(16);
        dump($randomBytes);

        // Get a random integer between 1 and 100
        $randomNumber = $random->getRandomInteger();
        dump($randomNumber);
        // Get a random 8-character string using the
        // character set A-Za-z0-9./
        $randomString = $random->getRandomString(8);
        dump($randomString);
    }

    /*
    * example 2 using config function
    */
    public function practice2() {
        dump(config('app'));
    }

    /*
    * example
    */
    public function practice1() {
        dump('This is the first example.');
    }

}
