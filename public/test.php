<?php

class Test {

    protected static $item;

    public function __construct($id) {
        $this->test1 = $id;
        $this->test2 = $id + 100;
    }

    static function get($id) {
        if (!self::$item) {
            self::$item = new self($id);
        }
        return self::$item;
    }

}

print_r(Test::get(99));
