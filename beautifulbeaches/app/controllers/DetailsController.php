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
            foreach ($weathers as &$weather) {
                $weather['month'] = str_replace('12', 'DECEMBER', $weather['month'],);
                $weather['month'] = str_replace('11', 'NOVEMBER', $weather['month']);
                $weather['month'] = str_replace('10', 'OCTOBER', $weather['month']);
                $weather['month'] = str_replace('9', 'SEPTEMBER', $weather['month']);
                $weather['month'] = str_replace('8', 'AUGUST', $weather['month']);
                $weather['month'] = str_replace('7', 'JULY', $weather['month']);
                $weather['month'] = str_replace('6', 'JUNE', $weather['month']);
                $weather['month'] = str_replace('5', 'MAY', $weather['month']);
                $weather['month'] = str_replace('4', 'APRIL', $weather['month']);
                $weather['month'] = str_replace('3', 'MARCH', $weather['month']);
                $weather['month'] = str_replace('2', 'FEBRUARY', $weather['month']);
                $weather['month'] = str_replace('1', 'JANUARY', $weather['month']);
                
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
