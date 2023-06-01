<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Jabatan.class.php");
include_once("views/Member.view.php");

class MemberController {
  private $members;
  private $jabatan;

  function __construct(){
    $this->members = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->jabatan = new Jabatan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->members->getMemberJoin();

    $data = array();

    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $this->members->close();

    $view = new MemberView();
    $view->render($data);
  }

  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($data){
    $this->members->open();
    $this->members->update($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }

  function tambah(){
    $jabatan = array();
    $this->jabatan->open();
    $this->jabatan->getJabatan();

    while($row = $this->jabatan->getResult()){
        array_push($jabatan, $row);
    }

    $this->jabatan->close();

    $view = new MemberView();
    $view->formAdd($jabatan);
  }

  function update($id){
    $data = array(
      'members' => null,
      'jabatan' => array()
    );

    $this->members->open();
    $this->members->getMemberById($id);
    $this->jabatan->open();
    $this->jabatan->getJabatan();
    $data['members'] = $this->members->getResult();

    while($row = $this->jabatan->getResult()){
        array_push($data['jabatan'], $row);
    }
    
    $this->members->close();
    $this->jabatan->close();

    $view = new MemberView();
    $view->formUpdate($data);
  }

}
