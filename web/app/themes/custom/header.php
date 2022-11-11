<?php

use utils\Utils;

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php wp_head(); ?>
  </head>

  <?php
    $logo = get_field('logo', 'option');
    $register_link = get_field('register_link', 'option');
  ?>

  <body id="top" <?php body_class(); ?>>

    <!-- Skip to main -->
    <a href="#main" class="skip-to-main">Skip to main content</a>

    <!-- Main navigation -->
    <div class="site-header">
      <div class="container">
        <a href="/" class="logo">
          <?= wp_get_attachment_image($logo, 'large'); ?>
          <span class="_visually-hidden">Go to home</span>
        </a>
        <nav>
          <ul class="site-nav">
            <?php foreach (Utils::menu_tree('Main Menu') as $id => $item) : ?>
              <?= get_template_part('template-parts/site-nav-item', null, ['item' => $item]) ?>
            <?php endforeach ?>
            <li>
              <a
                  href="<?= $register_link['url']; ?>"
                  class="button -white"
                  target="<?= $register_link['target'] ?: '_self'; ?>"
                >
                  <?= Utils::svg('register', 'inline-svg'); ?>
                  <strong><?= $register_link['title']; ?></strong>
                </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
