<?php
  class Occupation extends ActiveRecord\Model {
  	static $has_many = array(array('participants'));
  }
?>