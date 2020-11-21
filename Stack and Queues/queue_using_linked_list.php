<?php
 class Node {
   
   public $value;
   public $next;
   
   public function __construct($value){
      $this->value = $value ;
	  $this->next = null;
   }

 }
 class Queue {
   public $first = null;
   public $last = null;
   public $length = 0;
   
   public function peek() {
    return $this->first;
   }
   
   public function enqueue($value){
     $newNode = new Node($value);
	 if(count($this->length) === 0){
	   $this->first = $newNode;
	   $this->last = $newNode;
	 }
	 else {
	 $this->last->next = $newNode;
	 $this->last = $newNode;
	 }
	 return $this->length++;
   }
   
   public function dequeue(){
    if (!$this->first) {
      return null;
    }
    if ($this->first === $this->last) {
      $this->last = null;
    }
    $holdingPointer = $this->first;
    $this->first = $this->first->next;
    return $this->length--;
  }
 }
 
$myQueue = new Queue();
$myQueue->peek();
$myQueue->enqueue('Joy');
$myQueue->enqueue('Matt');
$myQueue->enqueue('Pavel');
$myQueue->peek();
//$myQueue->dequeue();
//$myQueue->dequeue();
//$myQueue->dequeue();

print_r($myQueue);

?>