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
        $imgs = $this->__galleryModel->getImages();
        $this->view("layout2",["content"=> "gallery","zones" => $zones, "imgs" => $imgs]);
    }
}
?>