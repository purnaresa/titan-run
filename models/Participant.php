<?php
  class Participant extends ActiveRecord\Model {
  	static $belongs_to = array(array('member'), array('category'),array('occupation'));
  	static $has_many = array(array('race_packs', 'class_name' => 'RacePack'),array('payments'),
    array('participant_shuttles'),array('shuttles', 'through'=>'participant_shuttles'));
  }
?>