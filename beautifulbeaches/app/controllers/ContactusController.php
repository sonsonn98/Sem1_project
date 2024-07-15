<?php
class ContactusController extends BaseController {

    private $__contactusModel;
    function __construct($conn)
    {
        $this->__contactusModel= $this->initModel("ContactusModel",$conn);
    }
    // action
    public function index(){
        $this->view("layout", ["content" => "contactus"]);
    }


}

?>


