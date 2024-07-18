<?php
class DetailsController extends BaseController {

    private $__detailsModel;
    function __construct($conn)
    {
        $this->__detailsModel= $this->initModel("DetailsModel",$conn);
    }
    // action
    public function index(){
        $this->view("layout", ["content" => "details"]);
    }


}

?>