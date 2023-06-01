<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $gaji = $data['gaji'];
        $jabatan = $data['jabatan'];

        $query = "INSERT INTO members VALUES ('', '$nama', '$email', '$phone', '$gaji', '$jabatan')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        // lengkapi
        $query = "DELETE FROM members WHERE id_member=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {
        $id_member = $data['id_member'];
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $gaji = $data['gaji'];
        $jabatan = $data['jabatan'];

        // lengkapi
        $query = "UPDATE members SET nama='$nama', email='$email', phone='$phone', gaji= '$gaji', id_jabatan='$jabatan' WHERE id_member='$id_member'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getMemberJoin()
    {
        // lengkapi
        $query = "SELECT * FROM members JOIN jabatan ON members.id_jabatan=jabatan.id_jabatan ORDER BY members.id_member";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        // lengkapi
        $query = "SELECT * FROM members JOIN jabatan ON members.id_jabatan=jabatan.id_jabatan WHERE id_member=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
}
