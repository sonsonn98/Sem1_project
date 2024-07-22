<?php
class DetailsController extends BaseController {

    private $__detailsModel;
    private $__homeModel;
    function __construct($conn)
    {
        $this->__detailsModel= $this->initModel("DetailsModel",$conn);
        $this->__homeModel= $this->initModel("HomeModel",$conn);
    }
    // action
    public function index(){
        $zones=$this->__homeModel->getAllZones();
        $this->view("layout", ["content" => "details", "zones" => $zones]);
    }


}

?>