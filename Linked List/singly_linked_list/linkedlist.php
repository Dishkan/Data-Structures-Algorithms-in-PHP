<?php
//node structure
class Node {
  public $data;
  public $next;
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
    if($this->head == null) {
      $this->head = $newNode;
    } else {
      $temp = new Node();
      $temp = $this->head;
      while($temp->next != null) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
    }    
  }
  
    //Inserts a new element at the given position
  public function push_at($newElement, $position) {     
    $newNode = new Node(); 
    $newNode->data = $newElement;
    $newNode->next = null;
    if($position < 1) {
      echo "\nposition should be >= 1.";
    } else if ($position == 1) {
      $newNode->next = $this->head;
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
        $temp->next = $newNode; 

      } else {
        echo "\nThe previous node is null.";
      }       
    }
  }  
  
   public function push_ahead($newElement) {
    $newNode = new Node();
    $newNode->data = $newElement;
    $newNode->next = $this->head; 
    $this->head = $newNode;
  }
  
	public function reverse() {
	    if (!$this->head && !$this->next) {
        return $this->head;
      }
	  $first = $this->head;
      $this->next = $this->head;
      $second = $first->next;
  
      while($second) {
        $temp = $second->next;
        $second->next = $first;
        $first = $second;
        $second = $temp;
      }
  
      $this->head->next = null;
      $this->head = $first;
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
        $this->head = null;
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
}

// test the code  
$MyList = new LinkedList();

//Add three elements at the end of the list.

$MyList->push_back(10);
$MyList->push_back(20);
$MyList->push_back(30);
$MyList->push_at(100, 2);
//$MyList->push_ahead(50);
$MyList->pop_at(2);

$MyList->reverse();
$MyList->PrintList();
?>