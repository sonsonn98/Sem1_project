<?php
class DetailsController extends BaseController {
    private $__detailsModel;
    private $__homeModel;

    function __construct($conn) {
        $this->__detailsModel = $this->initModel("DetailsModel", $conn);
        $this->__homeModel = $this->initModel("HomeModel", $conn);
    }

    public function index() {
        if (isset($_GET['id'])) {
            $beach_id = intval($_GET['id']);
            $zones = $this->__homeModel->getAllZones();
            $beach = $this->__detailsModel->getBeachDetail($beach_id);
            $image = $this->__detailsModel->getBeachImages($beach_id, 'details_bg_img');
            $map = $this->__detailsModel->getBeachImages($beach_id,'details_map_img');
            
            if ($beach) {
                $traits = $this->__detailsModel->getTraitsByIds($beach['trait1_id'], $beach['trait2_id'], $beach['trait3_id']);
                foreach ($traits as &$trait) {
                    $trait['trait_description'] = str_replace('{beach_name}', $beach['name'], $trait['trait_description']);
                }
                $this->view("layout", [
                    "content" => "details",
                    "beach" => $beach,
                    "zones" => $zones,
                    "image" => $image,
                    "map" => $map,
                    "traits" => $traits
                ]);
            } 
        }
    }
}
?>
