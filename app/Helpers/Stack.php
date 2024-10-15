<?php
namespace App\Helpers;

class Stack
{
    private $items = [];

    public function push($item)
    {
        $this->items[] = $item;
    }

    public function pop()
    {
        if (empty($this->items)) {
            throw new \UnderflowException('The stack is empty');
        }
        return array_pop($this->items);
    }

    public function isEmpty()
    {
        return empty($this->items);
    }

    public function count()
    {
        return count($this->items);
    }
}
