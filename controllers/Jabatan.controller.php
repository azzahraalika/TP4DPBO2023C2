<?php
include_once("conf.php");
include_once("models/Jabatan.class.php");
include_once("views/Jabatan.view.php");

class JabatanController {
  private $jabatan;

  function __construct(){
    $this->jabatan = new Jabatan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->jabatan->open();
    $this->jabatan->getJabatan();

    $data = array();
    while($row = $this->jabatan->getResult()){
      array_push($data, $row);
    }

    $this->jabatan->close();

    $view = new JabatanView();
    $view->render($data);
  }

  
  function add($data){
    $this->jabatan->open();
    $this->jabatan->add($data);
    $this->jabatan->close();
    
    header("location:jabatan.php");
  }

  function edit($data){
    $this->jabatan->open();
    $this->jabatan->update($data);
    $this->jabatan->close();
    
    header("location:jabatan.php");
  }

  function delete($data){
    $this->jabatan->open();
    $this->jabatan->delete($data);
    $this->jabatan->close();
    
    header("location:jabatan.php");
  }

  function tambah(){
    $view = new JabatanView();
    $view->formAdd();
  }

  function update($id){
    $jabatan = null;

    $this->jabatan->open();
    $this->jabatan->getJabatanById($id);
    $jabatan = $this->jabatan->getResult();
    $this->jabatan->close();

    $view = new JabatanView();
    $view->formUpdate($jabatan);
  }

}
