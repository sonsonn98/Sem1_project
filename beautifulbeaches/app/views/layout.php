<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playwrite+CU:wght@100..400&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/reponsive.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/header.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/home.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/details.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/rating.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/aboutus.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/faq.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/contact-style.css" />    
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/footer.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/maincontent.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/slide.css" />
    <link rel="stylesheet" href="/beautifulbeaches/app/asset/ticker.css">
  
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <title></title>
</head>
<body>
    <?php    
    $this->view("header",$data);
    $this->view($data["content"], $data); 
    $this->view("footer");
    ?>  
        <script
      src="https://kit.fontawesome.com/yourcode.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/3687ed1fbf.js"
      crossorigin="anonymous"
    ></script>
    

    <script src="/beautifulbeaches/app/asset/scrollHeader.js"></script>
    <script src="/beautifulbeaches/app/asset/ticker.js"></script>
</body>

</html>