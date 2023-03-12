window.addEventListener("DOMContentLoaded", function () {
  console.log('Register Loaded');

  let $form = document.querySelector("#signup");
  let $msg = document.querySelector(".msg");

  $form.addEventListener("submit", function (e) {
    e.preventDefault();

    let data = new FormData($form);
    let dataParse = new URLSearchParams(data);

    fetch(`${front.rest_url}/register`, {
      method: "POST",
      body: dataParse
    })
      .then(res => res.json())
      .then(json => { console.log(json); $msg.innerHTML = json?.msg })
      .catch(e => console.log('We have a error', e))
  })
})