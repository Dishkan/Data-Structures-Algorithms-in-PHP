<?php
class BinarySearchTree {
	private $_root;
	public function __construct() {
		// setup sentinal node
		$this->_root = new BinarySearchNode(null);
	}
	public function getRoot() {
		return $this->hasNode() ? $this->_root->right : null;
	}
	public function insert(BinarySearchNode $node) {
		$this->_root->insert($node);
		return $this;
	}
	public function detect(BinarySearchNode $node) {
		return $this->hasNode() ? $this->_root->detect($node) : false;
	}
	public function delete(BinarySearchNode $node) {
		return $this->hasNode() ? $this->_root->delete($node, $this->_root, 'right') : false;
	}
	public function hasNode() {
		return (bool)$this->_root->right;
	}
	public function printTree() {
		if ($this->hasNode()) {
			$current_level[] = $this->_root->right;
			$next_level = array();
			while (!empty($current_level)) {
				$node = array_shift($current_level);
				if ($node) {
					array_push($next_level, $node->left, $node->right);
					echo $node->val . ' ';
				}
				if (empty($current_level) && !empty($next_level)) {
					echo "\n";
					list($current_level, $next_level) = array($next_level, $current_level);
				}
			}
		}
	}
}

class BinarySearchNode {
	public $val;
	public $left = null;
	public $right = null;
	public function __construct($val) {
		$this->val = $val;
	}
	public function delete(BinarySearchNode $node, BinarySearchNode $parent=null, $left_right='') {
		if ($node->val > $this->val) {
			return $this->right && $this->right->delete($node, $this, 'right');
		} elseif ($node->val < $this->val) {
			return $this->left && $this->left->delete($node, $this, 'left');
		} else {
			// found my search node
			if ($this->left) {
				// promote the left node
				$parent->$left_right = $this->left;
				$this->right && $this->left->insert($this->right);
			} elseif ($this->right) {
				// promote the right node
				$parent->$left_right = $this->right;
				$this->left && $this->right->insert($this->left);
			} else {
				// leaf node
				$parent->$left_right = null;
			}
			return true;
		}
	}
	public function detect(BinarySearchNode $node) {
		if ($node->val > $this->val) {
			return $this->right && $this->right->detect($node);
		} elseif ($node->val < $this->val) {
			return $this->left && $this->left->detect($node);
		} else {
			// found the node
			return true;
		} 
	}
	public function insert(BinarySearchNode $node) {
		if ($node->val > $this->val) {
			$this->right ? $this->right->insert($node) : ($this->right = $node);
		} elseif ($node->val < $this->val) {
			$this->left ? $this->left->insert($node) : ($this->left = $node);
		} else {
			// found duplicate node
			return false;
		}
	}
}

// unit tests
$tree = new BinarySearchTree;
$tree->insert(new BinarySearchNode(20));
$tree->insert(new BinarySearchNode(22));
$tree->insert(new BinarySearchNode(14));
$tree->insert(new BinarySearchNode(16));

$tree->printTree();
var_dump($tree->delete(new BinarySearchNode(22)));
$tree->printTree();