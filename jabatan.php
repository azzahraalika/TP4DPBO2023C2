<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Jabatan.controller.php");

$jabatan = new JabatanController();

if (isset($_POST['add'])) {
  //lengkapi
  $jabatan->add($_POST);
} 
else if(!empty($_GET['tambah'])){
  $jabatan->tambah();
}
else if(isset($_POST['update'])){
    $jabatan->edit($_POST);
}
else if (!empty($_GET['id_edit'])) {
  //lengkapi
  $id = $_GET['id_edit'];
  $jabatan->update($id);
} 
else if (!empty($_GET['id_hapus'])) {
  //lengkapi
  $id = $_GET['id_hapus'];
  $jabatan->delete($id);
}
else{
  $jabatan->index();
}
