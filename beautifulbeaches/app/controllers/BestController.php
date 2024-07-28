<?php
class BestController extends BaseController {
    private $__bestModel;
    private $__homeModel;
    private $__toplistModel;
    function __construct($conn) {
        $this->__bestModel = $this->initModel("BestModel", $conn);
        $this->__homeModel= $this->initModel("HomeModel",$conn);
        $this->__toplistModel = $this->initModel("ToplistModel", $conn);
    }

    public function index() {
        $zones = $this->__homeModel->getAllZones();
        $bests = $this->__bestModel->getTopRatedBeaches();
        foreach ($bests as &$best) {
            $best['images'] = $this->__toplistModel->getImageSlider($best['id']);
        }
        $this->view("layout2",["content"=>"best","bests" => $bests, "zones" => $zones]);
    }
}
?>