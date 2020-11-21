<?php
//node structure
class Node {
  public $data;
  public $next;
  public $prev;
}

class LinkedList {
  public $head;

  //constructor to create an empty LinkedList
  public function __construct(){
    $this->head = null;
  }

  //display the content of the list
  public function PrintList() {
    $temp = new Node();
    $temp = $this->head;
    if($temp != null) {
      echo "\nThe list contains: ";
      while($temp != null) {
        echo $temp->data." ";
        $temp = $temp->next;
      }
    } else {
      echo "\nThe list is empty.";
    }
  }   
};

// test the code  
//create an empty LinkedList 
$MyList = new LinkedList();

//Add first node.
$first = new Node();
$first->data = 10;
$first->next = null;
$first->prev = null;
//linking with head node
$MyList->head = $first;

//Add second node.
$second = new Node();
$second->data = 20;
$second->next = null;
//linking with first node
$second->prev = $first;
$first->next = $second;

//Add third node.
$third = new Node();
$third->data = 30;
$third->next = null;
//linking with second node
$third->prev = $second;
$second->next = $third;

//print the content of list
$MyList->PrintList();   
?>