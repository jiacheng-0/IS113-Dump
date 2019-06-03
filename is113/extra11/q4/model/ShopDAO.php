<?php

class ShopDAO
{

    # Default constructor is created by default if no constructor is specified
    # Retrieve data from the database table - shop

    public function retrieveAll()
    {

        // retrieve all data from the database to create an array index of Shop objects
        // SQL statement : "Select * from shop"

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    *
                FROM shop";
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $result = []; // Indexed Array of Star objects
        while ($row = $stmt->fetch()) {
            $result[] =
                new Shop(
                    $row['id'],
                    $row['shopname'],
                    $row['location']
                );
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $result;
    }

    public function retrieveAllStoreName()
    {

        // retrieve all data from the database to return an array of shop name
        // SQL statement : "Select distinct shopname from shop"

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    distinct shopname
                FROM shop";
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $result = []; // Indexed Array of Star objects
        while ($row = $stmt->fetch()) {
            $result[] = $row['shopname'];
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $result;
    }

    public function retrieveAllLocation()
    {

        // retrieve all data from the database to return an array of location
        // SQL statement : "Select distinct location from shop"

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    distinct location
                FROM shop";
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $result = []; // Indexed Array of Star objects
        while ($row = $stmt->fetch()) {
            $result[] = $row['location'];
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $result;
    }

    public function retrieveLocationStorename($location1, $shopname1)
    {

        // this function serve to check if the shop name exist in the location.
        // Possible SQL statement : SELECT * from shop where location = :location AND shopname = :shopname";

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT 
                * from shop 
                where location = :location 
                AND shopname = :shopname";
        $stmt = $conn->prepare($sql);

        // STEP 3

        $stmt->bindParam(":location", $location1);
        $stmt->bindParam(":shopname", $shopname1);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        //  $stmt = null;
        $conn = null;

        return $stmt->rowCount() >= 1;

    }

}

?>