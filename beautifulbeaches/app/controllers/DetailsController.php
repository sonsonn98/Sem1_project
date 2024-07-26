<?php
class DetailsController extends BaseController {

    private $__detailsModel;
    private $__homeModel;

    function __construct($conn)
    {
        $this->__detailsModel = $this->initModel("DetailsModel", $conn);
        $this->__homeModel = $this->initModel("HomeModel", $conn);
    }

    // action to show list of reviews and zones
    public function index(){
        $zones = $this->__homeModel->getAllZones();
        $reviews = $this->__detailsModel->getAllReviews();
        $this->view("layout", ["content" => "details", "zones" => $zones, "reviewers" => $reviews]);
    }

    // action to save reviews
    public function saveReviews($beach_id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $starValue = $_POST["starValue"]; 
            $name = $_POST["name"];
            $comments = $_POST["comments"];
            $this->__detailsModel->saveReviews($starValue, $beach_id, $name, $comments);
        }
    }

    // action to show specific beach details
    public function show($beach_id) {
        $beachDetails = $this->__detailsModel->getBeachDetails($beach_id);
        $this->view("layout", ["content" => "beach_details", "beach" => $beachDetails]);
    }
}
?>
