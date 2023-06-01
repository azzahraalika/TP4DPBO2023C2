<?php
    class MemberView{
        public function render($data){
            $no = 1;
            $dataMember = null;
            foreach($data as $row){
                $dataMember .= "
                    <tr>
                    <th>" . $no++ . "</th>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['gaji'] . "</td>
                    <td>" . $row['nama_jabatan'] . "</td>
                    <td>
                        <a class='btn btn-success' href='index.php?id_edit=" . $row['id_member'] . "'>Edit</a>
                        <a class='btn btn-danger' href='index.php?id_hapus=" . $row['id_member'] . "'>Delete</a>
                    </td>
                    </tr>
                ";
            }

            $tpl = new Template("templates/skin.html");
            $tpl->replace("DATA_MEMBER", $dataMember);
            $tpl->write();
        }
    
        public function formAdd($jabatan){
            $dataJabatan = null;
            foreach($jabatan as $row){

                $dataJabatan .= "
                    <option value='". $row['id_jabatan'] ."'>". $row['nama_jabatan'] ."</option>
                ";
            }

            $tpl = new Template("templates/tambah.html");
            $tpl->replace("DATA_JABATAN", $dataJabatan);
            $tpl->replace("submit", 'add');
            $tpl->replace("DATA_TITLE", 'Add New');
            $tpl->write(); 
        }

        public function formUpdate($data){
            $dataMember = $data['members'];

            $dataJabatan = null;
            foreach($data['jabatan'] as $row){

                $dataJabatan .= "
                    <option value='". $row['id_jabatan'] ."'>". $row['nama_jabatan'] ."</option>
                ";
            }

            $tpl = new Template("templates/tambah.html");
            $tpl->replace("DATA_ID", $dataMember['id_member']);
            $tpl->replace("DATA_NAMA", $dataMember['nama']);
            $tpl->replace("DATA_EMAIL", $dataMember['email']);
            $tpl->replace("DATA_PHONE", $dataMember['phone']);
            $tpl->replace("DATA_GAJI", $dataMember['gaji']);
            $tpl->replace("DATA_JABATAN", $dataJabatan);
            $tpl->replace("submit", 'update');
            $tpl->replace("DATA_TITLE", 'Edit');
            $tpl->write();
        }
    }

?>
