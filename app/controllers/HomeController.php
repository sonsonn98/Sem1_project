<?php
class HomeController extends BaseController {

    private $__homeModel;
    function __construct($conn)
    {
        $this->__homeModel= $this->initModel("HomeModel",$conn);
    }
    // action
    public function index(){
        $books = $this->__homeModel->getAllbooks();
        $this->view("layouts/user_layout", ["content" => "home", "books" => $books]);
    }

    //action : create, params [$a,$b]
    public function create($a, $b){
}
}

?>


