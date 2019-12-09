<?php
    function repeat($amount)
    {
        echo '<div class="row">';
        for($i = 1; $i <= $amount; $i++)
        {
            $item = strval($i);
            echo
            "<div class='col-lg-4 col-md-6 mb-4'>
                <div class='card h-100'>
                    <a href='#'><img class='card-img-top' src='http://placehold.it/800x500' alt=''></a>
                    <div class='card-body'>
                        <h4 class='card-title'>
                            <a href='#'>Item $item</a>
                        </h4>
                        <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                    </div>
                    <div class='card-footer'>
                        <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
            </div>";
        }
        echo '</div>';
    }

?>