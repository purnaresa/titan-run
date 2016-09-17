<?php
  class RaceEventv extends ActiveRecord\Model { 
    static $belongs_to = array(array('member'), array('category'));
  }
?>