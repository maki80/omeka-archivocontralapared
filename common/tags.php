<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<h1>Todos los temas</h1>

<nav class="navigation items-nav secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<div id="tags-nav">
<?php
            $sortOptions = array(
                __('Most') => array('sort_field' => 'count', 'sort_dir' => 'd'),
                __('Least') => array('sort_field' => 'count','sort_dir' => 'a'),
                __('Alphabetical') => array('sort_field' => 'name', 'sort_dir'=> 'a'),
                __('Recent') => array('sort_field' => 'time', 'sort_dir' => 'd')
            );

            foreach ($sortOptions as $label => $params) {
                $uri = html_escape(current_url($params));
                $class = ($sort == $params) ? ' class="current"' : '';

                echo "<span $class><a href=\"$uri\">$label</a></span>";
            }
?>

<?php echo foot(); ?>


