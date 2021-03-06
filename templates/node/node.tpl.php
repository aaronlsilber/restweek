<article class="<?php print $classes; ?>"<?php print $attributes; ?>>

<?php if ($user_picture || $display_submitted): ?>
  <header>
    <?php print $user_picture; ?>

    <?php print render($title_prefix); ?>
      <h1<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
      <span class="field--submitted"><?php print $submitted; ?></span>
    <?php endif; ?>
  </header>
<?php endif; ?>

<div class="node__content cf"<?php print $content_attributes; ?>>
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    print render($content);
  ?>
</div>

<?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
  <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
  </footer>
<?php endif; ?>

<?php print render($content['comments']); ?>

</article>
