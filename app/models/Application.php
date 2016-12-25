<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Application extends Eloquent implements RemindableInterface{
  use RemindableTrait;
  public $timestamps = false;
  protected $fillable = [
      'applied_date',
      'position_name',
      'job_posting_url',
      'company_name',
      'company_url',
      'response_value',
      'accepted'
  ];
  public static $val_rules = [
      'applied_date' => 'required',
      'position_name' => 'required',
      'company_name' => 'required'
  ];
  public $errmsgs;
  protected $table = 'entry';
  protected $primaryKey = "id"; // 4
  
  public function isValid(){
    $validator = Validator::make($this->attributes, static::$val_rules);
    if($validator->passes()){
      return true;
    }
    $this->errmsgs = $validator->messages();
    return false;
  }
  
}