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
    </div>
    <div class="title-subtitle">
        <h2>
            <?php p($l->t('Minimum lead time')); ?>
        </h2>
    </div>
    <div class="form-col">
        <select id="prepTime">
            <?php
            $options = array(
                0 => 'No lead time',
                15 => '15 minutes',
                30 => '30 minutes',
                60 => '1 hour',
                120 => '2 hours',
                240 => '4 hours',
                480 => '8 hours',
                720 => '12 hours',
                1440 => '1 day',
                2880 => '2 days',
                5760 => '4 days'
            );

            $selected = $_['prepTime'];

            foreach ($options as $value => $label) {
                $isSelected = ($value == $selected) ? 'selected' : '';
                echo "<option value=\"$value\" $isSelected>$label</option>";
            }
            ?>
        </select>
    </div>

    <div class="title-subtitle">
        <h2>
            Timezone for email confirmations
        </h2>
    </div>
    <div class="form-col">
        <select id="timezoneSelector">
            <?php
            $timezone_identifiers = DateTimeZone::listIdentifiers();
            $continents = array();
            foreach ($timezone_identifiers as $timezone_identifier) {
                $exploded = explode('/', $timezone_identifier, 2);
                if (count($exploded) == 2) {
                    $continent = $exploded[0];
                    $timezone = $exploded[1];
                    if (!isset($continents[$continent])) {
                        $continents[$continent] = array();
                    }
                    $continents[$continent][] = $timezone_identifier;
                }
            }
            echo '<option value="UTC" ' . ($_['timezone'] == 'UTC' ? 'selected' : '') . '>UTC</option>';
            ksort($continents);
            foreach ($continents as $continent => $timezones) {
                echo '<optgroup label="' . $continent . '">';
                sort($timezones);
                foreach ($timezones as $timezone_identifier) {
                    $timezone = new DateTimeZone($timezone_identifier);
                    $timezone_name = str_replace($continent . '/', '', $timezone_identifier);
                    $timezone_name = str_replace('_', ' ', $timezone_name);
                    $selected = $timezone_identifier == $_['timezone'] ? 'selected' : '';
                    echo '<option value="' . $timezone_identifier . '" ' . $selected . '>' . $timezone_name . '</option>';
                }
                echo '</optgroup>';
            }
            ?>
        </select>
    </div>

</div>