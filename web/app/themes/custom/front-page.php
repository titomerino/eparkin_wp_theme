<?php
use utils\Utils;

get_header();

$f = get_fields();
?>

<main role="main" id="main">
  <?php $hero = $f['hero']; ?>
  <?php if ($hero): ?>
  <div class="section-wrapper -hero -zeropadding">
    <div class="container">
      <div class="banner-hero">
        <div class="content">
          <?= $hero['content']; ?>
          <?php if ($hero['link']): ?>
          <a
            href="<?= $hero['link']['url']; ?>"
            class="button -alt -style-2"
            target="<?= $hero['link']['target'] ?: '_self'; ?>"
          >
            <span><?= $hero['link']['title']; ?></span>
          </a>
          <?php endif; ?>
        </div>
        <div class="image">
          <?= wp_get_attachment_image($hero['image'], 'large'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
