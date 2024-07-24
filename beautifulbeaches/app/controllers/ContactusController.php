<?php
class ContactusController extends BaseController {

    private $__contactusModel;
    private $__homeModel;
    function __construct($conn) {
        $this->__contactusModel = $this->initModel("ContactusModel", $conn);
        $this->__homeModel = $this->initModel("HomeModel", $conn);
    }
    
    public function index() {
        $zones = $this->__homeModel->getAllZones();
        $this->view("layout2", ["content" => "contactus", "zones" => $zones]);
    }

    public function savecontact() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
        
            if ($this->__contactusModel->Savecontact($name, $email, $message)) {
                echo "Submission saved successfully!";
            } else {
                echo "Failed to save submission.";
            }
        }
    }
}
?>
