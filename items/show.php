<?php echo head(array('title' => metadata($item, array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div id="primary">
<!-- If the item belongs to a collection, the following creates a link to that collection. -->


        <?php if (metadata('item', 'has files')): ?>
            <div id="itemfiles" class="element">
                    <div class="item-file image-jpeg">
                        <?php foreach($item->Files as $file) {
                        echo '<a class="download-file" data-featherlight="image" href="';
                        echo metadata($file, 'uri');
                        echo '">';
                        echo file_image('fullsize', array('class' => 'full'), $file);
                        echo '</a>';
                        } ?>
                    </div>
            </div>
            <?php endif; ?>

    


</div><!-- end primary -->

<div id="secondary">
    <div id="boton-block">
    <?php foreach($item->Files as $file) {
                        echo '<a class="image-file boton"; alt="descargar"; href="';
                        echo metadata($file, 'fullsize_uri');
                        echo '" download>Descargar</a><a class="image-file remix boton"; alt="subir"; href="http://www.archivocontralapared.com/contribution">Subir</a>
                        ';
                        } ?>
<div class="share boton">
<share-button></share-button>
  <script src='https://d33wubrfki0l68.cloudfront.net/js/77c4c5f1c76a34f7e93cb137111674922c21e6a7/share-button.min.js'>Compartir</script>
  <script>
    var shareButton = new ShareButton();
  </script>
</div>
  <a class="coment boton" href="#coment" alt="comentar">Comentar</a>
     </div>

    <div class="document-details">
    <div id="item-tags" class="element">
    <h2>Título</h2>
    <div class="element-text tags"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></div>
</div>

    <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata($item, 'has tags')): ?>
    <div id="item-tags" class="element">
        <h2>Temas</h2>
        <div class="element-text tags"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif; ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (get_collection_for_item()): ?>
        <div id="collection" class="element">
            <h2>Colección</h2>
            <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
        </div>
    <?php endif; ?>

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h2>Cita</h2>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>

    </div>


</div>

    
</div>

<div class="document-social">
    <?php echo all_element_texts($item); ?>



    <!-- Show comentary -->
    <a name="coment"></a><?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>  
</div>


</div><!-- end secondary -->



<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>


<?php echo foot();
