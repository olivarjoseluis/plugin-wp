window.addEventListener("DOMContentLoaded", function () {
  console.log('Login Loaded');

  let $form = document.querySelector("#frontlg");
  let $msg = document.querySelector(".msg");

  $form.addEventListener("submit", function (e) {

    e.preventDefault();

    let data = new FormData($form);
    let dataParse = new URLSearchParams(data);

    fetch(`${front.rest_url}/login`, {
      method: "POST",
      body: dataParse
    })
      .then(res => res.json())
      .then(json => { console.log(json); $msg.innerHTML = json; if (!json) { window.location.href = `${front.home_url}` } })
      .catch(e => console.log('We have a error', e))
  })
})