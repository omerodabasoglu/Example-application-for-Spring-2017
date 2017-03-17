<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rych\Random\Random;

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
    * example
    */
    public function practice1() {
        dump('This is the first example.');
    }

    /*
    * example 2 using config function
    */
    public function practice2() {
        dump(config('app'));
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

}
