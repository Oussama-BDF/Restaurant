<?php
    /*******************************************DATA BASE FUNCTIONS************************************** */

    function select($table, ...$fields){
        include __DIR__ . "/db_conn.php";
        $sql = "SELECT * FROM $table WHERE ";
        foreach($fields as $field):
            $sql .= "$field='" . $_POST[$field] . "'";
            if ($field !== $fields[func_num_args() - 2]) $sql .= " AND ";
        endforeach;
        $stmt = $conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
        $stmt = $conn->query($sql);
        return $stmt;
    }

    function update($table, $id, ...$fields){
        include __DIR__ . "/db_conn.php";
        $sql = "UPDATE admins SET ";
        foreach($fields as $field):
            $sql .= "$field='" . $_POST[$field] . "'";
            $sql .= ($field !== $fields[func_num_args() - 3])? "," : " WHERE id = $id";
        endforeach;
        $stmt = $conn->query($sql);
    }