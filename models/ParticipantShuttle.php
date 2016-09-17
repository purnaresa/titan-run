<?php 
    class ParticipantShuttle extends ActiveRecord\Model {
        static $belongs_to = array(array('participant'),array('shuttle'));
    }
?>