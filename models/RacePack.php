<?php
  class RacePack extends ActiveRecord\Model {
  	static $belongs_to = array(array('participant'),array('country'),array('city'),array('province'),array('shuttle'));
  }
?>