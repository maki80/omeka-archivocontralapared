<?php
$collectionId = $collection->id;
echo head(array('title'=>metadata('collection', array('Dublin Core', 'Title')), 'bodyclass' => 'collections show')); ?>

<div id="collection-tree">
<?php echo $this->collectionTreeList($collection_tree); ?>
</div>

<h1><?php echo metadata('collection', array('Dublin Core', 'Title')); ?></h1>


<div id="primary" class="show">
        <?php $collectionName = metadata($collection, array('Dublin Core', 'Title')); ?>
<?php $count = metadata($collection, 'total_items'); ?>

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

     <div id="collection-items">
    

        <?php $collectionItems = get_records('item', array('collection' => $collectionId), 3); ?>

                     <div class="col-izq">Imágenes</div>
             <div class="item-meta-der">
                <div class="col-title title">Título</div>    
                <div class="col-cent title">Descripción</div>   
                <div class="col-der title">Temas</div>   
            </div>

        <?php foreach (loop('items', $collectionItems) as $item): ?>
            <div class="item hentry">

            <div class="col-izq">
            <?php if (metadata($item, 'has thumbnail')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail', array('alt'=>metadata($item,array('Dublin Core', 'Title'))))); ?>
            </div>
            <?php endif; ?>
            </div>
            
            <div class="item-meta-der">
            <div class="col-title">
            <?php echo link_to_item(metadata($item, array('Dublin Core', 'Title')), array('class'=>'permalink'), 'show', $item); ?>
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
            </div>

            </div>
    <?php endforeach; ?>
    </div><!-- end collection-items -->
    
</div>
<?php echo foot(); ?>
