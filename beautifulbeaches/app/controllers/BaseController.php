<?php
class BaseController {
    const VIEW_FOLDER = "app/views/";
    function view($path, array $dataarr = []) {
        $path = self::VIEW_FOLDER.$path.".php";
        $data= $dataarr;
        return require $path;
    }
    function initModel($modelname, $conn) {
        if (file_exists("./app/models/$modelname.php")){
            require_once "./app/models/$modelname.php";
            if(class_exists($modelname)){
                $model = new $modelname($conn);
                return $model;
            }
        }
        return null;
    }

}
?>