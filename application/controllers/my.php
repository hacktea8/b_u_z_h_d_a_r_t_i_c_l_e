<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'usrbase.php';
class My extends Usrbase {
 public function __construct(){
  parent::__construct();
 }
 public function profile(){
  $this->view('my_profile');
 }
 public function channel(){
  $this->view('my_channel');
 }
 public function adcode(){
  $this->view('my_adcode');
 }
 public function post(){
  $this->view('my_post');
 }
 public function adult(){
  $this->view('my_adult');
 }
 public function postcreate(){
  $this->view('my_postcreate');
 }
 public function earnings(){
  $this->view('my_earnings');
 }
 public function coopearnings(){
  $this->view('my_coopearnings');
 }
 public function recruit(){
  $this->view('my_recruit');
 }
 public function ranking(){
  $this->view('my_ranking');
 }
 public function payrecords(){
  $this->view('my_payrecords');
 }
}
