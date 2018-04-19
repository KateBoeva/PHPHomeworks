<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 12.12.17
 * Time: 18:48
 */

class DayIterator implements Iterator
{
    private $index;
    private $list;

    public function __construct(array $list = null)
    {
        $this->index = 0;
        $this->list = $list;
    }

    public function current()
    {
        return $this->list[$this->index];
    }

    public function next()
    {
        ++$this->index;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->list[$this->index]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

}