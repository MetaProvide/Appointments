<?php

/** @var $l \OCP\IL10N */
/** @var $_ array */

script('appointments', 'personalSettings'); // adds a JavaScript file
style('appointments', 'settings'); // adds a CSS file

?>

<div id="appointments" class="section">
    <div class="header">
        <h2><?php p($l->t('Appointments')); ?></h2>
        <div class="save">
            <div id="saved"><?php p($l->t('Saved')); ?></div>
            <button id="appointments-save-settings" class="primary"><?php p($l->t("Save Changes")); ?></button>
        </div>
    </div>


    <div class="urls">
        <h3>
            <?php p($l->t('Public Page URL')); ?>
        </h3>
        <a id="pubUrl" href="<?php p($_['public-page-url']) ?>" target="_blank">
            <?php p($_['public-page-url']) ?>
        </a>
        <button id="copyPubUrl" class="copy-btn"></button>
        <div id="pubUrlLabel"></div>

        <h3>
            <?php p($l->t('Embeddable URL')); ?>
        </h3>
        <a id="embedUrl" href="<?php p($_['embed-url']) ?>" target="_blank">
            <?php p($_['embed-url']) ?>
        </a>
        <button id="copyEmbUrl" class="copy-btn"></button>
        <div id="embedUrlLabel"></div>
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
            <?php p($l->t('Full Name')); ?>
        </label>
        <input type="text" id="name" name="name" value="<?php p($_['name']) ?>" placeholder="<?php p($l->t('Your name')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />
       
        <label>
            <?php p($l->t('Phone Number')); ?>
        </label>
        <input type="tel" id="phone" name="phone" data-filter='(\+|(\+[1-9])?[0-9]*)' value="<?php p($_['phone']) ?>" placeholder="<?php p($l->t('Your phone number')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />

        <label>
            <?php p($l->t('E-mail')); ?>
        </label>
        <input type="email" id="email" name="email" value="<?php p($_['email']) ?>" placeholder="<?php p($l->t('Your email address')); ?>" />
    </div>

</div>
