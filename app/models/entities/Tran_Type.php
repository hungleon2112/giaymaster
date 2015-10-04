<?php
/**
 * Created by PhpStorm.
 * User: vieth
 * Date: 10/4/2015
 * Time: 1:28 PM
 */

class Tran_Type extends BaseModel {
    protected $table = 'tran_type';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();
} 