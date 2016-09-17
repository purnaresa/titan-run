<?php
  class Province extends ActiveRecord\Model {
    static $has_many = array(array('cities'),array('members'),array('race_packs'));
    static $belongs_to = array(array('country'));
  }
?>
