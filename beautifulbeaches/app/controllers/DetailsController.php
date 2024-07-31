<?php
class DetailsController extends BaseController
{
    private $__detailsModel;
    private $__homeModel;

    function __construct($conn)
    {
        $this->__detailsModel = $this->initModel("DetailsModel", $conn);
        $this->__homeModel = $this->initModel("HomeModel", $conn);
    }

    public function index()
    {
        if (isset($_GET['id'])) {
            $beach_id = intval($_GET['id']);
            $zones = $this->__homeModel->getAllZones();
            $beach = $this->__detailsModel->getBeachDetail($beach_id);
            $image = $this->__detailsModel->getBeachImages($beach_id, 'details_bg_img');
            $map = $this->__detailsModel->getBeachImages($beach_id, 'details_map_img');
            $slideimgs = $this->__detailsModel->getBeachImages($beach_id, 'details_slides_img');
            $middleimg = $this->__detailsModel->getBeachImages($beach_id, 'details_middle_img');
            $traits = $this->__detailsModel->getTraitsByIds($beach['trait1_id'], $beach['trait2_id'], $beach['trait3_id']);
            $infos = $this->__detailsModel->getMoreInfoByIds($beach['more_info1_id'], $beach['more_info2_id'], $beach['more_info3_id'], $beach['more_info4_id']);
            $weathers = $this->__detailsModel->getBeachWeather($beach['id']);
            $flights = $this->__detailsModel->getFlightsbyid($beach_id); 
            $reviews = $this->__detailsModel->getAllReviews($beach_id);
            foreach ($traits as &$trait) {
                $trait['trait_description'] = str_replace('{beach_name}', $beach['name'], $trait['trait_description']);
            }
            foreach ($infos as &$info) {
                $info['more_info_content'] = str_replace('{beach_name}', $beach['name'], $info['more_info_content']);
            }
            foreach ($weathers as &$weather) {
                $weather['month'] = str_replace('12', 'DECEMBER', $weather['month'], );
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

                $totalReviews = 0;
                $averageRating = 0;
                $persent1Star = 0;
                $persent2Star = 0;
                $persent3Star = 0;
                $persent4Star = 0;
                $persent5Star = 0;
                if (!empty($reviews)) {
                    $num1Star = 0;
                    $num2Star = 0;
                    $num3Star = 0;
                    $num4Star = 0;
                    $num5Star = 0;
                    foreach ($reviews as $rating) {
                        if ($rating['rating'] === 1) {
                            $num1Star += 1;
                        } elseif ($rating['rating'] === 2) {
                            $num2Star += 1;
                        } elseif ($rating['rating'] === 3) {
                            $num3Star += 1;
                        } elseif ($rating['rating'] === 4) {
                            $num4Star += 1;
                        } elseif ($rating['rating'] === 5) {
                            $num5Star += 1;
                        }
                    }
                    $totalReviews = $num1Star + $num2Star + $num3Star + $num4Star + $num5Star;
                    $totalPoints = (1 * $num1Star) + (2 * $num2Star) + (3 * $num3Star) + (4 * $num4Star) + (5 * $num5Star);
                    $averageRating = $totalPoints / $totalReviews;
                    $averageRating = round($averageRating, 1);
                    $persent1Star = ($num1Star / $totalReviews) * 100;
                    $persent2Star = ($num2Star / $totalReviews) * 100;
                    $persent3Star = ($num3Star / $totalReviews) * 100;
                    $persent4Star = ($num4Star / $totalReviews) * 100;
                    $persent5Star = ($num5Star / $totalReviews) * 100;
                    $persent1Star = round($persent1Star, 1);
                    $persent2Star = round($persent2Star, 1);
                    $persent3Star = round($persent3Star, 1);
                    $persent4Star = round($persent4Star, 1);
                    $persent5Star = round($persent5Star, 1);
                }

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
                "weathers" => $weathers,
                "flights" => $flights,
                "reviews" => $reviews,
                "beach_id" => $beach_id,
                "totalReviews" => $totalReviews,
                "averageRating" => $averageRating,
                "persent1Star" => $persent1Star,
                "persent2Star" => $persent2Star,
                "persent3Star" => $persent3Star,
                "persent4Star" => $persent4Star,
                "persent5Star" => $persent5Star
            ]);

        }
    }

    public function saveReviews($beach_id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $starValue = $_POST["starValue"];
            $name = empty($_POST["name"]) ? "Anonymous" : $_POST["name"];
            $comments = empty($_POST["comments"]) ? "" : $_POST["comments"];
            $this->__detailsModel->saveReviews($starValue, $beach_id, $name, $comments);
            header("location: http://localhost/beautifulbeaches/details/index?id=$beach_id");
        }
    }
    public function download($id){
        // use Mpdf;
        $pdf = new Mpdf\Mpdf();
        $html =file_get_contents("http://localhost/beautifulbeaches/details/downloadcontent?id=$id");
        $pdf->WriteHTML($html);
        $pdf->Output();

    }
    public function downloadcontent()
    {
        if (isset($_GET['id'])) {
            $beach_id = intval($_GET['id']);
            $beach = $this->__detailsModel->getBeachDetail($beach_id);
            $image = $this->__detailsModel->getBeachImages($beach_id, 'details_bg_img');
            $map = $this->__detailsModel->getBeachImages($beach_id, 'details_map_img');
            $slideimgs = $this->__detailsModel->getBeachImages($beach_id, 'details_slides_img');
            $middleimg = $this->__detailsModel->getBeachImages($beach_id, 'details_middle_img');
            $traits = $this->__detailsModel->getTraitsByIds($beach['trait1_id'], $beach['trait2_id'], $beach['trait3_id']);
            $infos = $this->__detailsModel->getMoreInfoByIds($beach['more_info1_id'], $beach['more_info2_id'], $beach['more_info3_id'], $beach['more_info4_id']);
            $weathers = $this->__detailsModel->getBeachWeather($beach['id']);
            $flights = $this->__detailsModel->getFlightsbyid($beach_id); 
            foreach ($traits as &$trait) {
                $trait['trait_description'] = str_replace('{beach_name}', $beach['name'], $trait['trait_description']);
            }
            foreach ($infos as &$info) {
                $info['more_info_content'] = str_replace('{beach_name}', $beach['name'], $info['more_info_content']);
            }
            foreach ($weathers as &$weather) {
                $weather['month'] = str_replace('12', 'DECEMBER', $weather['month'], );
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

            $this->view("layoutprint", [
                "content" => "downloadcontent",
                "beach" => $beach,
                "image" => $image,
                "map" => $map,
                "slideimgs" => $slideimgs,
                "middleimg" => $middleimg,
                "traits" => $traits,
                "infos" => $infos,
                "weathers" => $weathers,
                "flights" => $flights,
                "beach_id" => $beach_id
            ]);

        }
    }

}
?>