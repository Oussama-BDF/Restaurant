<?php
    /*******************************************DATA BASE FUNCTIONS************************************** */

    function select($table, ...$fields){
        include __DIR__ . "/db_conn.php";
        $sql = "SELECT * FROM $table WHERE ";
        foreach($fields as $field):
            $sql .= "$field='" . $_POST[$field] . "'";
            if ($field !== $fields[func_num_args() - 2]) $sql .= " AND ";
        endforeach;
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function insert($table, ...$fields){
        include __DIR__ . "/db_conn.php";
        $insert = "INSERT INTO admins(";
        $values = "VALUES(";
        foreach($fields as $field):
            $insert .= "$field";
            $values .= "'".$_POST[$field]."'";
            if ($field !== $fields[func_num_args() - 2]) { $insert .= ",";   $values .= ",";}
            else { $insert .= ")";   $values .= ")";}
        endforeach;
        $sql = $insert . $values;
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function update($table, $id, ...$fields){
        include __DIR__ . "/db_conn.php";
        $sql = "UPDATE admins SET ";
        foreach($fields as $field):
            $sql .= "$field='" . $_POST[$field] . "'";
            $sql .= ($field !== $fields[func_num_args() - 3])? "," : " WHERE id = $id";
        endforeach;
        $result = mysqli_query($conn, $sql);
    }