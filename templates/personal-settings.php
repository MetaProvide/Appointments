<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */

script('appointments', 'personal-settings');         // adds a JavaScript file
style('appointments', 'settings');    // adds a CSS file
?>

<div id="appointments" class="section">
        <h2><?php p($l->t('Appointments')); ?></h2>

        <p>
                <?php p($l->t('Your contact information')); ?>
        </p>

        <a>
            <?php p($_['public-page-url']) ?>
        </a>

        name, email, phone, address
        <div class="col">
            <input type="tel" id="phone" name="phone" value="<?php p($_['phone']) ?>" placeholder="<?php p($l->t('Your phone number')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />
            <input type="email" id="email" name="email" value="<?php p($_['email']) ?>" placeholder="<?php p($l->t('Your email address')); ?>" autocomplete="on" autocapitalize="none" autocorrect="off" />           
        </div>
        <button id="appointments-save-settings"><?php p($l->t("Save")); ?></button>

</div>