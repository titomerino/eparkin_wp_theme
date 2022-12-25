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
        <div
          class="content"
          data-aos="fade-right"
          data-aos-mirror="true"
        >

          <div
            class="content-slider _mb-2"
            data-flickity='{
              "draggable": true,
              "pageDots": true,
              "imagesLoaded": true,
              "prevNextButtons": false,
              "autoPlay": <?= $hero['slide_time']; ?>,
              "fade": true
            }'
          >
            <?php foreach ($hero['slider'] as $item): ?>
              <div class="item">
                <div class="content">
                  <?= $item['content']; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

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
        <div
          class="image"
          data-aos="fade-left"
          data-aos-mirror="true"
        >
          <?= wp_get_attachment_image($hero['image'], 'large'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php $channels = $f['communication_channels']; ?>
  <?php if ($channels): ?>
    <div class="section-wrapper _pb-0" id="canales">
      <div class="container">
        <h2 class="_mb-3 _text-center"><strong><?= $channels['title']; ?></strong></h2>
        <div class="row">
          <?php foreach ($channels['channels'] as $item): ?>
          <div class="col-lg-4 col-md-6">
            <div class="card-item" data-aos="fade-down">
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

  <?php $step_list = $f['step_list']; ?>
  <?php if ($step_list): ?>
  <div class="section-wrapper -alt _pt-0 _pb-0">
    <div class="svg-wave -white">
      <?= Utils::svg('wave-top', ''); ?>
    </div>
    <div class="container">
      <h2 class="_mb-2 _text-center"><strong><?= $step_list['title']; ?></strong></h2>
      <div class="step-list">
        <?php foreach ($step_list['steps'] as $index => $item): ?>
        <div class="item <?= (($index % 2) == 0) ? '' : '-reverse'; ?>">
          <div
            class="number"
            data-aos-mirror="true"
            data-aos="fade-down-right"
          ><span>#<?= $index + 1; ?></span></div>
          <div
            class="content"
            data-aos-mirror="true"
            data-aos="fade-down-right"
          >
            <h3 class="h4"><strong><?= $item['title']; ?></strong></h3>
            <?= $item['content']; ?>
          </div>
          <div
            class="image"
            data-aos-mirror="true"
            data-aos="fade-down-left"
          >
            <?= wp_get_attachment_image($item['image'], 'large'); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php $plan_list = $f['plan_list']; ?>
  <?php if ($plan_list): ?>
    <div class="section-wrapper _pt-0">
    <div class="svg-wave -alt">
      <?= Utils::svg('wave-top', ''); ?>
    </div>
      <div class="container -medium">
        <h2 class="_mb-3 _text-center"><strong><?= $plan_list['title']; ?></strong></h2>

        <div class="row">
          <?php foreach ($plan_list['plans'] as $item): ?>
            <div class="col-md-6 _col-flex">
              <div
                class="card-item -flex"
                data-aos="fade-down"
                data-aos-mirror="true"
              >
                <div class="icon">
                  <?= wp_get_attachment_image($item['icon']); ?>
                </div>
                <h3 class="h4 _text-center"><strong><?= $item['title']; ?></strong></h3>
                <ul class="check-list _mt-2">
                <?php foreach ($item['features'] as $li): ?>
                  <li><?= $li['text']; ?></li>
                <?php endforeach; ?>
                </ul>
                <?php if ($item['link']): ?>
                  <p class="_mb-0 _text-center _mt-2">
                    <a
                      href="<?= $item['link']['url']; ?>"
                      class="button -alt -style-2"
                      target="<?= $item['link']['target'] ?: '_self'; ?>"
                    >
                      <span><?= $item['link']['title']; ?></span>
                    </a>
                  </p>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  <?php endif; ?>

  <?php $register = $f['register']; ?>
  <?php if ($register): ?>
    <div class="section-wrapper _pb-0">
      <div class="container -narrow">
        <?= $register['content']; ?>
        <p class="_text-center _mt-2">
          <a
            href="<?= $register['link']['url']; ?>"
            class="button -alt -style-2"
            target="<?= $register['link']['target'] ?: '_self'; ?>"
            data-aos="zoom-in"
            data-aos-mirror="true"
          >
            <span class="_text-big"><?= $register['link']['title']; ?></span>
          </a>
        </p>
      </div>
    </div>
  <?php endif; ?>

  <?php $clients = $f['clients']; ?>
  <?php if ($clients): ?>
    <div class="section-wrapper -alt _pt-0 _pb-0">
      <div class="svg-wave -white">
        <?= Utils::svg('wave-top', ''); ?>
      </div>

      <div class="container">
        <h2 class="_mb-3 _text-center"><strong><?= $clients['title']; ?></strong></h2>

        <div class="client-grid">
          <?php foreach ($clients['clients'] as $item): ?>
            <div class="item">
              <a
                href="<?= $item['web_site']; ?>"
                target=""
              >
                <?= wp_get_attachment_image($item['logo'], 'medium'); ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
