<?php
  class Company extends ActiveRecord\Model { 
    static $has_many = array(array('members'));
  }
?>