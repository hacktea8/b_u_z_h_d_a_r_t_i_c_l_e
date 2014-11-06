<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'viewbase.php';
class Help extends Viewbase {
 public function __construct(){
  parent::__construct();
 }
 public function service(){
  $this->view('help_service');
 }
 public function privacy(){
  $this->view('help_privacy');
 }
 public function tortreport(){
  $this->view('help_tortreport');
 }
 public function contactus(){
  $this->view('help_contactus');
 }
 public function copyright(){
  $this->view('help_copyright');
 }
 public function bonus(){
  $this->view('help_bonus');
 }
}
