function sidebarToggle() {
  var sidebar = document.getElementById("sideBar");
  // var sidebarBackButton = document.getElementById("sidebarBackButton");

  sidebar.classList.toggle("d-none");
  sidebar.classList.toggle("position-fixed");
  sidebar.classList.toggle("col-3");
  sidebar.classList.toggle("col-9");
  sidebarBackButton.classList.toggle("d-lg-none");
}

if (
  window.location == "http://localhost/onlineCakeShop/index.php" ||
  window.location == "http://localhost/onlineCakeShop/"
) {
  var count = 0;
  setInterval(() => {
    if (count == 5) {
      count = 0;
    }

    for (var x = 0; x < 5; x++) {
      var textFirst = document.getElementById("herpParagraph" + x);
      textFirst.style.display = "none";
    }

    var text = document.getElementById("herpParagraph" + count);
    // text.classList.toggle("hero-paragraph-appear");
    text.style.display = "block";

    count++;
  }, 5000);
}

function signUp() {
  var userName = document.getElementById("userName");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var password = document.getElementById("password");
  var gender = document.getElementById("gender");
  var city = document.getElementById("city");

  var form = new FormData();

  form.append("user", userName.value);
  form.append("email", email.value);
  form.append("mobile", mobile.value);
  form.append("password", password.value);
  form.append("gender", gender.value);
  form.append("city", city.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "ATHUL KARANNA") {
        alert("ATHUL KARAGATHTHA");
        window.location = "signIn.php";
      } else {
        alert(text);
      }
    }
  };

  request.open("POST", "app/signUpProcess.php", true);
  request.send(form);
}

function signIn() {
  var email = document.getElementById("emailForm");
  var password = document.getElementById("passwordForm");
  var rememberMe = document.getElementById("rememberMeCheckbox");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberMe.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Welcome to our cake heaven");
        window.location = "index.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(f);
}

function forgotPassword() {
  var forgotPasswordInput = document.getElementById("fogot-Password-Input");

  var f = new FormData();
  f.append("email", forgotPasswordInput.value);
  // alert(forgotPasswordInput.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = this.responseText;
      if (t == "success") {
        alert("Verification Code Send Your Email Please Check it");
        window.location = "resetPassword.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "forgotPasswordProcess.php", true);
  r.send(f);
}

function resertPassword() {
  const password = document.getElementById("pw");
  const resetPassword = document.getElementById("rpw");
  const verification_code = document.getElementById("vr");

  const f = new FormData();
  f.append("pw", password.value);
  f.append("rpw", resetPassword.value);
  f.append("vr", verification_code.value);

  const r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      const t = this.responseText;
      if (t == "success") {
        alert("Success");
        window.location = "signIn.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "resertPasswordProcess.php", true);
  r.send(f);
}

function singleProductView(productId) {
  alert(productId);
}

function addToCart(id) {
  const weight = document.getElementById("weightID").value;
  const qty = document.getElementById("qty_input").value;
  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      const responde = req.responseText;
      if (responde == "Product Adedd Successfully") {
        alert("Product Adedd Successfully");
      } else {
        alert(responde);
      }

      if (responde == "Please Sign In OR Register") {
        // alert("Please Sign In OR Register");
        window.location.assign("signIn.php");
      }
    }
  };

  req.open(
    "GET",
    "app/addToCartProcess.php?id=" + id + "&weight=" + weight + "&qty=" + qty,
    true
  );
  req.send();
}
function addToWatchlist(id) {
  const weight = document.getElementById("weightID").value;

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      const responde = req.responseText;
      if (responde == "Adedd The Watchlist") {
        alert("Product Adedd Successfully");
      } else {
        alert(responde);
      }

      if (responde == "Please Sign In OR Register") {
        // alert("Please Sign In OR Register");
        window.location.assign("signIn.php");
      }
    }
  };

  req.open(
    "GET",
    "app/addToWatchlistPrccess.php?id=" + id + "&weight=" + weight,
    true
  );
  req.send();
}

function removeCart(id) {
  const requset = new XMLHttpRequest();

  requset.onreadystatechange = function () {
    if ((requset.readyState == 4) & (requset.status == 200)) {
      const res = requset.responseText;
      if (res == "SUCCESS") {
        window.location.reload();
        alert("PRODUCT REMOVED");
      } else {
        alert("Somthing Went Wrong");
      }
    }
  };
  requset.open("GET", "app/removeCartProccess.php?id=" + id, true);
  requset.send();
}
// Cart Queantity Increes And Decreese Option

function checkValue(qty) {
  var input = document.getElementById("qty_input");

  if (input.value <= 0) {
    alert("Quantity Must be 1 or  More");
    input.value = 1;
  } else if (input.value > qty) {
    alert("Maximum quantity achieved");
    input.value = qty;
  }
}

function qty_inc(qty, c_id) {
  var input = document.getElementById("qty_input" + c_id);

  if (input.value < qty) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue.toString();
  } else {
    alert("Maximum quintity has achieved");
    input.value = qty;
  }
}

function qty_dec(c_id) {
  var input = document.getElementById("qty_input" + c_id);
  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue.toString();
  } else {
    alert("Minimum quantity has achieved");
    input.value = 1;
  }
}

function qty_update(id) {
  const qtyinput = document.getElementById("qty_input" + id).value;

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      if (request.responseText == "Queantity Updated") {
        alert("Queantity Update Successfully");
        window.location.reload();
      } else {
        echo(request.responseText);
      }
    }
  };

  request.open(
    "GET",
    "app/updateCartProccess.php?id=" + id + "&qtyinput=" + qtyinput,
    true
  );
  request.send();
}
// Cart Queantity Increes And Decreese Option

