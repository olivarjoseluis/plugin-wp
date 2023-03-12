<?php

function frontApiRegister()
{
  register_rest_route("front", "register", array(
    "methods" => "POST",
    "callback" => "frontRegisterCallback"
  ));
}

function frontRegisterCallback($request)
{
  $isUserExist = get_user_by("login", $request["name"]);
  $isEmailExist = get_user_by("email", $request["email"]);

  if ($isUserExist) {
    return array("msg" => "This user already has been created.");
  } else if ($isEmailExist) {
    return array("msg" => "This Email already has been created.");
  }

  $args = array(
    "user_login" => $request["name"],
    "user_pass" => $request["password"],
    "user_email" => $request["email"],
    "role" => "client"
  );

  $user = wp_insert_user($args);

  //return $request->get_params();
  return array("msg" => "User registred with success.");
}

add_action("rest_api_init", "frontApiRegister");
