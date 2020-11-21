<?php
  class Node {
      public $left;
      public $right;
      public $value;

      public function __construct($value)
      {
          $this->value = $value;
          $this->left = null;
          $this->right = null;
      }
      
      public function __toString() {

        return "$this->value";
    }

  }

  class BinarySearchTree {
      public $root;
  
      public function __construct(){
          $this->root;
      }
       
      public function insert($value) {
        $newNode = new Node($value);
        if ($this->root === null) {
          $this->root = $newNode;
        } 
        else {
          $currentNode = $this->root;
          while(true){
            if($value < $currentNode->value){
              //Left
              if(!$currentNode->left){
                $currentNode->left = $newNode;
                return $this;
              }
              $currentNode = $currentNode->left;
            } else {
              //Right
              if(!$currentNode->right){
                $currentNode->right = $newNode;
                return $this;
              } 
              $currentNode = $currentNode->right;
            }
          }
        }
      }

      public function lookup($value) {
        if (!$this->root) {
          return false;
        }
        $currentNode = $this->root;
        while($currentNode){
          if($value < $currentNode->value){
            $currentNode = $currentNode->left;
          } 
          elseif($value > $currentNode->value){
            $currentNode = $currentNode->right;
          } 
          elseif ($currentNode->value === $value) {
            return $currentNode;
          }
        }
        return null;
      }

      public function remove($value) {
        if (!$this->root) {
          return false;
        }
        $currentNode = $this->root;
        $parentNode = null;
        while($currentNode){
          if($value < $currentNode->value){
            $parentNode = $currentNode;
            $currentNode = $currentNode->left;
          } elseif($value > $currentNode->value){
            $parentNode = $currentNode;
            $currentNode = $currentNode->right;
          } elseif ($currentNode->value === $value) {
            //We have a match, get to work!
            
            //Option 1: No right child: 
            if ($currentNode->right === null) {
              if ($parentNode === null) {
                $this->root = $currentNode->left;
              } else {
                //if parent > current value, make current left child a child of parent
                if($currentNode->value < $parentNode->value) {
                  $parentNode->left = $currentNode->left;
                
                //if parent < current value, make left child a right child of parent
                } elseif($currentNode->value > $parentNode->value) {
                  $parentNode->right = $currentNode->left;
                }
              }
            
            //Option 2: Right child which doesnt have a left child
            } elseif ($currentNode->right->left === null) {
              $currentNode->right->left = $currentNode->left;
              if($parentNode === null) {
                $this->root = $currentNode->right;
              } else {                
                //if parent > current, make right child of the left the parent
                if($currentNode->value < $parentNode->value) {
                  $parentNode->left = $currentNode->right;
                
                //if parent < current, make right child a right child of the parent
                } elseif ($currentNode->value > $parentNode->value) {
                  $parentNode->right = $currentNode->right;
                }
              }
            
            //Option 3: Right child that has a left child
            } else {
              //find the Right child's left most child
              $leftmost = $currentNode->right->left;
              $leftmostParent = $currentNode->right;
              while($leftmost->left !== null) {
                $leftmostParent = $leftmost;
                $leftmost = $leftmost->left;
              }
              
              //Parent's left subtree is now leftmost's right subtree
              $leftmostParent->left = $leftmost->right;
              $leftmost->left = $currentNode->left;
              $leftmost->right = $currentNode->right;
    
              if($parentNode === null) {
                $this->root = $leftmost;
              } else {
                if($currentNode->value < $parentNode->value) {
                  $parentNode->left = $leftmost;
                } elseif($currentNode->value > $parentNode->value) {
                  $parentNode->right = $leftmost;
                }
              }
            }
          return true;
          }
        }
      }

      public function DFTPreOrder() {
        return $this->traversePreOrder($this->root, []);
      }
      public function DFTPostOrder(){
        return $this->traversePostOrder($this->root, []); 
      }
      public function DFTInOrder(){
        return $this->traverseInOrder($this->root, []);
      } 

      function traversePreOrder($node, $list){
        array_push($list, $node->value);
        if($node->left) {
            $this->traverseInOrder($node->left, $list);
          }
          if($node->right) {
            $this->traverseInOrder($node->right, $list);
          }
          return $list;
      }
      

      public function traverseInOrder($node, $list){
        if($node->left) {
          $this->traverseInOrder($node->left, $list);
        }
        array_push($list, $node->value);
        if($node->right) {
          $this->traverseInOrder($node->right, $list);
        }
        return $list;
      }
      
      function traversePostOrder($node, $list) {
        if($node->left) {
            $this->traverseInOrder($node->left, $list);
          }
          if($node->right) {
            $this->traverseInOrder($node->right, $list);
          }
          array_push($list, $node->value);
          return $list;
      }
    
  }

  $binaryTree = new BinarySearchTree();
  $binaryTree->insert(9);
  $binaryTree->insert(4);
  $binaryTree->insert(6);
  $binaryTree->insert(20);
  $binaryTree->insert(170);
  $binaryTree->insert(15);
  $binaryTree->insert(1);
  //$binaryTree->lookup(1);
  //$binaryTree->remove(170);
  $binaryTree->DFTPreOrder();
  $binaryTree->DFTInOrder();
  $binaryTree->DFTPostOrder();


  print_r($binaryTree);

  
  //   9
//  4     20
//1  6  15  170

?>