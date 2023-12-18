class Node:
    def __init__(self, data: int, next=None):
        self.data = data
        self.next = next
    
    def __str__(self) -> str:
        return f"data: {self.data}, next: {self.next}"


class LinkedList: 
    def __init__(self):
        self.head = None


    def append(self, new_node: Node):
        new_node.next = self.head
        self.head = new_node


    def push(self, new_node: Node):
        if self.head is None:
            self.head = new_node
            return
        last = self.head
        while(last.next):
            last = last.next
        last.next = new_node


    def insert(self, new_node: Node, index: int) -> None:
        if index == 0:
            new_node.next = self.head
            self.head = new_node
            return
        current = self.head
        for _ in range(index - 1):
            if current.next:
                current = current.next
        if current:
            new_node.next = current.next
            current.next = new_node


    def delete(self, index: int) -> int|None:
        deleted = None
        previous = None
        if index == 0:
            deleted = self.head.data
            self.head = self.head.next
            return deleted

        current = self.head
        for _ in range(index):
            if current:
                previous = current
                current = current.next

        if current:
            deleted = current.data
            previous.next = current.next

        return deleted


    def reverse(self):
        prev = None
        current = self.head
        while(current is not None):
            # next = current.next # 2
            # current.next = prev # None
            # prev = current # 1
            # current = next # 2
            current.next, prev, current = prev, current, current.next
        self.head = prev


if __name__ == "__main__":
    l = LinkedList()
    
    l.push(Node(1))
    l.append(Node(2))
    l.insert(Node(3), 1)
    print(l.head)

    l.reverse()
    print(l.head)

    print(l.delete(1))
    print(l.head)