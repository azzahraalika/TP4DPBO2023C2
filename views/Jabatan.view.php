<?php
    class JabatanView{
        public function render($data){
            $no = 1;
            $dataJabatan = null;
            foreach($data as $row){
                $dataJabatan .= "
                    <tr>
                    <th>" . $no++ . "</th>
                    <td>" . $row['nama_jabatan'] . "</td>
                    <td>
                        <a class='btn btn-success' href='jabatan.php?id_edit=" . $row['id_jabatan'] . "'>Edit</a>
                        <a class='btn btn-danger' href='jabatan.php?id_hapus=" . $row['id_jabatan'] . "'>Delete</a>
                    </td>
                    </tr>
                ";
            }

            $tpl = new Template("templates/jabatan.html");
            $tpl->replace("DATA_TABEL", $dataJabatan);
            $tpl->write();
        }
    
        public function formAdd(){
            $tpl = new Template("templates/tambahJabatan.html");
            $tpl->replace("submit", 'add');
            $tpl->replace("DATA_TITLE", 'Add');
            $tpl->write(); 
        }

        public function formUpdate($jabatan){
            $row = $jabatan;
    
            $tpl = new Template("templates/tambahJabatan.html");
            $tpl->replace("DATA_ID", $row['id_jabatan']);
            $tpl->replace("DATA_NAMAJABATAN", $row['nama_jabatan']);
            $tpl->replace("submit", 'update');
            $tpl->replace("DATA_TITLE", 'Edit');
            $tpl->write(); 
        }
    }

?>
