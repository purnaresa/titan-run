<?php 
    class MemberShuttle extends ActiveRecord\Model {
        static $belongs_to = array(array('member'),array('shuttle'));
    }
?>