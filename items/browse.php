<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle, 'bodyclass' => 'items browse'));
?>

<div id="primary" class="browse">


    <h1><?php echo __('%s archivos', $total_results); ?></h1>

    <?php echo item_search_filters(); ?>

    <ul class="items-nav navigation" id="secondary-nav">
        <?php echo public_nav_items(); ?>
    </ul>

    <?php echo pagination_links(); ?>

    <?php if ($total_results > 0): ?>

    <?php
    $sortLinks[__('Alfabéticamente')] = 'Dublin Core,Title';
    $sortLinks[__('Cronológicamente')] = 'added';
    ?>
    <div id="sort-links">
        <?php echo browse_sort_links($sortLinks); ?>
    </div>

    <?php endif; ?>

             <div class="col-izq">Imágenes</div>
             <div class="item-meta-der">
                <div class="col-title title">Título</div>    
                <div class="col-cent title">Descripción</div>   
                <div class="col-der title">Temas</div>   
            </div>
    

    <?php foreach (loop('items') as $item): ?>              

      
        <div class="item hentry">

        <div class="col-izq">
            <?php if (metadata($item, 'has thumbnail')): ?>
                <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail')); ?>
                </div>
            <?php endif; ?>
        </div>
            <div class="item-meta-der">
                <div class="col-title">

                <?php echo link_to_item(metadata($item, array('Dublin Core', 'Title'), array('class'=>'permalink'))); ?>

            </div>


            <div class="col-cent">

            <?php if ($text = metadata($item, array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
                <div class="item-description">
                <p><?php echo $text; ?></p>
                </div>
            <?php elseif ($description = metadata($item, array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                <div class="item-description">
                <?php echo $description; ?>
                </div>
            <?php endif; ?>
            </div>

            <div class="col-der">

            <?php if (metadata($item, 'has tags')): ?>
                <div class="tags">
                <?php echo tag_string('items'); ?></p>
                </div>
            <?php endif; ?>

            </div>

            <?php echo fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
    <?php endforeach; ?>


    <?php echo fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

    <?php echo pagination_links(); ?>
</div>

</div><!-- end primary -->

<?php echo foot(); ?>
