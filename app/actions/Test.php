<?php


class Test implements Iterator
{
    public $position = 0;
    public $tableau;
    const MAX = 5;

    public function __construct($tableau)
    {
      $this->tableau = $tableau;
    }

    public function current()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
           return $this->position<=self::MAX;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function reverse()
    {
        $this->tableau = array_reverse($this->tableau);
        $this->rewind();
    }

}

?>
