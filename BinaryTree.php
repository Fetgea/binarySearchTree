<?php

namespace Dinar\NewClass\BinaryTreeExperiments;

class BinaryTree
{

    public $tree;
    public $head;


    public function __construct()
    {

        
    }
    /**
     * Adds element to binary tree, if tree is empty, creates it, if not empty append new element to apropriate place, according to rules of 
     * binary trees
     *
     * @param [type] $addedValue new value, added to tree
     * @return void
     */
    public function add($addedValue)
    {
        if (empty($this->head)) {
            $newHead = new BinaryTreeElement($addedValue);
            $this->head = &$newHead;
        } else {
            $this->addNewElement($this->head, $addedValue);
        }

    }
    /**
     * Adds new element to the tree
     *
     * @param BinaryTreeElement $treeElement where to add new element 
     * @param [type] $addedValue new value
     * @return void 
     */
    private function addNewElement(BinaryTreeElement $treeElement, $addedValue)
    {
        //var_dump($treeElement);
        if ($treeElement->value <= $addedValue) {
            if (empty($treeElement->rightBranch)) {
                $treeElement->rightBranch = new BinaryTreeElement($addedValue);
            } else {
                $this->addNewElement($treeElement->rightBranch, $addedValue);
            }
        } else {
            if (empty($treeElement->leftBranch)) {
                $treeElement->leftBranch = new BinaryTreeElement($addedValue);
            } else {
                $this->addNewElement($treeElement->leftBranch, $addedValue);
            }
        }
    }
    
    public function treeTraversalUsable()
    {
        echo "<pre>";
        var_dump($this->treeTraversal($this->head));
        echo "</pre>";
    }

    public function treeTraversal(BinaryTreeElement $treeElement = null)
    {
          
        if ($treeElement === null) {
            $treeElement = $this->head;
        }
        $result["value"] = $treeElement->value;
        if (!empty($treeElement->leftBranch)) {
            $result["leftBranch"] = $this->treeTraversal($treeElement->leftBranch);
        }
        if (!empty($treeElement->rightBranch)) {
            $result["rightBranch"] = $this->treeTraversal($treeElement->rightBranch);
        }
        return $result;
    }
    /**
     * Function to look for specific value in tree, return true uf value is found and null if not;
     *
     * @param [type] $valueToFind value to find in binary tree
     * @param BinaryTreeElement $treeElement starting point of search, if not provided starts from the head of the tree
     * @return void
     */
    public function containsValueTraversing($valueToFind, BinaryTreeElement $treeElement = null)
    {
        //Посмотреть еще, может попрбовать возвращать с использованием ИЛИ 
        if ($treeElement === null) {
            $treeElement = $this->head;
        }
        if (!empty($treeElement->leftBranch)) {
            $result = $this->containsValueTraversing($valueToFind, $treeElement->leftBranch);
            if ($result) {
                return true;
            }
        }
        if ($treeElement->value == $valueToFind) {
            return true;
        }
        if (!empty($treeElement->rightBranch)) {
            $result = $this->containsValueTraversing($valueToFind, $treeElement->rightBranch);
            if ($result) {
                return true;
            }
        }
        //return $result;
    }
    /**
     * Method counting number of elements in the tree
     *
     * @param BinaryTreeElement $treeElement starting element for counting, if not provided starts from the head of the tree
     * @return int Number of elements in the tree
     */
    public function countTraversing(BinaryTreeElement $treeElement = null) {
        if ($treeElement === null) {
            $treeElement = $this->head;
        }
        static $counter = 0;
        if (!empty($treeElement->leftBranch)) {
            $this->countTraversing($treeElement->leftBranch);
        }
        $counter++;     
        if (!empty($treeElement->rightBranch)) {
            $this->countTraversing($treeElement->rightBranch);
        }
        return $counter;

    }
    /**
     * Deletes element with value provided
     *
     * @param [type] $valueToDelete value of the element to delete
     * @param BinaryTreeElement $treeElement starting element of binary tree (starting point for search deletion), if not provided starts from the head of the tree
     * @return void 
     */
    public function deleteElement($valueToDelete, BinaryTreeElement $treeElement = null)
    {
        if ($treeElement === null) {
            $treeElement = $this->head;
        }
        if (!empty($treeElement->leftBranch)) {
            $result = $this->deleteElement($valueToDelete, $treeElement->leftBranch);
            if ($result === true) {
                unset($treeElement->leftBranch);
            } elseif (is_a($result, "Dinar\NewClass\BinaryTreeExperiments\BinaryTreeElement")) {
                $treeElement->leftBranch = $result;
            }
        }
        if ($treeElement->value == $valueToDelete) {
            if (empty($treeElement->leftBranch) && empty($treeElement->rightBranch)) {
                unset($treeElement->value);
                return true;
            } elseif (!empty($treeElement->leftBranch) && !empty($treeElement->rightBranch)) {
                $minimal = $this->findMin($treeElement->rightBranch);
                $result = $this->deleteElement($minimal, $treeElement->rightBranch);
                if ($result === true) {
                    unset($treeElement->rightBranch);
                }
                $treeElement->value = $minimal;
            } else {
                if (!empty($treeElement->leftBranch)) {
                    return $treeElement->leftBranch;
                }
                return $treeElement->rightBranch;
            }
        }
        if (!empty($treeElement->rightBranch)) {
            $result = $this->deleteElement($valueToDelete, $treeElement->rightBranch);
            if ($result === true) {
                unset($treeElement->rightBranch);
            } elseif (is_a($result, "Dinar\NewClass\BinaryTreeExperiments\BinaryTreeElement")) {
                $treeElement->rightBranch = $result;
            }
        }
        return;
    }
    /**
     * Function returns minimal element of binary tree
     *
     * @param BinaryTreeElement $treeElement starting element of the tree, if not provided starts from the head of the tree
     * @return void value of minimal element of the tree;
     */
    public function findMin(BinaryTreeElement $treeElement = null)
    {
        static $min = 999999999;
        if ($treeElement === null) {
            $treeElement = $this->head;
        }
        if (!empty($treeElement->leftBranch)) {
            $this->findMin($treeElement->leftBranch);
        }
        if ($treeElement->value < $min) {
            $min = $treeElement->value;
        }
        if (!empty($treeElement->rightBranch)) {
            $this->findMin($treeElement->rightBranch);
        }
        return $min;
    }
    public function bfsPublic()
    {
        return $this->bfs($this->head);
        
    }
    

