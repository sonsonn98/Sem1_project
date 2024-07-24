<?php
class ContactusController extends BaseController {

    private $__contactusModel;
    private $__homeModel;
    function __construct($conn)
    {
        $this->__contactusModel= $this->initModel("ContactusModel",$conn);
        $this->__homeModel= $this->initModel("HomeModel",$conn);
    }
    // action
    public function index(){
        $zones = $this->__homeModel->getAllZones();
        $this->view("layout2", ["content" => "contactus","zones"=>$zones]);
    }


}

?>


