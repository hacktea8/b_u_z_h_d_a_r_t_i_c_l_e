<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('admbase.php');

class Admin extends Admbase {
 public function __construct(){
  parent::__construct();	
 }
 /**
  * 
  *
  */
 public function index(){
  $this->view('index');
 }
 public function index_index(){
  $this->view('index_index');
 }
 public function index_left(){
  $this->view('index_left');
 }
 public function index_share(){
  $this->view('index_share');
 }
 public function index_album(){
  $this->view('index_album');
 }
 public function index_footer(){
  $this->view('index_footer');
 }
 public function album_cate($p=1){
  $this->load->view('album_cate',$this->viewData);
 }
}
