<?php
class ListNode
{
  public $val;
  public $next;
     function __construct($val)
    { 
	$this->val=$val; $this->next = null; 
	}

}

interface ListOperations
{
  public function insertNode($val, $post);
  public function deleteNode($post);
  public function printList();
  public function getNodeAt($pos);

}

class LinkedList implements ListOperations
{
  protected $pfirst; //points to the first element of the linked list
  protected $plast;//points to the last element of the linked list
  protected $NumItems; //records the number of nodes of the linked list
      function __construct()
    {
    $this->pfirst =null;
    $this->plast = null;
    $this->NumItems = 0;
}

//add node to the linkedlist

public function insertNode($val,$post)
{
$newNode = new ListNode($val);
if ($this->pfirst == null) //empty linked list
{
  $this->pfirst = $newNode;
  $this->plast = $newNode;
  $this->NumItems++;

}
else
{
if ($post == 1) //add new node to the beginning of th linked list
{
  $newNode->next =$this->pfirst;
  $this->pfirst =$newNode;
  $this->NumItems++;
}
//add new node to the middle position
else if($post>1 && $post<=$this->NumItems){
  $ta = $this->pfirst;
  for ($i = 1; $i < $post - 1; $i++) $ta = $ta->next;
  $newNode->next = $ta->next;
  $ta->next = $newNode;
  $this->NumItems++;
}
//append a new node
else if ($post == ($this->NumItems + 1))
{
  $this->plast->next = $newNode;
  $this->plast = $newNode;
  $this->NumItems++;
}
else
{
  echo "Invalid position";

}

}

}

//delete node from the linked list

public function deleteNode($post)
{
if ($this->pfirst == null) //empty linked list
{
  echo "Empty list";
  return;
}

if ($post == 1) //delete node from the beginning of the linked list
{
if ($this->NumItems == 1) //linked list has only one node
{
  $this->pfirst = null;
  $this->plast = null;
  $this->NumItems--;
}
else //linkelist has many nodes
{
  $temp = $this->pfirst;
  $this->pfirst =$this->pfirst->next;
  $temp = null;
  $this->NumItems--;
 }
}
//delete node at the middle position
//the last node also can be deleted
else if ($post > 1 && $post <= $this->NumItems)
{
  $ta = $this->pfirst;
  for ($i =1; $i < $post - 1;$i++) $ta = $ta->next;
  $temp = $ta->next;
  $ta->next = $temp->next;
  if ($temp->next == null) $this->plast = $ta;
   $temp = null;
   $this->NumItems--;
}
else
  echo "Invalid position";

}

//print list
public function printList()
{
  $ta =$this->pfirst;
  while ($ta != null)
{
  echo $ta->val."<br/>";
  $ta = $ta->next;
 }
}

//search node
public function getNodeAt($post){

$ta =$this->pfirst;
  $fNode=null;
  if ($post > 0 && $post <= $this->NumItems)
{
  for($i = 1; $i <$post; $i++) { $ta = $ta->next; }
  $fNode =$ta;
 }
  return $fNode;
 }

}

//code to test the linkedlist

$ll=new LinkedList();
$ll->insertNode(12,1);
$ll->insertNode(20,2);
$ll->insertNode(40,3);
$ll->insertNode(68,4);
$ll->deleteNode(4);
$ll->printList();
$post=2;
$fn=$ll->getNodeAt($post);
echo "The node at position ".$post." is ".$fn->val.".";


?>