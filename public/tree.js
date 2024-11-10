class Node {
    constructor(value) {
        this.value = value;
        this.right = null;
        this.left = null;
    }
}


class Tree {
    constructor() {
        this.root = null;
        this.length = 0;
    }

    insert(value) {
        const node = new Node(value);

        // Check For root is null or not
        if (!this.root) {
            this.root = node;
            this.length++;
            return this;
        }

        let looping = true;
        let temp = this.root;
        while (looping) {

            if (value === temp.value) {
                break;
            }

            if (value > temp.value) {

                if (!temp.right) {
                    temp.right = node;
                    looping = false;
                } else {
                    temp = temp.right;
                }

            } else {

                if (!temp.left) {
                    temp.left = node;
                    looping = false;
                } else {
                    temp = temp.left;
                }

            }
        }

        return this;
    }


    contains(value) {
        if (!this.root) {
            return undefined;
        }

        let temp = this.root;
        while (true) {
            if (temp.value === value) {
                return temp;
            }


            if (value > temp.value) {
                temp = temp.right;
            } else {
                temp = temp.left;
            }

            if (!temp) {
                return 'not found!';
            }


        }
    }
}


let myTree = new Tree();
myTree.insert(10)
myTree.insert(20)
myTree.insert(9)
myTree.insert(30)
myTree.insert(8)
myTree.insert(5)
myTree.insert(12)


console.log(myTree.contains(9));


