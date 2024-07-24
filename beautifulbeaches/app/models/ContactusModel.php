<?php
class ContactusModel {
    private $__conn;

    public function __construct($conn) {
        $this->__conn = $conn;
    }

    public function Savecontact($name, $email, $message) {
        $stmt = $this->__conn->prepare("INSERT INTO contactus (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute(); 
        return header("location: http://localhost/beautifulbeaches/home/index");
    }
}
?>
