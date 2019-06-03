<?php

require_once 'common.php';

class StarDAO
{

    public function getAll()
    {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    id,
                    name,
                    gender, 
                    photo,
                    headline
                FROM star"; // SELECT * FROM star; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $stars = []; // Indexed Array of Star objects
        while ($row = $stmt->fetch()) {
            $stars[] =
                new Star(
                    $row['id'],
                    $row['name'],
                    $row['gender'],
                    $row['photo'],
                    $row['headline']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $stars;
    }

    public function getStarByID($id)
    {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM star
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $star_object = null;
        if ($row = $stmt->fetch()) {
            $star_object =
                new Star(
                    $row['id'],
                    $row['name'],
                    $row['gender'],
                    $row['photo'],
                    $row['headline']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $star_object;
    }

    public function updateHeadline($id, $headline)
    {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "UPDATE
                    star
                SET
                    headline = :headline
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':headline', $headline, PDO::PARAM_STR);

        $stmt->debugDumpParams();

        // STEP 3
        $status = $stmt->execute();

        // STEP 4
        $stmt->closeCursor();
        $stmt = null;
        $conn = null;

        return $status;

    }
}

//$dao = new StarDAO();
//$dao->updateHeadline();