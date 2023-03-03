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
        <input type="text" id="name" name="name" required value="<?php p($_['name']) ?>" placeholder="<?php p($l->t('Your name')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />

        <label>
            <?php p($l->t('Phone Number')); ?>
        </label>
        <input type="tel" id="phone" name="phone" required pattern='(\+|(\+[1-9])?[0-9]*)' value="<?php p($_['phone']) ?>" placeholder="<?php p($l->t('Your phone number')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />

        <label>
            <?php p($l->t('E-mail')); ?>
        </label>
        <input type="email" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php p($_['email']) ?>" placeholder="<?php p($l->t('Your email address')); ?>" />
        <label>
            <?php p($l->t('Minimum lead time')); ?>
        </label>
        <!-- <input type="number" id="prepTime" name="prepTime" required value="<?php p($_['prepTime']) ?>" placeholder="<?php p($l->t('Minimum lead time')); ?>" /> -->
        <select id="prepTime">
            <option value="0" <?php if($_['prepTime']=="0") echo 'selected="selected"'; ?>>No lead time</option>
            <option value="15" <?php if($_['prepTime']=="15") echo 'selected="selected"'; ?>>15 minutes</option>
            <option value="30" <?php if($_['prepTime']=="30") echo 'selected="selected"'; ?>>30 minutes</option>
            <option value="60" <?php if($_['prepTime']=="60") echo 'selected="selected"'; ?>>1 hour</option>
            <option value="120" <?php if($_['prepTime']=="120") echo 'selected="selected"'; ?>>2 hours</option>
            <option value="240" <?php if($_['prepTime']=="240") echo 'selected="selected"'; ?>>4 hours</option>
            <option value="480" <?php if($_['prepTime']=="480") echo 'selected="selected"'; ?>>8 hours</option>
            <option value="720" <?php if($_['prepTime']=="720") echo 'selected="selected"'; ?>>12 hours</option>
            <option value="1440" <?php if($_['prepTime']=="1440") echo 'selected="selected"'; ?>>1 day</option>
            <option value="2880" <?php if($_['prepTime']=="2880") echo 'selected="selected"'; ?>>2 days</option>
            <option value="5760" <?php if($_['prepTime']=="5760") echo 'selected="selected"'; ?>>4 days</option>
        </select>
    </div>

</div>