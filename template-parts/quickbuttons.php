<?php
/**
 * The template part for displaying quick buttons.
 *
 * @package WordPress Sverige
 */
?>
<div id="support-btn" class="col-sm-6 col-md-3 quick-btn">
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'support' ) ) ); ?>" class="quick-link">
        <i class="fa fa-support"></i>
        <h2>Få hjälp</h2>
        <p class="quick-btn-text">
            Få hjälp via diskussionsforum eller från professionalla företag
          <span> Läs mer</span>
        </p>
    </a>
</div>
<div id="forum-btn" class="col-sm-6 col-md-3 quick-btn">
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'event' ) ) ); ?>" class="quick-link">
        <i class="fa fa-heart"></i>
        <h2>Hitta event</h2>
        <p class="quick-btn-text">
            Se kommande konferenser och meetups
          <span> Läs mer</span>
        </p>
    </a>
</div>
<div id="files-btn" class="col-sm-6 col-md-3 quick-btn">
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'engagera-dig' ) ) ); ?>" class="quick-link">
        <i class="fa fa-group"></i>
        <h2>Engagera dig</h2>
        <p class="quick-btn-text">Lorum Ipsum..
          <span> Läs mer</span>
        </p>
    </a>
</div>
<div id="community-btn" class="col-sm-6 col-md-3 quick-btn">
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'om' ) ) ); ?>" class="quick-link">
        <i class="fa fa-info"></i>
        <h2>Lär dig mer</h2>
        <p class="quick-btn-text">
            Läs om WordPress historia och open source-rörelsen
          <span> Läs mer</span>
        </p>
    </a>
</div>