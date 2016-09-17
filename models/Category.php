<?php
  class Category extends ActiveRecord\Model { 
    static $has_many = array(array('participants'),array('race_events'));
  }
?>