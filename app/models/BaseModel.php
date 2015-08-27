<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 4/2/14
 * Time: 2:15 PM
 */

class BaseModel extends Eloquent{

    public $timestamps = true;
    protected $softDelete = true;
    protected $guarded = array('created_at', 'updated_at', 'deleted_at');

    public static $rules = array();
    public static $rules_create = array();
    public static $rules_update = array();
    public static $rules_delete = array();

    /**
     * A method to retrieve the business rules
     * @param $type a string that corresponds to transaction type (ie: create, update, delete)
     * @return array of rules
     */
    public static function getRules($type){
        if(isset(static::${"rules_".$type} )) {
            return static::${"rules_".$type};
        }else{
            return static::$rules;
        }
    }

    public static function boot() {
        parent::boot();
        static::registerEvents();
    }

    public static function registerEvents(){

    }

    public static function getClassName(){
        return get_class(static::getModel());
    }

    /**
     * Returns the custom configuration for the class
     * @param $config_name
     * @return mixed
     */
    public static function getConfig($config_name) {
        return Config::get('custom.'.static::getClassName().'.'.$config_name);
    }

    /**
     * Prints the content of the model
     * @param bool $return set to true if the result needs to be returned from this method. Otherwise, the result will be echoed.
     * @return mixed
     */
    public function printContent($return = false){
        if($return) {
            return print_r($this->attributes, $return);
        }else{
            print_r($this->attributes);
        }
    }

    /**
     * Returns true because this object is eloquent
     * @return bool
     */
    public function isEloquentObject(){
        return true;
    }

    /**
     * A method to retrieve the business rules
     * @param null $rule_type
     * @return array|mixed
     */
    public function rules($rule_type = NULL){
        if(!isset($rule_type)){
            return static::$rules;
        }
        $rules_name = 'rules_'.$rule_type;
        if(property_exists(get_called_class(), $rules_name)){
            return static::$$rules_name;
        }
        else{
            return static::$rules;
        }
    }

}