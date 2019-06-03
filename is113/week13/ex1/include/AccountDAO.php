<?php

require_once 'common.php';

class AccountDAO
{

    /*
     *
     * Input: email, account
     * Search DB Table account
     * See if a row with email/password is found
     *
     * Case 1) email is not found
     * Case 2) email found, password is wrong
     * Case 3) Login Success
     *
     * IF Email is found
     *      If pass is correct
     *
     *      Else pass is wrong
     *
     */
    /*
     * 1 - Authentication successful
     * 2 - Password is incorrect
     * 3 - Email is not registered with us
     */
    public function authenticate($email, $password)
    {

        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();


        // Step 2 - Write & Prepare SQL Query (take care of Param Binding if necessary)
        $sql = "Select * from account where email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(":email", $email);

//        $stmt->execute();
//        var_dump($stmt);
//        var_dump($stmt->fetchAll());
//
//        $stmt->execute();
//        var_dump($stmt);
//        var_dump($stmt->fetch());
//
//        exit();

//        $ret_account = null;
        // check if query failed
        $return_msg = "";

        // Step 3 - Execute SQL Query
        // Step 4 - Retrieve Query Results (if any)
        if ($stmt->execute()) {
            // error code 0000 means query is OK
            if ($row = $stmt->fetch()) {
//                $ret_account = new Account($row['id'], $row['email'], $row['fullname'], $row['pass']);
                if ($row['pass'] == $password) {
                    $return_msg = 'Authentication successful';
                } else {
                    $return_msg = 'Password is incorrect';
                }
            } else {
                $return_msg = 'Email is not registered with us';
            }
        } else {

            var_dump($stmt->errorInfo());
        }

        // Step 5 - Clear Resources $stmt, $pdo
        $stmt = null;
        $pdo = null;


        // Step 6 - Return (if any)
        return $return_msg;
    }
}

//$dao = new AccountDAO();
//$message = $accountDAO->authenticate("donald@trump.com", "donald123");

?>