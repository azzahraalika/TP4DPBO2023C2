<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$members = new MemberController();

if (isset($_POST['add'])) {
  //lengkapi
  $members->add($_POST);
} 
else if(isset($_POST['update'])){
  $members->edit($_POST);
}
else if(!empty($_GET['tambah'])){
  $members->tambah();
}
else if (!empty($_GET['id_hapus'])) {
  //lengkapi
  $id = $_GET['id_hapus'];
  $members->delete($id);
}
else if (!empty($_GET['id_edit'])) {
  //lengkapi
  $id = $_GET['id_edit'];
  $members->update($id);
} 
else{
  $members->index();
}
