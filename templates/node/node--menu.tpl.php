<?php $optionseperator = "</div> <div class='optionseperator'>or</div> <div class='menu__item'>"; ?>
<article class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <header class="restaurant restaurant--summary">
    <h1 class="restaurant__name"><?php echo $menu['restaurant']['name']; ?></h1>
    <div class="restaurant__phone"><a href="tel:<?php echo $menu['restaurant']['phone']; ?>"><?php echo $menu['restaurant']['phone']; ?></a></div>
    <div class="restaurant__address"><a href="<?php echo $menu['restaurant']['map']; ?>" target="_blank">Map</a></div>
  </header>

  <section class="menu__course">
    <div class="wrapper">
      <h1 class="label-above">Appetizer</h1>
      <div class="menu__item"><?php echo implode($optionseperator, $menu['appetizer']); ?></div>
    </div>
  </section>
  <section class="menu__course">
    <div class="wrapper">
      <h1 class="label-above">Entree</h1>
      <div class="menu__item"><?php echo implode($optionseperator, $menu['entree']); ?></div>
    </div>
  </section>
  <section class="menu__course">
    <div class="wrapper">
      <h1 class="label-above">Dessert</h1>
      <div class="menu__item"><?php echo implode($optionseperator, $menu['dessert']); ?></div>
    </div>
  </section>

  <footer>
    <p><em>*Beverages and tips are not included in the price of a meal.</em></p>
  </footer>
</article>