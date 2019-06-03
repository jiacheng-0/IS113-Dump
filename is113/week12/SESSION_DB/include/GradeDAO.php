<?php

require_once 'common.php';

class GradeDAO {

    // Retrieve a row from table grade where email == $email
    // If no matching row is found, return null
    public function retrieve($email) {

        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();


        // Step 2 - Prepare SQL
        $sql = "select * from grade where email = :email";
        $stmt = $pdo->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(":email", $email);

        // Step 3 - Execute SQL
        $stmt->execute();
        $return_grade = null;
        

        // Step 4 - Retrieve Query Results
        while($row = $stmt->fetch()) {
            $return_grade = new Grade($row['email'], $row['status'], $row['q1'], $row['q2'], $row['q3']);
        }

        // Step 5 - Clear Resources
        $stmt = null;
        $pdo = null;


        // Step 6 - Return
        return $return_grade; // a Grade object
    }


    // Retrieve a row from table grade where email == $email
    //    Retrieve only columns q1, q2, q3
    //
    // If matching row is found:
    //    Create an Indexed Array of THREE (3) integers (q1, q2, q3 as retrieved from table grade)
    //    Return this Indexed Array
    // E.g. $components = [8, 7, 2]
    //
    // If no matching row is found, return an empty Indexed Array
    public function retrieveComponents($email) {

        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();


        // Step 2 - Prepare SQL
        $sql = "select * from grade where email = :email";
        $stmt = $pdo->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(":email", $email);
        

        // Step 3 - Execute SQL
        $stmt->execute();
        $components = [];


        // Step 4 - Retrieve Query Results
        while ($row = $stmt->fetch()) {
            $components[] = $row['q1'] + 0;
            $components[] = $row['q2'] + 0;
            $components[] = $row['q3'] + 0;
        }
       

        // Step 5 - Clear Resources
        $stmt = null;
        $pdo = null;


        // Step 6 - Return
        return $components; // an Indexed Array of THREE (3) integers
    }
}


?>