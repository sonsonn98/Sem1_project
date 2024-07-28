<?php
class ToplistController extends BaseController {
    private $__toplistModel;
    private $__homeModel;

    function __construct($conn) {
        $this->__toplistModel = $this->initModel("ToplistModel", $conn);
        $this->__homeModel = $this->initModel("HomeModel", $conn);
    }

    public function index() {
        $zones = $this->__homeModel->getAllZones();
        if (isset($_GET['id'])) {
            $zone_id = intval($_GET['id']);
            $zone = $this->__toplistModel->getZoneById($zone_id);
            $limit = 6;
            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
            $offset = ($page - 1) * $limit;
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $beaches = $this->__toplistModel->getBeachesByZoneId($zone_id, $limit, $offset, $search);
            foreach ($beaches as &$beach) {
                $beach['images'] = $this->__toplistModel->getImageSlider($beach['id']);
            }
            $totalBeaches = $this->__toplistModel->countBeachesByZoneId($zone_id, $search);
            $totalPages = ceil($totalBeaches / $limit);

            if ($zone) {
                $this->view("layout2", [
                    "content" => "toplist",
                    "zone" => $zone,
                    "zones" => $zones,
                    "beaches" => $beaches,
                    "currentPage" => $page,
                    "totalPages" => $totalPages,
                    "search" => $search
                ]);
            }
        }
    }
}
?>
