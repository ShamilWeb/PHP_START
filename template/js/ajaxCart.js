var XHR_STATUS = 200;
var xhr = new XMLHttpRequest();

window.onload = function() {
  onCartButtonClick = function(i, e) {
    e.preventDefault();
    var id = cartButtons[i].getAttribute("data-id");
    var URL = "/cart/addAjax/" + id;
    xhr.open("POST", URL);
    xhr.send();

    xhr.addEventListener("load", function() {
      if (xhr.status === XHR_STATUS) {
        var count = document.querySelector(".count");
        count.textContent = xhr.response;
      }
    });
  };

  var cartButtons = document.querySelectorAll(".add-to-cart");

  for (var i = 0; i < cartButtons.length; i++) {
    cartButtons[i].addEventListener("click", onCartButtonClick.bind(null, i));
  }
};
