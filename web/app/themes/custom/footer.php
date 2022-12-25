<?php

use utils\Utils;

$footer = get_field('footer', 'option')
?>

<footer class="site-footer">
  <div class="svg-wave -alt">
    <?= Utils::svg('wave-top', ''); ?>
  </div>
  <div class="container">
    <div class="row _bb-white">
      <div class="col-md-6">
        <h3><strong>Nosotros</strong></h3>
        <?php foreach (Utils::menu_tree('Menu footer') as $id => $item) : ?>
          <?= get_template_part('template-parts/site-nav-item', null, ['item' => $item]) ?>
        <?php endforeach ?>
      </div>
      <div class="col-md-6">
        <?= $footer['contact']; ?>
        <!-- Social links -->
        <ul class="list-inline">
          <?php if (function_exists('get_field')): ?>
            <?php foreach (get_field('social_links', 'options') as $item): ?>
              <?php $link = $item['link'] ?>
              <li><a href="<?= $link['url'] ?>" target="<?= $link['target'] ?: '_self' ?>">
                <span class="_visually-hidden"><?= $link['title'] ?></span>
                <?= Utils::svg(Utils::get_service_from_url($link['url'])) ?>
              </a></li>
            <?php endforeach ?>
          <?php endif ?>
      </div>
    </div>

    </ul>

    <!-- Copyright -->
    <p class="copyright _mt-1 _text-center">
      <?= get_option('blogname') ?> es una marca de DIEZ CUATRO, S.A. DE C.V.
      <br>&copy; <?= date('Y') ?> Todos los derechos reservados.
    </p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
