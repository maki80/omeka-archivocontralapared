<?php 
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse')); 
?>

<div id="primary" class="browse">
    <h1><?php echo __('%s temas', $total_results); ?></h1>
    <?php echo pagination_links(); ?>
    
    <?php
    $sortLinks[__('Alfabéticamente')] = 'Dublin Core,Title';
    $sortLinks[__('Cronológicamente')] = 'added';
    ?>

    <div id="sort-links">
        <?php echo browse_sort_links($sortLinks); ?>
    </div>
    <div class="col-izq">Imágenes</div>
             <div class="item-meta-der">
                <div class="col-title title">Número de archivos </div>    
                <div class="col-cent title">Nombre del tema</div>   
                <div class="col-der title">Visitar</div>   
            </div>

    <?php if (total_records('collection') > 0): ?>
    <?php foreach (loop('collection') as $collection): ?>


        <div class="collection">
        <div class="col-izq">
        <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
            <?php endif; ?>
        </div>

        <div class="item-meta-der">
            <div class="col-title">
            <?php $collectionName = metadata($collection, array('Dublin Core', 'Title')); ?>
<?php $count = metadata($collection, 'total_items'); ?>
<?php echo text_to_paragraphs("$count"); ?>
            </div>


            
            <div class="col-cent">
            <?php echo link_to_collection("$collectionName"); ?>

            </div>

            <div class="col-der">

            <?php echo link_to_items_browse(__('Ver archivos en %s', metadata($collection, array('Dublin Core', 'Title'))), array('collection' => $collection->id)); ?>
    
            <?php echo fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
            </div>

            </div><!-- end class="item-meta-der" -->

    
        </div><!-- end class="item-hentry" -->

    <?php endforeach; ?>

    <?php echo pagination_links(); ?>
  
    <?php else: ?>
      <p><?php echo __('There are no collections.'); ?></p>
    <?php endif; ?>
    
    <?php echo fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
</div><!-- end primary -->
<?php echo foot(); ?>
