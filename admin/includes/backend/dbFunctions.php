<?php
    /*******************************************DATA BASE FUNCTIONS************************************** */

    function select(...$fields){
        include __DIR__ . "/db_conn.php";
        $sql = "SELECT * FROM admins WHERE ";
        foreach($fields as $field):
            hashing($field); //Hash the password if it is
            $sql .= "$field='" . $_POST[$field] . "'";
            if ($field !== $fields[func_num_args() - 1]) $sql .= " AND ";
        endforeach;
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function insert(...$fields){
        include __DIR__ . "/db_conn.php";
        $insert = "INSERT INTO admins(";
        $values = "VALUES(";
        foreach($fields as $field):
            hashing($field); //Hash the password if it is
            $insert .= "$field";
            $values .= "'".$_POST[$field]."'";
            if ($field !== $fields[func_num_args() - 1]) { $insert .= ",";   $values .= ",";}
            else { $insert .= ")";   $values .= ")";}
        endforeach;
        $sql = $insert . $values;
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function update($id, ...$fields){
        include __DIR__ . "/db_conn.php";
        $sql = "UPDATE admins SET ";
        foreach($fields as $field):
            hashing($field); //Hash the password if it is
            $sql .= "$field='" . $_POST[$field] . "'";
            $sql .= ($field !== $fields[func_num_args() - 2])? "," : " WHERE id = $id";
        endforeach;
        $result = mysqli_query($conn, $sql);
    }