// single Product View Qty Update
function checkValueSingle(qty) {
  var input = document.getElementById("qty_input");

  if (input.value <= 0) {
    alert("Quantity Must be 1 or  More");
    input.value = 1;
  } else if (input.value > qty) {
    alert("Maximum quantity achieved");
    input.value = qty;
  }
}

function qty_incSingle(qty) {
  var input = document.getElementById("qty_input");

  if (input.value < qty) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue.toString();
  } else {
    alert("Maximum quintity has achieved");
    input.value = qty;
  }
}

function qty_decSingle() {
  var input = document.getElementById("qty_input");
  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue.toString();
  } else {
    alert("Minimum quantity has achieved");
    input.value = 1;
  }
}

// single Product View Qty Update

// Add To Cart To From TO Watchlist
function addToCartFromWatchList(id) {
  const request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      alert(request.responseText);
    }
  };

  request.open("GET", "app/addToCartFromWatchlist.php?wID=" + id, true);
  request.send();
}
// Add To Cart To From TO Watchlist

// removeWatchlist Proccess
function removeWatchlist(id) {
  const request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      if (request.responseText == "Removed Successfully") {
        alert("Removed Successfully");
        window.location.reload();
      } else {
        echo("Somthing Wrong");
      }
    }
  };
  request.open(
    "GET",
    "app/removeWatchlistProccess.php?watchListID=" + id,
    true
  );
  request.send();
}
// removeWatchlist Proccess
// Payment Proccess
function paymentProcess(id) {
  const address = document.getElementById("address").value;
  const mobile = document.getElementById("mobile").value;
  const totalCost = document.getElementById("totalCost").value;

  const form = new FormData();
  form.append("address", address);
  form.append("mobile", mobile);
  form.append("userId", id);
  form.append("totalCost", totalCost);

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      // alert(request.responseText);
      var ResponseObject = JSON.parse(request.responseText);
      const email = ResponseObject["email"];
      const cost = ResponseObject["totalCost"];

      // Payment completed. It can be a successful failure.
      payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
        window.location.assign("paymentCompleted.php");
        saveInvoice(orderId, id, address, mobile, email, cost);
      };

      // Payment window closed
      payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
      };

      // Error occurred
      payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
      };

      // Put the payment variables here
      var payment = {
        "sand`bo`x": true,
        merchant_id: "1222817", // Replace your Merchant ID
        return_url: "http://localhost/onlinecakeshop/cart.php", // Important
        cancel_url: "http://localhost/onlinecakeshop/cart.php", // Important
        notify_url: "http://sample.com/notify",
        order_id: ResponseObject["orderId"],
        items: ResponseObject["ProductName"],
        amount: ResponseObject["totalCost"],
        currency: "LKR",
        hash: ResponseObject["hash"], // *Replace with generated hash retrieved from backend
        first_name: ResponseObject["userName"],
        last_name: "NULL",
        email: ResponseObject["email"],
        phone: ResponseObject["mobile"],
        address: ResponseObject["address"],
        city: ResponseObject["city"],
        country: "Sri Lanka",
        delivery_address: ResponseObject["address"],
        delivery_city: ResponseObject["city"],
        delivery_country: "Sri Lanka",
        custom_1: "",
        custom_2: "",
      };

      // Show the payhere.js popup, when "PayHere Pay" is clicked
      document.getElementById("payhere-payment").onclick = function (e) {
        payhere.startPayment(payment);
      };
    }
  };

  request.open("POST", "app/paymentProcces.php", true);
  request.send(form);
}
// Payment Proccess
// 2 Screen Toggle
function chekcoutToggle() {
  document.getElementById("cartView").style.display = "none";
  document.getElementById("readyToPay").style.display = "block";
}
// 2 Screen Toggle

// save Invoice
function saveInvoice(orderId, id, address, mobile, email, cost) {
  const form = new FormData();
  form.append("orderId", orderId);
  form.append("id", id);
  form.append("address", address);
  form.append("mobile", mobile);
  form.append("email", email);
  form.append("cost", cost);

  const request = new XMLHttpRequest();
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == 200) {
      alert(request.responseText);
    }
  };

  request.open("POST", "app/invoiceProcess.php", true);
  request.send(form);
}

//send feedbacks
function sendFeedBacks(indexId, orderId, userId) {

  const context = document.getElementById('feedBackModalContent' + indexId).value;

  let data = {
    orderId: orderId,
    userId: userId,
    content: context,
  };
  fetch('app/addFeedbackprocess.php', {

    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(response => response.json())
    .then(result => {

      // Check the response for success
      if (result === 'success') {
      
        // Update the toast body message
        const toastBody = document.querySelector('.toast-body');
        toastBody.innerHTML = 'Feedback sending successfully';

        // Show the success toast
        const toastLiveExample = document.getElementById('liveToast');
        const toastBootstrap = new bootstrap.Toast(toastLiveExample);
        toastBootstrap.show();

        // Reload the page after a delay
        setTimeout(() => {
          window.location.reload();
        }, 3000);
      } else {
       
        // Update the toast body message
        const toastBody = document.querySelector('.toast-body');
        toastBody.innerHTML = 'Feedback sending Failed ! please try again later';

        // Show the success toast
        const toastLiveExample = document.getElementById('liveToast');
        const toastBootstrap = new bootstrap.Toast(toastLiveExample);
        toastBootstrap.show();

        // Reload the page after a delay
        setTimeout(() => {
          window.location.reload();
        }, 3000);
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });

}


