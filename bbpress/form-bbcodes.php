<?php

/**
 * BBCode help button
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<!-- BBCode help button modal -->
<button type="button" class="btn btn-primary btn-xs" id="bbcode-help-btn" data-toggle="modal" data-target="#bbcode-help">
  <i class="fa fa-question-circle" aria-hidden="true"></i> Formatering
</button>
<!-- END BBCode help button modal -->
<!-- BBCode help modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="bbcode-help">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Stäng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hjälp för formatering</h4>
      </div>
      <div class="modal-body">
        <p>Är du osäker på hur man formaterar innehåll i forumet? Här följer snabbhjälp för använding av så kallade BBkoder som används för att formatera och infoga innehåll.</p>
        <h4>Tillgängliga koder</h4>
        <p><strong>[b] - Fetstil</strong><br />
        Markera texten du vill göra fet och klicka på knappen <i class="fa fa-bold" aria-hidden="true"></i> eller skriv:</p>
        <pre>[b]text[/b]</pre>
        <p><strong>[i] - Kursiv</strong><br />
        Markera texten du vill göra till kursiv och klicka på knappen <i class="fa fa-italic" aria-hidden="true"></i> eller skriv:</p>
        <pre>[i]text[/i]</pre>
        <p><strong>[u] - Understreck</strong><br />
        Markera texten du vill göra understruken och klicka på knappen <i class="fa fa-underline" aria-hidden="true"></i> eller skriv:</p>
        <pre>[u]text[/u]</pre>
        <p><strong>[s] - Genomstrykning</strong><br />
        Markera texten du vill göra genomstruken och klicka på knappen <i class="fa fa-strikethrough" aria-hidden="true"></i> eller skriv:</p>
        <pre>[s]text[/s]</pre>
        <p><strong>[scode] - Kodvisning</strong><br />
        Markera texten du vill ska visas som kod och klicka på knappen <i class="fa fa-code" aria-hidden="true"></i> eller skriv:</p>
        <pre>[scode]kod[/scode]</pre>
        <p><strong>[blockquote] - Citat</strong><br />
        Markera texten du vill göra till ett citat och klicka på knappen <i class="fa fa-quote-right" aria-hidden="true"></i> eller skriv:</p>
        <pre>[blockquote]text[/blockquote]</pre>
        <p><strong>[ol]/[ul]/[li] - Listor</strong><br />
        Markera texten du vill göra till en lista och klicka på knappen <i class="fa fa-list-ul" aria-hidden="true"></i> (oordnad) eller <i class="fa fa-list-ol" aria-hidden="true"></i> (ordnad) och markera sedan texten för listpunkter och klicka på knappen <i class="fa fa-list" aria-hidden="true"></i> eller skriv:</p>
        <pre>[ol]text[/ol]</pre>
        <pre>[ul]text[/ul]</pre>
        <pre>[li]text[/li]</pre>
        <p><strong>[url] - Länkar</strong><br />
        Markera adressen du vill ska länkas och klicka på knappen <i class="fa fa-external-link" aria-hidden="true"></i>, använd attribut för att länka en text se nedan:</p>
        <pre>[url]adress[/url]</pre>
        <pre>[url url="adress"]text[/url]</pre>
        <p><strong>[img] - Bild</strong><br />
        Markera bildadressen du vill ska infogas som bild och klicka på knappen <i class="fa fa-picture-o" aria-hidden="true"></i> eller skriv:</p>
        <pre>[img]bild_adress[/img]</pre>
        <pre>[img="{width}x{height}"]bild_adress[/img]</pre>
        <pre>[img width={x} height={y}]bild_adress[/img]</pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END BBCode help modal -->
