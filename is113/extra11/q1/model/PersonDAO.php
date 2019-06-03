<?php

class PersonDAO
{

    # A constructor is created by default if none is specified

    public function retrieveAll()
    {
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "Select * from person";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = [];
        while ($row = $stmt->fetch()) {
            $result[] = new Person($row["name"], $row["gender"], $row["age"]);
        }
        $stmt->closeCursor();
        $pdo = null;
        return $result;
    }

    public function add($person)
    {
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "insert into person (name, gender, age) values (:name, :gender, :age)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name", $person->name, PDO::PARAM_STR);
        $stmt->bindParam(":gender", $person->gender, PDO::PARAM_STR);
        $stmt->bindParam(":age", $person->age, PDO::PARAM_INT);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }

    public function search($minAge, $maxAge, $gender)
    {
        # Enter code here


        // STEP 1
        // Connect to database 'week11extras'
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();


        // STEP 2
        // Prepare SQL statement

        $sql = "Select * from person where age between :minAge and :maxAge";
        if ($gender != 'a') {
            $sql .= " and gender = :gender";
        }
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":minAge", $minAge);
        $stmt->bindParam(":maxAge", $maxAge);
        if ($gender != 'a') {
            $stmt->bindParam(":gender", $gender);
        }


        // STEP 3
        // Run SQL
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Retrieve each row as an Associative Array


        // STEP 4
        // Retrieve query results - ONE ROW AT A TIME
        $result = [];
        // Initialize an empty (indexed) Array
        // so I can return it to whoever called this function
        // Use WHILE loop to loop through
        while ($row = $stmt->fetch()) {
            $result[] = new Person($row["name"], $row["gender"], $row["age"]);
        }


        // STEP 5
        // Close DB Connection & SQL Statement
        $stmt->closeCursor();
        $pdo = null;


        // STEP 6
        // YAY! We're ready to return the array!
        return $result;
    }
}

?>