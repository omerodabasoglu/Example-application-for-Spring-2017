<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
    *GET
    * /books
    */
    public function index() {
        return 'View all the books ...';
    }

    /**
    *GET
    * /books/{title?}
    */
    public function show($title = null) {
        return view('books.show')->with([
          'title' => $title,
        ]);
    }

    # app/Http/Controllers/BookController.php

    /**
	* GET
    * /search
	*/
    public function search() {
        return view('books.search');
    }

}
