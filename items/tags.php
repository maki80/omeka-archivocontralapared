<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<h1>Todos los temas</h1>

<nav class="navigation items-nav secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<div id="tags-nav">


<?php echo tag_cloud($tags, 'exhibits/browse', 10005, true, 'before'); ?>


</div>

<?php echo foot(); ?>
