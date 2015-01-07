<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Application extends Eloquent implements RemindableInterface{
  use RemindableTrait;
  public $timestamps = false;
  protected $fillable = [
      'ent_applied_date',
      'ent_position_name',
      'ent_job_posting_url',
      'ent_company_name',
      'ent_company_url'
  ];
  public static $val_rules = [
      'ent_applied_date' => 'required',
      'ent_position_name' => 'required',
      'ent_company_name' => 'required'
  ];
  public $errmsgs;
  protected $table = 'tbl_entry';
  
  public function isValid(){
    $validator = Validator::make($this->attributes, static::$val_rules);
    if($validator->passes()){
      return true;
    }
    $this->errmsgs = $validator->messages();
    return false;
  }
  
}