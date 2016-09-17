<?php
  class City extends ActiveRecord\Model { 
    static $belongs_to = array(array('province'));
    static $has_many=array(array('members'),array('race_packs'));
  }
?>