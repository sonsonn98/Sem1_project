<?php
class AboutusController extends BaseController {

    private $__aboutusModel;
    private $__homeModel;
    function __construct($conn)
    {
        $this->__aboutusModel= $this->initModel("AboutusModel",$conn);
        $this->__homeModel= $this->initModel("HomeModel",$conn);
    }
    // action
    public function index(){
        $zones = $this->__homeModel->getAllZones();
        $this->view("layout2", ["content" => "aboutus","zones"=>$zones]);
    }


}

?>


