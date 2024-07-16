<?php
class ToplistController extends BaseController {

    private $__toplistModel;
    function __construct($conn)
    {
        $this->__toplistModel= $this->initModel("ToplistModel",$conn);
    }
    // action
    public function index(){
        $this->view("layout3", ["content" => "toplist"]);
    }


}

?>


