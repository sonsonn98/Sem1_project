<?php
class GalleryController extends BaseController {
    private $__galleryModel;
    private $__homeModel;

    function __construct($conn) {
        $this->__galleryModel = $this->initModel("GalleryModel", $conn);
        $this->__homeModel = $this->initModel("HomeModel", $conn);
    }

    public function index() {
        $zones = $this->__homeModel->getAllZones();
        $limit = 20;
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $limit;
        
        $imgs = $this->__galleryModel->getImages($limit, $offset);
        $totalImgs = $this->__galleryModel->countImages();
        $totalPages = ceil($totalImgs / $limit);
        
        $pagination = $this->createPagination($totalPages, $page);

        $this->view("layout2",[
            "content" => "gallery",
            "zones" => $zones,
            "imgs" => $imgs,
            "currentPage" => $page,
            "totalPages" => $totalPages,
            "pagination" => $pagination
        ]);
    }

    private function createPagination($totalPages, $currentPage) {
        $pagination = [];

        if ($totalPages <= 5) {
            for ($i = 1; $i <= $totalPages; $i++) {
                $pagination[] = $i;
            }
        } else {
            $pagination[] = 1;
            if ($currentPage > 3) {
                $pagination[] = '...';
            }

            $start = max(2, $currentPage - 1);
            $end = min($totalPages - 1, $currentPage + 1);

            for ($i = $start; $i <= $end; $i++) {
                $pagination[] = $i;
            }

            if ($currentPage < $totalPages - 2) {
                $pagination[] = '...';
            }

            $pagination[] = $totalPages;
        }

        return $pagination;
    }
}
?>
