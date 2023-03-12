<?php

function frontScriptLogin()
{
    wp_register_script("front-login", plugins_url("../assets/js/login.js", __FILE__));
    wp_localize_script("front-login", "front", array(
        "rest_url" => rest_url("front"),
        "home_url" => home_url()
    ));
}

add_action("wp_enqueue_scripts", "frontScriptLogin");

function frontAddLoginForm()
{
    wp_enqueue_script("front-login");

    $response = '
  <div class="signin">
  <div class="signin__container">
      <form class="signin__form" id="frontlg">
          <div class="signin__email name--campo">
              <label for="email">Email address</label>
              <input type="email" id="email" name="email">
          </div>
          <div class="signin__pass name--campo">
              <label for="password">Password</label>
              <input type="password" id="password" name="password">
          </div>
          <div class="signin__submit">
              <input type="submit" value="Log in">
          </div>
          <div class="signin_create-link">
              <a href="' . home_url('sing-up') . '">Sign up</a>
          </div>
          <div class="msg"></div>
      </form>
  </div>
</div>
  ';

    return $response;
}

add_shortcode("front_signin", "frontAddLoginForm");
