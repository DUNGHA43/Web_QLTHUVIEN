<?php 
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>
<body style="margin-top: 80px;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block" style="width: 100%; height: 650px;" src="http://localhost/Web_QLTHUVIEN/public/client/image/wallhaven-nzo8yw.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block" style="width: 100%; height: 650px;" src="http://localhost/Web_QLTHUVIEN/public/client/image/wallhaven-4yg8qg.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block" style="width: 100%; height: 650px;" src="http://localhost/Web_QLTHUVIEN/public/client/image/wallhaven-6kewql.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 text-center">
                <img class="rounded-circle" src="http://localhost/Web_QLTHUVIEN/public/client/image/member1.jpg" alt="Generic placeholder image" width="140" height="140">

                <h2>
                    Heading
                </h2>
                <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde sed magni cum temporibus, et, quos
                    voluptatum laboriosam mollitia eligendi numquam labore officia distinctio quasi repudiandae!
                    Dignissimos ratione quis quam. Commodi!
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <img class="rounded-circle" src="http://localhost/Web_QLTHUVIEN/public/client/image/member2.png" alt="Generic placeholder image" width="140" height="140">

                <h2>
                    Heading
                </h2>
                <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde sed magni cum temporibus, et, quos
                    voluptatum laboriosam mollitia eligendi numquam labore officia distinctio quasi repudiandae!
                    Dignissimos ratione quis quam. Commodi!
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <img class="rounded-circle" src="http://localhost/Web_QLTHUVIEN/public/client/image/member3.jpg" alt="Generic placeholder image" width="140" height="140">

                <h2>
                    Heading
                </h2>
                <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde sed magni cum temporibus, et, quos
                    voluptatum laboriosam mollitia eligendi numquam labore officia distinctio quasi repudiandae!
                    Dignissimos ratione quis quam. Commodi!
                </p>
            </div>
        </div>

        <hr class="featurette-divider" style="margin-top: 20px;">

        <div class="row">
            <div class="col-md-7 order-md-2 mt-3">
                <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for
                        yourself.</span>
                </h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod
                    semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac
                    cursus
                    commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                    src="http://localhost/Web_QLTHUVIEN/public/client/image/page2.jpg" data-holder-rendered="true" style="width: 500px; height: 500px;">
            </div>
        </div>

        <hr class="featurette-divider " style="margin-top: 20px;">

        <div class="row featurette" style="margin-bottom: 10px;">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
                    tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                    src="http://localhost/Web_QLTHUVIEN/public/client/image/page1.jpg" data-holder-rendered="true" style="width: 500px; height: 500px;">
            </div>
        </div>
    </div>
</body>
    <?php 
    $content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra
    $htmlFilePath = CLIENT_PATH . 'layouts/default.php';
    include $htmlFilePath; // Thực hiện thừa kế
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

