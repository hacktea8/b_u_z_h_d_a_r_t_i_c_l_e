<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'usrbase.php';
class User extends Usrbase {
 public function __construct(){
  parent::__construct();
 }
 public function index(){

 }
 public function register(){
  $this->view('user_register');
 }
}
