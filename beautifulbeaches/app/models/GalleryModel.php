<?php
class GalleryModel {
    private $__conn;

    public function __construct($conn) {
        $this->__conn = $conn;
    }

    public function getImages($limit, $offset) {
        try {
            $sql = "
                SELECT picture_link 
                FROM beach_picture
                WHERE type != 'details_map_img' AND type != 'list_slider_img'
                LIMIT :limit OFFSET :offset
            ";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function countImages() {
        try {
            $sql = "
                SELECT COUNT(*) as count
                FROM beach_picture
                WHERE type != 'details_map_img' AND type != 'list_slider_img'
            ";
            $stmt = $this->__conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