    private function bfs(BinaryTreeElement $treeElement)
    {
        $queue = [];
        $values = [];
        $queue[] = $treeElement;

        while (count($queue) > 0) {
            $tempTree = array_shift($queue);
            $values[] = $tempTree->value;
            if (!empty($tempTree->leftBranch)) {
                $queue[] = $tempTree->leftBranch;
            }
            if (!empty($tempTree->rightBranch)) {
                $queue[] = $tempTree->rightBranch;
            }
        }
        return $values;
    }

    public function drawTree($treeArray)
    {
        //$result = "<div class='parent'>";
        static $level = 0;
        if ($level == 0) {
            $result = "<div class='tf-tree'><ul><li class='head'>";
            $endSuffix = "</li></ul></div>";
        } else {
            $result = "";
            $endSuffix = "";
        }
        $level++;
        foreach ($treeArray as $key => $branches) {
            switch ($key) {
                case "value":
                    $result .= "<span class='tf-nc'>" . $branches . "</span>";
                    if (!isset($treeArray["leftBranch"]) && !isset($treeArray["rightBranch"])) {
                        $result .= "";
                    }
                    break;
                case "leftBranch":
                    $result .= "<ul><li class='leftBranch'>" . $this->drawTree($branches) . "</li>";
                    if (!isset($treeArray["rightBranch"])) {
                        $result .= "<li class='rightBranch empty'><span class='tf-nc'>Empty</span></li></ul>";
                    }
                    break;
                case "rightBranch";
                    if (isset($treeArray["leftBranch"])) {
                        $result .= "<li class='rightBranch'>" . $this->drawTree($branches) . "</li></ul>";
                    } else {
                        $result .= "<ul><li class='leftBranch empty'><span class='tf-nc'>Empty</span></li><li class='rightBranch'>" . $this->drawTree($branches) . "</li></ul>";
                    }
            }
        }
        $result .= $endSuffix;
        return $result;
    }
    public function treeTraversalAnother(BinaryTreeElement $treeElement = null)
    {
        if ($treeElement === null) {
            $treeElement = $this->head;
        }
        $result[] = $treeElement->value;
        if (!empty($treeElement->leftBranch)) {
            $result[] = $this->treeTraversal($treeElement->leftBranch);
        }
        if (!empty($treeElement->rightBranch)) {
            $result[] = $this->treeTraversal($treeElement->rightBranch);
        }
        return $result;
    }

}

