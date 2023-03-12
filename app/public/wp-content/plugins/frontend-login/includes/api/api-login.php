<?php

function frontApiLogin()
{
  register_rest_route("front", "login", array(
    "methods" => "POST",
    "callback" => "frontLoginCallback"
  ));
}

add_action("rest_api_init", "frontApiLogin");

function frontLoginCallback($request)
{
  $credentials = array(
    "user_login" => $request["email"],
    "user_password" => $request["password"],
    "remember" => true
  );

  $user = wp_signon($credentials);

  return $user->get_error_message();
}
