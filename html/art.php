<?php require_once('../includes/helper.php'); ?>

<?php render('header', array('title' => 'Browse')); ?>

<!-- Featured Carousel -->
<div class="container-fluid">
    <h1><br>Featured Tutorials</h1>
    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselIndicators" data-slide-to="1"></li>
            <li data-target="#carouselIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="#">
                    <img class="d-block w-100" src="../images/example-traffic.jpg" alt="Traffic lights">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>The Secrets of Traffic</h5>
                        <p>Learn to recognize, understand, and take advantage of the patterns of traffic.</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img class="d-block w-100" src="../images/example-photography.jpg" alt="Camera on logs">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Take Better Log Pictures</h5>
                        <p>Taking quality pictures of logs is a skill that every respectable photographer should learn.</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img class="d-block w-100" src="../images/example-painting.jpg" alt="Painting hanging on wall">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hanging Paintings Like a Pro</h5>
                        <p>Master important aspects of hanging and framing paintings such as spacing, tools, and matching.</p>
                    </div>
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container">
    <div class="card-deck">
        <div class="row">
            <div class="card">
                <img class="card-img-top" src="\images\example-painting.jpg" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">Hanging Paintings Like a Pro</h5>
                <p class="card-text">Master important aspects of hanging and framing paintings such as spacing, tools, and matching.</p>
                <p class="card-text">
                <span class="badge badge-art">Art</span>
                <span class="badge badge-happy">Happiness</span>
                <small class="text-muted float-right">Last updated 9 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="\images\example-photography.jpg" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">Take Better Log Pictures</h5>
                <p class="card-text">Taking quality pictures of logs is a skill that every respectable photographer should learn.</p>
                <p class="card-text">
                <span class="badge badge-art">Art</span>
                <span class="badge badge-nature">Nature</span>
                <small class="text-muted float-right">Last updated 6 hours ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Categories Buttons -->
<div class="container-fluid">
    <h1>Categories</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Technology</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Science</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Math</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Art</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Food</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Lifestyle</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Nature</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Music</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Exercise</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Social</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Health</a>
            </div>
            <div class="col-sm">
                <a class="btn btn-secondary btn-card" href="#" role="button">Happiness</a>
            </div>
        </div>
    </div>
</div>

<?php render('footer'); ?>