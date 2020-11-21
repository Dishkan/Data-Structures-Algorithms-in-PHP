<?php
//node structure
class Node {
  public $data;
  public $next;
  public $prev;
}

class LinkedList {
  public $head;

  public function __construct(){
    $this->head = null;
  }
  
  //Add new element at the end of the list
  public function push_back($newElement) {
    $newNode = new Node();
    $newNode->data = $newElement;
    $newNode->next = null;
    $newNode->prev = null; 
    if($this->head == null) {
      $this->head = $newNode;
    } else {
      $temp = new Node();
      $temp = $this->head;
      while($temp->next != null) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
      $newNode->prev = $temp;
    }    
  }

  //Inserts a new element at the given position
  public function push_at($newElement, $position) {     
    $newNode = new Node(); 
    $newNode->data = $newElement;
    $newNode->next = null;
    $newNode->prev = null;
    if($position < 1) {
      echo "\nposition should be >= 1.";
    } else if ($position == 1) {
      $newNode->next = $this->head;
      $this->head->prev = $newNode;
      $this->head = $newNode;
    } else {
      $temp = new Node();
      $temp = $this->head;
      for($i = 1; $i < $position-1; $i++) {
        if($temp != null) {
          $temp = $temp->next;
        }
      }
      if($temp != null) {
        $newNode->next = $temp->next;
        $newNode->prev = $temp;
        $temp->next = $newNode; 
        if($newNode->next != null)
          $newNode->next->prev = $newNode; 
      } else {
        echo "\nThe previous node is null.";
      }       
    }
  }  
  
  //Delete an element at the given position
  public function pop_at($position) {     
    if($position < 1) {
      echo "\nposition should be >= 1.";
    } else if ($position == 1 && $this->head != null) {
      $nodeToDelete = $this->head;
      $this->head = $this->head->next;
      $nodeToDelete = null;
      if ($this->head != null)
        $this->head->prev = null;
    } else {
      $temp = new Node();
      $temp = $this->head;
      for($i = 1; $i < $position-1; $i++) {
        if($temp != null) {
          $temp = $temp->next;
        }
      }
      if($temp != null && $temp->next != null) {
        $nodeToDelete = $temp->next;
        $temp->next = $temp->next->next;
        $nodeToDelete = null; 
      } else {
        echo "\nThe node is already null.";
      }       
    }
  } 
  
    //Delete first node of the list
  public function pop_front() {
    if($this->head != null) {
      $temp = $this->head;
      $this->head = $this->head->next;
      $temp = null;
      if($this->head != null) 
        $this->head->prev = null;        
    }
  }
  
    //Delete last node of the list
  public function pop_back() {
    if($this->head != null) {
      if($this->head->next == null) {
        $this->head = null;
      } else {
        $temp = new Node();
        $temp = $this->head;
        while($temp->next->next != null)
          $temp = $temp->next;
        $lastNode = $temp->next;
        $temp->next = null; 
        $lastNode = null;
      }
    }
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
$MyList = new LinkedList();

//Add three elements in the list.
$MyList->push_back(10);
$MyList->push_back(20);
$MyList->push_back(30);
$MyList->PrintList();

echo "<br />";
//Insert an element at position 2
$MyList->push_at(100, 2);
$MyList->PrintList();

echo "<br />";

//Insert an element at position 1
$MyList->push_at(200, 1);
$MyList->pop_at(2);
$MyList->PrintList();  
?>