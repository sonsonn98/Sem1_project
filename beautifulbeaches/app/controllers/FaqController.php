<?php
class FaqController extends BaseController {

    private $__faqModel;
    private $__homeModel;
    function __construct($conn)
    {
        $this->__faqModel= $this->initModel("FaqModel",$conn);
        $this->__homeModel= $this->initModel("HomeModel",$conn);
    }
    // action
    public function index(){
        $zones = $this->__homeModel->getAllZones();
        $this->view("layout2", ["content" => "faq","zones"=> $zones]);
    }


}

?>


