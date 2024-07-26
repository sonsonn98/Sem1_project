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
        $reviews=$this->__detailsModel->getAllReviews();
        $this->view("layout", ["content" => "details", "zones" => $zones, "reviewers"=> $reviews]);
    }

    public function saveReviews($beachc_id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $starValue = $_POST["starValue"]; 
            $name = $_POST["name"];
            $comments = $_POST["comments"];
            $this->__detailsModel->saveReview($starValue,$beachc_id,$name,$comments);
        }
    }

}

?>