<?php

require_once 'common.php';

class PostDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    id,
                    create_timestamp,
                    IF(update_timestamp = create_timestamp, 'No update', update_timestamp) as update_timestamp,
                    subject,
                    entry,
                    mood
                FROM post"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Post(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['update_timestamp'],
                    $row['subject'],
                    $row['entry'],
                    $row['mood']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $posts;
    }

    public function get($id) {
        // STEP 1
        $connMgr = new ConnectionManager(); // ConnectionManager object
        $conn = $connMgr->connect();        // PDO object

        // STEP 2
        $sql = "select * from post where id = :id"; //
        $stmt = $conn->prepare($sql);       // SQLStatement object
        $stmt->bindParam(":id", $id);

        // STEP 3
        // How do I run my query using $stmt?
        $stmt->setFetchMode(PDO::FETCH_ASSOC);


        // STEP 4
        $post_object = null;  // If a match is found, return a Post object

        // How to retrieve query results?
        $stmt->execute();
        if ($row = $stmt->fetch()) {

            $post_object =  new Post(
                $row['id']
                , $row['create_timestamp']
                , $row['update_timestamp']
                , $row['subject']
                , $row['entry']
                , $row['mood']
            );
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $post_object;
    }

    public function update($id, $subject, $entry, $mood) {

        // STEP 1
        // Connect to Database
        $connMgr = new ConnectionManager(); // ConnectionManager object
        $conn = $connMgr->connect();        // PDO object

        // STEP 2
        // Prepare SQL
        $sql = "update post set update_timestamp = current_timestamp, subject = :subject, entry = :entry, mood = :mood where id = :id"; // INCOMPLETE
        $stmt = $conn->prepare($sql);       // SQLStatement object
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":subject", $subject);
        $stmt->bindParam(":entry", $entry);
        $stmt->bindParam(":mood", $mood);

        //STEP 3
        // Run Query
        $status = $stmt->execute();

        if (!$status) {
            var_dump($stmt->errorInfo());
        }

        // STEP 4
        // Close Query/Connection
        $stmt = null;
        $conn = null;


        // STEP 5
        return $status; // Boolean True or False
    }

    public function delete($id) {
        // STEP 1
        // Connect to Database
        $connMgr = new ConnectionManager(); // ConnectionManager object
        $conn = $connMgr->connect();        // PDO object

        // STEP 2
        // Prepare SQL
        $sql = "DELETE FROM post WHERE id = :id"; // INCOMPLETE
        $stmt = $conn->prepare($sql);       // SQLStatement object
        $stmt->bindParam(":id", $id);

        //STEP 3
        // Run Query
        $status = $stmt->execute();

        if (!$status) {
            var_dump($stmt->errorInfo());
        }


        // STEP 4
        // Close Query/Connection
        $stmt = null;
        $conn = null;

        
        // STEP 5
        return $status; // Boolean True or False
    }

    public function add($subject, $entry, $mood) {
        // STEP 1
        // Connect to Database
        $connMgr = new ConnectionManager(); // ConnectionManager object
        $conn = $connMgr->connect();        // PDO object

        // STEP 2
        // Prepare SQL
        $sql = "insert into post (create_timestamp, update_timestamp, subject, entry, mood) VALUES (current_timestamp, current_timestamp, :subject, :entry, :mood)";
        $stmt = $conn->prepare($sql);       // SQLStatement object
        $stmt->bindParam(":subject", $subject);
        $stmt->bindParam(":entry", $entry);
        $stmt->bindParam(":mood", $mood);

        //STEP 3
        // Run Query
        $status = $stmt->execute();
        if (!$status) {
            var_dump($stmt->errorInfo());
        }

        // STEP 4
        // Close Query/Connection
        $stmt = null;
        $conn = null;

        
        // STEP 5
        return $status; // Boolean True or False
    }
}

?>