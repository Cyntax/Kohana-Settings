<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Settings extends DB_ORM_Model {

   public function __construct() {
       parent::__construct();
       $this->fields = array(
           'name' => new DB_ORM_Field_String($this, array(
               'max_length' => 30,
               'nullable' => FALSE,
           )),
           'title' => new DB_ORM_Field_String($this, array(
               'max_length' => 100,
               'nullable' => FALSE,
           )),
           'system' => new DB_ORM_Field_Integer($this, array(
               'max_length' => 1,
               'nullable' => FALSE,
           )),
           'description' => new DB_ORM_Field_String($this, array(
           		'max_length' => 2000,
               'nullable' => FALSE,
           )),
           'default' => new DB_ORM_Field_String($this, array(
           		'max_length' => 255,
               'default' => TRUE,
               'nullable' => FALSE,
           )),
           'value' => new DB_ORM_Field_String($this, array(
               'max_length' => 255,
               'nullable' => FALSE,
           )),
       );
       $this->relations = array(
       );
   }

   public static function table() {
       return 'settings';
   }

   public static function primary_key() {
       return array('name');
   }

}
?>            