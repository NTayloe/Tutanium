<?php require_once('../includes/content-fill.php'); ?>

<?php
    $amount = 24;
    repeat($amount)
?>

<script>
    $(window).scroll(function() {
        if($(window).scrollTop() == $(document).height() - $(window).height()) {
               //Detects when users has scrolled to bottom of page
               //and would load more content
        }
    });

</script>