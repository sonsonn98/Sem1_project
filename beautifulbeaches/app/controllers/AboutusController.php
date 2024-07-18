<?php
class AboutusController extends BaseController {

    private $__aboutusModel;
    function __construct($conn)
    {
        $this->__aboutusModel= $this->initModel("AboutusModel",$conn);
    }
    // action
    public function index(){
        $this->view("layout", ["content" => "aboutus"]);
    }


}

?>


