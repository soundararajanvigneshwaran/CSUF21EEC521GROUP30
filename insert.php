<?php
if (isset($_POST['submit'])) {
		if (isset($_POST['firstname']) && isset($_POST['lastname']) &&
        isset($_POST['emailid']) && isset($_POST['phonenumber']) &&
        isset($_POST['member']) && isset($_POST['response'])) {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailid = $_POST['emailid'];
        $phonenumber = $_POST['phonenumber'];
        $member = $_POST['member'];
        $response = $_POST['response'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "restaurant";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $SELECT = "SELECT emailid FROM feedback WHERE emailid = ? LIMIT 1";
            $INSERT = "INSERT INTO feedback(firstname, lastname, emailid, phonenumber, member, response) values(?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $emailid);
            $stmt->execute();
            $stmt->bind_result($emailid);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssiss",$firstname, $lastname, $emailid, $phonenumber, $member, $response);
                $stmt->execute();
                    echo "Thank you for the Feedback.";
                }
                else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}

?>