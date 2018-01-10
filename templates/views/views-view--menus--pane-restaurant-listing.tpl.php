<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="gw gw--gapless">
    <div class="g one-whole lap-two-fifths desk-one-third">
        <?php if ($header): ?>
        <div class="view-header" data-mh="oven-restaurants">
        <?php print $header; ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="g one-whole lap-three-fifths desk-two-thirds">
        <?php if ($rows): ?>
        <div class="view-content" data-mh="oven-restaurants">
        <?php print $rows; ?>
        </div>
        <?php elseif ($empty): ?>
        <div class="view-empty" data-mh="oven-restaurants">
        <?php print $empty; ?>
        </div>
        <?php endif; ?>
    </div>
  </div>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>