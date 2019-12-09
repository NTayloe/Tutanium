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
                <small class="text-muted float-right">Last updated 3 mins ago</small>
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
                <small class="text-muted float-right">Last updated 3 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="\images\example-traffic.jpg" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">The Secrets of Traffic</h5>
                <p class="card-text">Learn to recognize, understand, and take advantage of the patterns of traffic.</p>
                <p class="card-text">
                <span class="badge badge-science">Science</span>
                <span class="badge badge-tech">Technology</span>
                <small class="text-muted float-right">Last updated 3 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <img class="card-img-top" src="https://thewiredrunner.com/wp-content/uploads/2018/08/AdobeStock_119400464.jpg" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">10 Ways to Improve Your Running Game</h5>
                <p class="card-text">Check out these easy tips to ensure you have the best run every time.</p>
                <p class="card-text">
                <span class="badge badge-exercise">Excerise</span>
                <span class="badge badge-health">Health</span>
                <small class="text-muted float-right">Last updated 3 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://d3awvtnmmsvyot.cloudfront.net/api/file/TW2BVmzQlqja8LvHhPne" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">Serving the Perfect Steak</h5>
                <p class="card-text">Impress your friends and serve the most delectable steak for tonight's dinner.</p>
                <p class="card-text">
                <span class="badge badge-food">Food</span>
                <small class="text-muted float-right">Last updated 3 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://s3.amazonaws.com/pbblogassets/uploads/2018/06/06120109/Audio-Mixing-Cover.jpg" height="55%" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">Mixing Your Own Audio</h5>
                <p class="card-text">Learn the basics of Audio Mixing and take your music to the next level.</p>
                <p class="card-text">
                <span class="badge badge-music">Music</span>
                <span class="badge badge-tech">Technology</span>
                <small class="text-muted float-right">Last updated 3 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <img class="card-img-top" src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F35%2F2009%2F04%2F01192930%2Fhow-to-eat-out-lose-weight.jpg&q=85" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">Choosing the Perfect Restaurant</h5>
                <p class="card-text">Learn how to choose the restaurant that everyone's guarenteed to love!</p>
                <p class="card-text">
                <span class="badge badge-social">Social</span>
                <span class="badge badge-life">Lifestyle</span>
                <small class="text-muted float-right">Last updated 3 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://www.thoughtco.com/thmb/TGyHZDLAI2oUc0DNqfmyQCyN3Ug=/768x0/filters:no_upscale():max_bytes(150000):strip_icc()/calculus-on-blackboard-79338340-5be4695946e0fb0026d6856f.jpg" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">Calculus: Evaluating Limits</h5>
                <p class="card-text">Solve even the trickiest of limits</p>
                <p class="card-text">
                <span class="badge badge-math">Math</span>
                <small class="text-muted float-right">Last updated 3 mins ago</small>
                </p>
                    <a href="#"class="stretched-link"></a>
                </div>
            </div>
            <div class="card" >
                <img class="card-img-top" src="https://img1.wsimg.com/isteam/ip/56f34daf-5abe-4a96-b877-ec3ae84398c9/047ae29d-cdde-4b05-8cc0-7bd01f749f59.jpg" height="55%" alt="Card image">
                <div class="card-body">
                <h5 class="card-title">How to Perfectly Fold your Clothes</h5>
                <p class="card-text">Make your closet look like it was folded by an over enthuastic Old Navy employee</p>
                <p class="card-text">
                <span class="badge badge-other">Other</span>
                <span class="badge badge-life">Lifestyle</span>
                <small class="text-muted float-right">Last updated 3 mins ago</small>
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