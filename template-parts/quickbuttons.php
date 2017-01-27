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
            Om du stöter på problem eller har frågor kring WordPress så finns det många sätt att få hjälp
          <span> Läs mer</span>
        </p>
    </a>
</div>
<div id="forum-btn" class="col-sm-6 col-md-3 quick-btn">
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'event' ) ) ); ?>" class="quick-link">
        <i class="fa fa-heart"></i>
        <h2>Hitta event</h2>
        <p class="quick-btn-text">
            Vill du lära dig mer och träffa nya människor så finns det många olika WordPress relaterade event
          <span> Läs mer</span>
        </p>
    </a>
</div>
<div id="files-btn" class="col-sm-6 col-md-3 quick-btn">
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'engagera-dig' ) ) ); ?>" class="quick-link">
        <i class="fa fa-group"></i>
        <h2>Engagera dig</h2>
        <p class="quick-btn-text">
            Hjälp till att bygga och vidareutvecklare WordPress eller var med och planera kommande event
          <span> Läs mer</span>
        </p>
    </a>
</div>
<div id="community-btn" class="col-sm-6 col-md-3 quick-btn">
    <a href="#wpsv-story" class="quick-link">
        <i class="fa fa-info"></i>
        <h2>Lär dig mer</h2>
        <p class="quick-btn-text">
            Läs om WordPress historia och open source-rörelsen
          <span> Läs mer</span>
        </p>
    </a>
</div>
