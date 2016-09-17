<?php
  class RaceEvent extends ActiveRecord\Model { 
    static $belongs_to = array(array('member'), array('category'));
  }
?>