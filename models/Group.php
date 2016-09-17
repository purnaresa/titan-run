<?php
  class Group extends ActiveRecord\Model { 
    static $validates_uniqueness_of = array(
      array('name', 'message' => 'already exist!')
    );
  }
?>