class Node {
    constructor(value) {
        this.value = value;
        this.next = null;
    }
}


class Stack {
    constructor(value) {
        const node = new Node(value);
        this.top = node;
        this.length = 1;
    }

    push(value) {
        const node = new Node(value);

        // if LinkedList is empty
        if (!this.top) {
            this.top = node;
            return this.increaseLength();
        }

        // Nodel has elements
        node.next = this.top;
        this.top = node;

        return this.increaseLength();
    }

    pop() {

        if (!this.top) {
            return undefined;
        }

        const previousTop = this.top;
        this.top = previousTop.next;
        previousTop.next = null;


        this.length--;

        // if the linkedlist has one item.
        if (this.length === 0) {
            this.top = null;
        }

        return previousTop;
    }


    increaseLength() {
        this.length++;
        return this;
    }

    get(index) {
        if (index < 0 || index >= this.length) {
            return undefined;
        }

        if (index === 0) {
            return this.head;
        }

        if (index === this.length - 1) {
            return this.tail;
        }

        let temp = this.head;
        for (let i = 0; i < index; i++) {
            temp = temp.next;
        }

        return temp;
    }

    set(index, value) {
        if (index < 0 || index >= this.length) {
            return undefined;
        }

        if (index === 0) {
            this.head.value = value;
            return true;
        }

        if (index === this.length - 1) {
            this.tail.value = value;
            return true;
        }

        currentNode = this.get(index);
        currentNode.value = value;
        return true;
    }


    insert(index, value) {
        if (index < 0 || index >= this.length) {
            return undefined;
        }

        if (index === 0) {
            return this.unshift(value);
        }

        if (index === this.length) {
            return this.shift(value);
        }


        const node = new Node(value);
        previousNode = this.get(index - 1);
        node.next = previousNode.next;
        previousNode.next = node;
        this.length++;
        return true;
    }

    remove(index) {
        if (index < 0 || index >= this.length) {
            return undefined;
        }


        if (index === 0) {
            return this.shift();
        }

        if (index === this.length - 1) {
            return this.pop();
        }

        let temp = this.get(index - 1);
        node = temp.next;
        temp.next = node.next;
        node.next = null;
        this.length--;

        return node;
    }


    unshift(value) {
        const node = new Node(value);
        node.next = this.head.next;
        this.head = node
        this.length++;
        return this;
    }


    shift() {
        if (!this.head) {
            return undefined;
        }

        let temp = this.head;
        this.head = this.head.next;

        temp.next = null;
        this.length--;
        if (this.length === 0) {
            this.tail = null;
        }

        return temp;
    }


    reverse() {


        if (!this.head) {
            return undefined;
        }

        if (this.length === 1) {
            return this;
        }

        let temp = this.head;
        this.head = this.tail;
        this.tail = temp;

        let next = temp.next;
        let prev = null;

        for (let i = 0; i < this.length; i++) {
            next = temp.next;
            temp.next = prev;
            prev = temp;
            // temp = temp.next;
            temp = next;
        }

        return this;
    }


    all() {
        return this;
    }

    count() {
        return this.length;
    }
}


let myStack = new Stack(12);


myStack.push(3);
myStack.push(11);
myStack.push(10);



console.log(myStack.pop());
console.log(myStack);



