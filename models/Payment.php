<?php
class Payment extends ActiveRecord\Model { 
    static $belongs_to = array(array('voucher'),array('participant'));
  }
?>