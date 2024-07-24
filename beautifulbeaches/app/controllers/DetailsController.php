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
            $slideimgs= $this->__detailsModel->getBeachImages($beach_id,'details_slides_img');
            $middleimg = $this->__detailsModel->getBeachImages($beach_id,'details_middle_img');
            $traits = $this->__detailsModel->getTraitsByIds($beach['trait1_id'], $beach['trait2_id'], $beach['trait3_id']);
            $infos = $this->__detailsModel->getMoreInfoByIds($beach['more_info1_id'], $beach['more_info2_id'], $beach['more_info3_id'], $beach['more_info4_id']);
            $weathers = $this->__detailsModel->getBeachWeather($beach['id']);
            foreach ($traits as &$trait) {
                $trait['trait_description'] = str_replace('{beach_name}', $beach['name'], $trait['trait_description']);
            }
            foreach ($infos as &$info) {
                $info['more_info_content'] = str_replace('{beach_name}', $beach['name'], $info['more_info_content']);
            }

            $this->view("layout", [
                "content" => "details",
                "beach" => $beach,
                "zones" => $zones,
                "image" => $image,
                "map" => $map,
                "slideimgs" => $slideimgs,
                "middleimg" => $middleimg,
                "traits" => $traits,
                "infos" => $infos,
                "weathers" => $weathers
            ]);
             
        }
    }
}
?>
