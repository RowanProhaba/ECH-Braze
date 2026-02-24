<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://127.0.0.1
 * @since      1.0.0
 *
 * @package    Ech_Braze
 * @subpackage Ech_Braze/admin/partials
 */
?>
<div class="echPlg_wrap">
  <h1>Braze API General Settings</h1>
  <div class="form_container">
    <form method="post" id="braze_gen_settings_form">
    <?php 
        settings_fields( 'braze_gen_settings' );
        do_settings_sections( 'braze_gen_settings' );
    ?>
      <h2>General Settings</h2>
      <div class="form_row">
          <label>API Key : </label>
          <input type="text" name="ech_braze_api_key" value="<?= htmlspecialchars(get_option( 'ech_braze_api_key' ))?>" id="" />
      </div>
      <div class="form_row">
          <label>SDK Endpoint : </label>
          <input type="text" name="ech_braze_base_url" value="<?= htmlspecialchars(get_option( 'ech_braze_base_url' ))?>" id="" />
      </div>
      <div class="form_row">
        <label>Brand Name : </label>
        <input type="text" name="ech_braze_website_brand_name" value="<?= get_option('ech_braze_website_brand_name')?>" pattern="[ A-Za-z0-9]{1,}">
      </div>
      <div class="form_row">
          <button type="submit"> Save </button>
      </div>
    </form>
    <div class="statusMsg"></div>
  </div> <!-- form_container -->
</div>
