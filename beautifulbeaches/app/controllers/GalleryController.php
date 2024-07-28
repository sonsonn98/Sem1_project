<?php
    class GalleryController extends BaseController {
        private $__galleryModel;
        private $__homeModel;

        function contruct($conn) {
            $this->__galleryModel = $this->initModel("GalleryModel",$conn);
            $this->__homeModel= $this->initModel("HomeModel",$conn);
        }
    }
?>