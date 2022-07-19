<?php

/** @var $l \OCP\IL10N */
/** @var $_ array */

script('appointments', 'personal-settings'); // adds a JavaScript file
style('appointments', 'settings'); // adds a CSS file

?>

<div id="appointments" class="section">
    <h2><?php p($l->t('Appointments')); ?></h2>


    <div class="pub-page">
        <h3>
            <?php p($l->t('Public Page URL')); ?>
        </h3>
        <a id="pubUrl" href="<?php p($_['public-page-url']) ?>" target="_blank">
            <?php p($_['public-page-url']) ?>
        </a>
        <button id="copyPubUrl" class="copy-btn"></button>
        <div id="pubUrlLabel"><?php p($l->t('Copied')); ?></div>
    </div>
    <div class="title-subtitle">
        <h2>
            <?php p($l->t('Your Contact Information')); ?>
        </h2>
        <p class="subtitle">
            <?php p($l->t('Form header and event organizer settings')); ?>
        </p>
    </div>
    <div class="form-col">
        <label>
            <?php p($l->t('Name')); ?>
        </label>
        <input type="text" id="name" name="name" value="<?php p($_['name']) ?>" placeholder="<?php p($l->t('Your name')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />
        <label>
            <?php p($l->t('E-mail')); ?>
        </label>
        <input type="email" id="email" name="email" value="<?php p($_['email']) ?>" placeholder="<?php p($l->t('Your email address')); ?>" />

        <label>
            <?php p($l->t('Phone')); ?>
        </label>
        <input type="tel" id="phone" name="phone" data-filter='(\+|(\+[1-9])?[0-9]*)' value="<?php p($_['phone']) ?>" placeholder="<?php p($l->t('Your phone number')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />


    </div>
    <div>
        <button id="appointments-save-settings" class="primary"><?php p($l->t("Save")); ?></button>
        <div id="saved"><?php p($l->t('Saved')); ?></div>
    </div>

</div>