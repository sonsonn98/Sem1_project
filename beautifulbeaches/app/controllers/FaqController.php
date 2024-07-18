<?php
class FaqController extends BaseController {

    private $__faqModel;
    function __construct($conn)
    {
        $this->__faqModel= $this->initModel("FaqModel",$conn);
    }
    // action
    public function index(){
        $this->view("layout", ["content" => "faq"]);
    }


}

?>


