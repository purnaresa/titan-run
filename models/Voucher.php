<?php
  class Voucher extends ActiveRecord\Model { 
    static $has_many = array(array('payments'));
    static $belongs_to = array(array('master_voucher'));

     static $validates_presence_of = array(array('code'));
     static $validates_uniqueness_of = array(array('code'));
  }
?>