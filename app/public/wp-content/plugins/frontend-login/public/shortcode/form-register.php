<?php

function frontScriptRegister()
{
    wp_register_script("front-register", plugins_url("../assets/js/register.js", __FILE__));
    wp_localize_script("front-register", "front", array(
        "rest_url" => rest_url("front")
    ));
}

add_action("wp_enqueue_scripts", "frontScriptRegister");

function frontAddRegisterForm()
{
    wp_enqueue_script("front-register");

    $response = '
  <div class="signin">
  <div class="signin__container">
      <h1 class="sigin__titulo">Register</h1>
      <form class="signin__form" id="signup">
          <div class="signin__name name--campo">
              <label for="Name">Name</label>
              <input type="text" id="Name" name="name">
          </div>
          <div class="signin__email name--campo">
              <label for="email">Email</label>
              <input type="email" id="email" name="email">
          </div>
          <div class="signin__pass name--campo">
              <label for="password">Password</label>
              <input type="password" id="password" name="password">
          </div>
          <div class="signin__submit">
              <input type="submit" value="Create">
          </div>
          <div class="msg"></div>
      </form>
  </div>
</div>';

    return $response;
}

add_shortcode("front_resgister", "frontAddRegisterForm");
