<?php
  class Shuttle extends ActiveRecord\Model {
  	static $has_many = array(array('participant_shuttles'),array('member_shuttles'),array('race_packs', 'class_name'=>'RacePack'));
  }
?>