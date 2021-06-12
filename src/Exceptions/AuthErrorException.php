<?php


namespace Multivis\Exceptions;


use Throwable;

class AuthErrorException extends \Exception {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        echo $this->getMessage();
    }
}