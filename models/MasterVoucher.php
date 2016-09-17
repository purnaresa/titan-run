<?php
  class MasterVoucher extends ActiveRecord\Model { 
    static $has_many = array(array('vouchers'));
  }
?>