<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Application extends Eloquent implements RemindableInterface{
  use RemindableTrait;
  //public $timestamps = false;
  //public static $valid_rules =
  public $errmsgs;
  protected $table = 'entries';
  
  public function isValid(){
    $validator = Validator::make($this->attribute, static::$val_rules);
    if($validator->passes()){
      return true;
    }
    $this->errmsgs = $validator->messages();
    return false;
  }
  
}