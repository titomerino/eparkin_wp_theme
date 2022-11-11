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

  <?php $channels = $f['communication_channels']; ?>
  <?php if ($channels): ?>
    <div class="section-wrapper">
      <div class="container">
        <h2 class="_mb-3 _text-center"><strong><?= $channels['title']; ?></strong></h2>
        <div class="row">
          <?php foreach ($channels['channels'] as $item): ?>
          <div class="col-lg-4 col-md-6">
            <div class="card-item">
              <div class="icon">
                <?= wp_get_attachment_image($item['icon']); ?>
              </div>
              <h3 class="h4 _text-center"><strong><?= $item['title']; ?></strong></h3>
              <?= $item['content']; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
