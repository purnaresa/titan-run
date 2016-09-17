<?php
  class Country extends ActiveRecord\Model { 
    static $has_many = array(
        array('provinces'),
        array('members'),
        array('cities', 'through' => 'provinces')
      );
  }
?>