<?php

class Node
{
    public int $data;
    public Node|null $next;

    public function __construct(int $data) {
        $this->data = $data;
        $this->next = NULL;
    }
}

class LindedList
{
    public Node|null $head;

    public function __construct() {
        $this->head = NULL;
    }

    public function append(Node $newNode): void
    {
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    public function push(Node $newNode): void
    {
        if ($this->head == NULL) {
            $this->head = $newNode;
            return;
        }

        $current = $this->head;
        while ($current->next != NULL) {
            $current = $current->next;
        }
        $current->next = $newNode;
    }

    public function instert(Node $newNode, int $index): void
    {
        if ($index === 0) {
            $newNode->next = $this->head;
            $this->head = $newNode;
            return;
        }

        $current = $this->head;
        for ($i = 0; $i < $index - 1; $i++) {
            if ($current->next !== NULL) {
                $current = $current->next;
            }
        }

        if ($current !== NULL) {
            $newNode->next = $current->next;
            $current->next = $newNode;
        }
    }

    public function delete(int $index): int|null
    {
        $deleted = NULL;
        if ($index === 0) {
            $deleted = $this->head->data;
            $this->head = $this->head->next;
            return $deleted;
        }

        $previous = NULL;
        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            if ($current->next !== NULL) {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current !== NULL) {
            $deleted = $current->data;
            $previous->next = $current->next;
        }

        return $deleted;
    }

    public function reverse(): void
    {
        $current = $this->head;
        $prev = NULL;
        $next = NULL;

        while ($current !== NULL) {
            // $next = $current->next;
            // $current->next = $prev;
            // $prev = $current;
            // $current = $next;
            [$current->next, $prev, $current] = [$prev, $current, $current->next];
        }

        $this->head = $prev;
    }
}

$l = new LindedList();

$l->push(new Node(1));
$l->append(new Node(2));
$l->instert(new Node(3), 1);
var_dump($l);

$l->reverse();
var_dump($l);

print($l->delete(1));
var_dump($l);