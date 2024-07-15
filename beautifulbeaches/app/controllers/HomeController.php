<?php
class HomeController extends BaseController {

    private $__homeModel;
    function __construct($conn)
    {
        $this->__homeModel= $this->initModel("HomeModel",$conn);
    }
    // action
    public function index(){
        $this->view("layout", ["content" => "home"]);
    }


}

?>


