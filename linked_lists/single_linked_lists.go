package main

import "fmt"

type Node struct {
	data int
	next *Node
}

type LinkedList struct {
	head *Node
}

func (l *LinkedList) Append(newNode Node) {
	newNode.next = l.head
	l.head = &newNode
}

func (l *LinkedList) Push(newNode Node) {
	if l.head == nil {
		l.head = &newNode
		return
	}
	last := l.head
	for last.next != nil {
		last = last.next
	}
	last.next = &newNode
}

func (l *LinkedList) Insert(newNode Node, index int) {
	if index == 0 {
		newNode.next = l.head
		l.head = &newNode
		return
	}
	current := l.head
	for i := 0; current.next != nil && i < index; i++ {
		current = current.next
	}
	if current != nil {
		newNode.next = current.next
		current.next = &newNode
	}
}

func (l *LinkedList) Delete(index int) int {
	var deleted int;
	if index == 0 {
		deleted = l.head.data
		l.head = l.head.next
		fmt.Println(deleted)
		return deleted
	}

	var previous *Node
	current := l.head
	for i := 0; current.next != nil && i < index; i++ {
		previous = current
		current = current.next
	}
	if current != nil {
		deleted = current.next.data
		previous.next = current.next
	}

	return deleted
}

func (l *LinkedList) Reverse() {
	var previous *Node
	current := l.head
	for current != nil {
		next := current.next
		current.next = previous
		previous = current
		current = next
	}
	l.head = previous
}

func (l *LinkedList) Print() {
	node := l.head
	for node != nil {
		fmt.Printf("data: %d, next: %o | ", node.data, node.next)
		node = node.next
	}
	fmt.Println("\n")
}

func main() {
	var l LinkedList
	l.Push(Node{data: 1})
	l.Append(Node{data: 2})
	l.Insert(Node{data: 3}, 1)
	l.Print()

	l.Reverse()
	l.Print()

	del := l.Delete(1)
	fmt.Println(del)
	l.Print()
}