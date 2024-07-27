<?php
class ToplistController extends BaseController {
    private $__toplistModel;
    private $__homeModel;

    function __construct($conn) {
        $this->__toplistModel = $this->initModel("ToplistModel", $conn);
        $this->__homeModel= $this->initModel("HomeModel",$conn);
    }

    public function index() {
        $zones = $this->__homeModel->getAllZones();
        if (isset($_GET['id'])) {
            $zone_id = intval($_GET['id']);
            $zone = $this->__toplistModel->getZoneById($zone_id);
            $beaches = $this->__toplistModel->getBeachesByZoneId($zone_id);
            foreach ($beaches as &$beach) {
                $beach['images'] = $this->__toplistModel->getImageSlider($beach['id']);
            }

            if ($zone) {
                $this->view("layout2", ["content" => "toplist", 
                "zone" => $zone, 
                "zones"=>$zones,
                "beaches"=> $beaches,
                ]);
            }
    }
    
}
}
?>
