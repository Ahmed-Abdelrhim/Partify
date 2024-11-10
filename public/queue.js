class Node {
    constructor(value) {
        this.value = value;
        this.next = null;
    }
}


class Queue {
    constructor(value) {
        const node = new Node(value);
        this.first = node;
        this.last = node;
        this.length = 1;
    }

    enqueue(value) {
        const node = new Node(value);

        // If Queue is empty
        if (!this.first) {
            this.first = node;
            this.last = node;
            return this.increaseLength();
        }

        // Queue has elements
        this.last.next = node;
        this.last = node;

        return this.increaseLength();
    }

    dequeue() {
        if (!this.first) {
            return undefined;
        }

        let previousFirst = this.first;
        if (this.length === 1) {
            this.first = null;
            this.last = null;
            this.length--;
            return previousFirst;
        }


        this.first = this.first.next;
        previousFirst.next = null;
        this.length--;
        return previousFirst;
    }


    increaseLength() {
        this.length++;
        return this;
    }

    count() {
        return this.length;
    }
}


let myQueue = new Queue(10);

myQueue.enqueue(11);
myQueue.enqueue(3);
myQueue.enqueue(12);

console.log(myQueue.dequeue());
console.log(myQueue.dequeue());
console.log(myQueue.dequeue());
console.log(myQueue.dequeue());
console.log(myQueue.dequeue());

console.log(myQueue);


