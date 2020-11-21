<?php
 class Node {
   
   public $value;
   public $next;
   
   public function __construct($value){
      $this->value = $value ;
	  $this->next = null;
   }

 }
 class Stack {
   public $top;
   public $bottom;
   public $length = 0;
   
   public function peek() {
    return $this->top;
   }
   
   public function push($value){
     $newNode = new Node($value);
	 if(count($this->length) === 0){
	   $this->top = $newNode;
	   $this->bottom = $newNode;
	 }
	 else {
	 $holdingPointer = $this->top;
	 $this->top = $newNode;
	 $this->top->next = $holdingPointer;
	 }
	 return $this->length++;
   }
   
   public function pop(){
    if (!$this->top) {
      return null;
    }
    if ($this->top === $this->bottom) {
      $this->bottom = null;
    }
    $holdingPointer = $this->top;
    $this->top = $this->top->next;
    return $this->length--;
  }
 }
 
$myStack = new Stack();
$myStack->peek();
$myStack->push('google');
$myStack->push('udemy');
$myStack->push('discord');
$myStack->peek();
$myStack->pop();
//$myStack->pop();
//$myStack->pop();

print_r($myStack);


//Discord
//Udemy
//google

?>