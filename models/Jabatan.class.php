<?php

class Jabatan extends DB
{
    function getJabatan()
    {
        $query = "SELECT * FROM jabatan";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama_jabatan = $data['nama_jabatan'];

        //lengkapi
        $query = "INSERT INTO jabatan VALUES('', '$nama_jabatan')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        //lengkapi
        $query = "DELETE FROM jabatan WHERE id_jabatan=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {
        $id_jabatan = $data['id_jabatan'];
        $nama_jabatan = $data['nama_jabatan'];

        // lengkapi
        $query = "UPDATE jabatan SET nama_jabatan='$nama_jabatan' WHERE id_jabatan='$id_jabatan'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getJabatanById($id)
    {
        // lengkapi
        $query = "SELECT * FROM jabatan WHERE id_jabatan=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
}


?>