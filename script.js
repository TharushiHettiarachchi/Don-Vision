/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function closenav() {

  var page = document.getElementById("page");
  var sidenav = document.getElementById("sidenav");
  sidenav.style.display = "none";
  sidenav.style.width = "0px";
  page.style.marginLeft = "0px";

}
function opennav() {

  var page = document.getElementById("page");
  var sidenav = document.getElementById("sidenav");

  sidenav.style.width = "300px";
  sidenav.style.display = "block";
  sidenav.style.display = "flex";
  sidenav.style.transition = "0.5s";
  // page.style.marginLeft = "400px";
}

function calendar() {

  if (document.getElementById("calendar").style.display == "block") {
    calendarClose();
  } else {
    calendarOpen();
  }
}

function calendarOpen() {
  document.getElementById("calendar").style.display = "block";
  document.getElementById("adminPanelDiv1").style.width = "100%";
}

function calendarClose() {
  document.getElementById("calendar").style.display = "none";
  document.getElementById("adminPanelDiv1").style.width = "100%";
}

function timeRun() {

  setInterval(timeRun1, 500);
}

function timeRun1() {

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {

    if (r.readyState == 4) {
      var t = r.responseText;

      document.getElementById("adminHeaderDiv6").innerHTML = t;
      // alert(t);
    }
  }
  r.open("GET", "timeSetter.php", true);
  r.send();
}

function addProductImage() {
  var addProductInput2 = document.getElementById("addProductInput2");
  var view1 = document.getElementById("image1");
  var view2 = document.getElementById("image2");
  var view3 = document.getElementById("image3");

  addProductInput2.onchange = function () {

    if (addProductInput2.files.length == 1) {

      var file1 = this.files[0];
      var url1 = window.URL.createObjectURL(file1);
      view1.src = url1;
    } else if (addProductInput2.files.length == 2) {
      var file1 = this.files[0];
      var file2 = this.files[1];
      var url1 = window.URL.createObjectURL(file1);
      var url2 = window.URL.createObjectURL(file2);
      view1.src = url1;
      view2.src = url2;

    } else if (addProductInput2.files.length == 3) {
      var file1 = this.files[0];
      var file2 = this.files[1];
      var file3 = this.files[2];
      var url1 = window.URL.createObjectURL(file1);
      var url2 = window.URL.createObjectURL(file2);
      var url3 = window.URL.createObjectURL(file3);
      view1.src = url1;
      view2.src = url2;
      view3.src = url3;

    }

  }


}

function addProduct() {

  var category = document.getElementById("category").value;
  var brand = document.getElementById("brand").value;
  var title = document.getElementById("title").value;
  var subTitle = document.getElementById("subTitle").value;
  var qty = document.getElementById("qty").value;
  var price = document.getElementById("price").value;
  var addProductInput2 = document.getElementById("addProductInput2");

  var f = new FormData();
  f.append("category", category);
  f.append("brand", brand);
  f.append("title", title);
  f.append("subTitle", subTitle);
  f.append("qty", qty);
  f.append("price", price);

  if (addProductInput2.files.length == 0) {
    document.getElementById("imageAlert").innerHTML = "You have not selected a Product Image";
  } else {
    f.append("image1", addProductInput2.files[0]);
    f.append("image2", addProductInput2.files[1]);
    f.append("image3", addProductInput2.files[2]);

  }
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {

    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == 1) {
        document.getElementById("categoryAlert").innerHTML = "Please select the product category";
      } else if (t == 2) {
        document.getElementById("brandAlert").innerHTML = "Please select the product brand";
        document.getElementById("categoryAlert").innerHTML = "";

      } else if ((t == 3)) {
        document.getElementById("qtyAlert").innerHTML = "Please enter the product quantity";
        document.getElementById("brandAlert").innerHTML = "";
      } else if (t == 4) {
        document.getElementById("priceAlert").innerHTML = "Please enter the product price";
        document.getElementById("qtyAlert").innerHTML = "";
      } else {
        alert(t);
      }

    }
  }
  r.open("POST", "addProductProcess.php", true);
  r.send(f);




}

function setTitle() {
  var brand = document.getElementById("brand").value;

  var f = new FormData();
  f.append("brand", brand);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {

    if (r.readyState == 4) {
      var t = r.responseText;

      document.getElementById("title").value = t;

    }
  }
  r.open("POST", "setTitle.php", true);
  r.send(f);

}

function updateProduct(id) {
  var category = document.getElementById("category").value;
  var subTitle = document.getElementById("subTitle").value;
  var qty = document.getElementById("qty").value;
  var price = document.getElementById("price").value;
  var title = document.getElementById("title").value;
  var addProductInput2 = document.getElementById("addProductInput2");
  var img1 = document.getElementById("img1").value;
  var img2 = document.getElementById("img2").value;
  var img3 = document.getElementById("img3").value;

  var code = id;
  var f = new FormData();
  f.append("category", category);
  f.append("subTitle", subTitle);
  f.append("qty", qty);
  f.append("price", price);
  f.append("title", title);
  f.append("img1", img1);
  f.append("img2", img2);
  f.append("img3", img3);


  if (addProductInput2.files.length == 0) {
    document.getElementById("imageAlert").innerHTML = "You have not selected a Product Image";
  } else {
    f.append("image1", addProductInput2.files[0]);
    f.append("image2", addProductInput2.files[1]);
    f.append("image3", addProductInput2.files[2]);

  }
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {

    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == 1) {
        document.getElementById("categoryAlert").innerHTML = "Please select the product category";
      } else if (t == 2) {
        document.getElementById("brandAlert").innerHTML = "Please select the product brand";
        document.getElementById("categoryAlert").innerHTML = "";

      } else if ((t == 3)) {
        document.getElementById("qtyAlert").innerHTML = "Please enter the product quantity";
        document.getElementById("brandAlert").innerHTML = "";
      } else if (t == 4) {
        document.getElementById("priceAlert").innerHTML = "Please enter the product price";
        document.getElementById("qtyAlert").innerHTML = "";
      } else {
        alert(t);
      }

    }
  }
  r.open("POST", "updateProductProcess.php", true);
  r.send(f);


}

function addProductImage1() {
  var addProductInput2 = document.getElementById("addProductInput2");
  var view1 = document.getElementById("i0");
  var view2 = document.getElementById("i1");
  var view3 = document.getElementById("i2");
  addProductInput2.onchange = function () {
    var file1 = this.files[0];
    var file2 = this.files[1];
    var file3 = this.files[2];
    var url1 = window.URL.createObjectURL(file1);
    var url2 = window.URL.createObjectURL(file2);
    var url3 = window.URL.createObjectURL(file3);
    view1.src = url1;
    view2.src = url2;
    view3.src = url3;
  }


}

function updateProductItem() {



  var title = document.getElementById("title");
  var subTitle = document.getElementById("subTitle");
  var qty = document.getElementById("qty");
  var cost = document.getElementById("price");
  var category = document.getElementById("category");
  var images = document.getElementById("addProductInput2");

  // alert (title.value);
  // alert (subTitle.value);
  // alert (qty.value);
  // alert (cost.value);
  // alert (category.value);




  var f = new FormData();
  f.append("title", title.value);
  f.append("subTitle", subTitle.value);
  f.append("qty", qty.value);
  f.append("cost", cost.value);
  f.append("category", category.value);




  var img_count = images.files.length;

  for (var x = 0; x < img_count; x++) {
    f.append("i" + x, images.files[x]);
  }

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {

    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Your Product has been updated") {

        alert("Your product has updated");
        window.location.reload();

      } else {
        alert(t);
      }

    }

  }

  r.open("POST", "updateProcess.php", true);
  r.send(f);


}

function signUp() {

  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var mobile = document.getElementById("mobile").value;
  var email = document.getElementById("email").value;

  var f = new FormData();
  f.append("fname", fname);
  f.append("lname", lname);
  f.append("email", email);
  f.append("mobile", mobile);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      document.getElementById("signUpAlert").style.display = "block";

      document.getElementById("signUpAlert").style.display = "flex";
      document.getElementById("signUpAlert").innerHTML = t;
    }
  }
  r.open("POST", "signUpProcess.php", true);
  r.send(f);
}

function signIn() {

  var password = document.getElementById("password").value;
  var email = document.getElementById("email").value;

  var f = new FormData();
  f.append("email", email);
  f.append("password", password);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Successfully Signed In") {
        window.location = "index.php";
      } else {

        document.getElementById("signInAlert").style.display = "block";

        document.getElementById("signInAlert").style.display = "flex";
        document.getElementById("signInAlert").innerHTML = t;
      }
    }
  }
  r.open("POST", "signInProcess.php", true);
  r.send(f);
}


function updateProfile() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var gender = document.getElementById("gender").value;
  var payment = document.getElementById("payment").value;
  var address1 = document.getElementById("address1").value;
  var address2 = document.getElementById("address2").value;
  var city = document.getElementById("city").value;
  var district = document.getElementById("district").value;
  var province = document.getElementById("province").value;
  var postal_code = document.getElementById("postal_code").value;

  var f = new FormData();
  f.append("fname", fname);
  f.append("lname", lname);
  f.append("gender", gender);
  f.append("payment", payment);
  f.append("address1", address1);
  f.append("address2", address2);
  f.append("city", city);
  f.append("district", district);
  f.append("province", province);
  f.append("postal_code", postal_code);



  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  }
  r.open("POST", "profileUpdateProcess.php", true);
  r.send(f);
}

function addFavourite(id) {
  var id = id;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      window.location.reload();
    }
  }
  r.open("GET", "addFavouriteProcess.php?id=" + id, true);
  r.send();


}

function basicSearch() {
  var searchText = document.getElementById("searchText").value;

  var f = new FormData();
  f.append("searchText", searchText);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "No results Found") {
        document.getElementById("shopSearchBody").style.display = "block";
        document.getElementById("shopSearchBody").style.display = "block";
        document.getElementById("shopSearchBody").style.display = "flex";
        document.getElementById("shopSearchBody").style.justifyContent = "center";
        document.getElementById("shopSearchBody").style.alignItems = "center";
        document.getElementById("shopSearchBody").innerHTML = t;



      } else {
        document.getElementById("shopSearchBody").style.display = "block";
        document.getElementById("shopSearchBody").style.display = "flex";
        document.getElementById("shopSearchBody").innerHTML = t;
      }
    }
  }
  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);





}

function summarySum() {
  var frame = document.getElementById("frame").innerHTML;
  var lens = document.getElementById("lens").innerHTML;
  var blueCut = document.getElementById("blueCut").innerHTML;
  var uv = document.getElementById("uv").innerHTML;

  var frame1 = frame.match(/\d+/g);
  var lens1 = lens.match(/\d+/g);
  var blueCut1 = blueCut.match(/\d+/g);
  var uv1 = uv.match(/\d+/g);

  var frameRs = parseInt(frame1[0]);
  var frameC = parseInt(frame1[1]);
  var lensRs = parseInt(lens1[0]);
  var lensC = parseInt(lens1[1]);
  var blueCutRs = parseInt(blueCut1[0]);
  var blueCutC = parseInt(blueCut1[1]);
  var uvRs = parseInt(uv1[0]);
  var uvC = parseInt(uv1[1]);


  var subTotalRs = frameRs + lensRs + blueCutRs + uvRs;
  var subTotalC1 = frameC + lensC + blueCutC + uvC;
  var subTotalC = subTotalC1.toString().padStart(2, "0");
  document.getElementById("subTotal").innerHTML = subTotalRs + " ." + subTotalC;

}


function prescriptionView1() {

  document.getElementById("prescriptionBody").style.display = "block";
  document.getElementById("prescriptionBody").style.display = "flex";
  var qty = document.getElementById("qty").value;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("lens").innerHTML = parseInt(t) * parseInt(qty) + ".00";
      summarySum();
    }
  }
  r.open("POST", "lensPrice.php", true);
  r.send();


}

function prescriptionView3() {

  document.getElementById("prescriptionBody").style.display = "block";
  document.getElementById("prescriptionBody").style.display = "flex";
  // var qty = document.getElementById("qty").value;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("lens").innerHTML = t;
      summarySum();
    }
  }
  r.open("POST", "lensPrice1.php", true);
  r.send();


}


function prescriptionView2() {

  document.getElementById("prescriptionBody").style.display = "none";
  document.getElementById("lens").innerHTML = "00.00";
  summarySum();

}
function addPrescriptionImage() {
  var uploadPrescription = document.getElementById("uploadPrescription");
  var prescriptionImage = document.getElementById("prescriptionImage");







  uploadPrescription.onchange = function () {

    var file1 = this.files[0];
    var url1 = window.URL.createObjectURL(file1);
    prescriptionImage.innerHTML = "";
    prescriptionImage.style.backgroundImage = "url(" + url1 + ")";






  }


}


function BlueCutPrice() {
  var blueCut = document.getElementById("blueCutCheck").checked;
  var qty = document.getElementById("qty").value;
  if (blueCut == true) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        document.getElementById("blueCut").innerHTML = parseInt(t) * parseInt(qty) + ".00";
        summarySum();
      }
    }
    r.open("POST", "blueCutPrice.php", true);
    r.send();

  } else if (blueCut == false) {
    document.getElementById("blueCut").innerHTML = "00.00";
    summarySum();
  }
}

function BlueCutPrice1() {
  var blueCut = document.getElementById("blueCutCheck").checked;

  if (blueCut == true) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("blueCut").innerHTML = t;
        summarySum();
      }
    }
    r.open("POST", "blueCutPrice1.php", true);
    r.send();

  } else if (blueCut == false) {
    document.getElementById("blueCut").innerHTML = "00.00";
    summarySum();
  }
}


function UVPrice() {
  var uv = document.getElementById("uvCheck").checked;
  var qty = document.getElementById("qty").value;
  if (uv == true) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        document.getElementById("uv").innerHTML = parseInt(t) * parseInt(qty) + ".00";
        summarySum();
      }
    }
    r.open("POST", "uvPrice.php", true);
    r.send();

  } else if (uv == false) {
    document.getElementById("uv").innerHTML = "00.00";
    summarySum();
  }
}

function UVPrice1() {
  var uv = document.getElementById("uvCheck").checked;
  // var qty = document.getElementById("qty").value;
  if (uv == true) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        document.getElementById("uv").innerHTML = t;
        summarySum();
      }
    }
    r.open("POST", "uvPrice1.php", true);
    r.send();

  } else if (uv == false) {
    document.getElementById("uv").innerHTML = "00.00";
    summarySum();
  }
}


function qtyChecker() {
  var qty = document.getElementById("qty");
  var pid = document.getElementById("title").innerHTML;
  var frame = document.getElementById("frame");

  var f = new FormData();
  f.append("pid", pid);
  f.append("qty", qty.value);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      qty.value = t;
      totalFrame = parseInt(frame.innerHTML) * parseInt(t);
      frame.innerHTML = totalFrame + ".00";
      BlueCutPrice();
      prescriptionView1();
      UVPrice();
      summarySum();

    }
  }
  r.open("POST", "qtyCheck.php", true);
  r.send(f);
}

function qtyChecker1(id) {

  var id = id;
  var qty = document.getElementById("qty" + id);

  // var pid = document.getElementById("title").innerHTML;
  // var frame = document.getElementById("frame");




  var f = new FormData();
  f.append("pid", id);
  f.append("qty", qty.value);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      // alert(t);
      // alert(id);
      window.location.reload();
      BlueCutPrice1();

    }
  }
  r.open("POST", "qtyCheck1.php", true);
  r.send(f);
}


function placeOrder() {
  var title = document.getElementById("title").innerHTML;
  var subTotal = document.getElementById("subTotal").innerHTML;
  var qty = document.getElementById("qty").value;
  var uploadPrescription = document.getElementById("uploadPrescription");
  var havePrescription = document.getElementById("havePrescription").checked;
  var blueCutCheck = document.getElementById("blueCutCheck").checked;
  var uvCheck = document.getElementById("uvCheck").checked;

  if (havePrescription == true) {
    var prescription = 1;
  } else {
    var prescription = 0;
  }
  if (blueCutCheck == true) {
    var blueCut = 1;
  } else {
    var blueCut = 0;
  }
  if (uvCheck == true) {
    var uv = 1;
  } else {
    var uv = 0;
  }

  var f = new FormData();
  f.append("title", title);
  f.append("qty", qty);
  f.append("uploadPrescription", uploadPrescription.files[0]);
  f.append("prescription", prescription);

  f.append("blueCut", blueCut);
  f.append("uv", uv);

  f.append("subTotal", subTotal);



  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  }
  r.open("POST", "placeOrder.php", true);
  r.send(f);


}



function placeOrder1() {
  // var title = document.getElementById("title").innerHTML;
  var subTotal = document.getElementById("subTotal").innerHTML;
  // var qty = document.getElementById("qty").value;
  var uploadPrescription = document.getElementById("uploadPrescription");
  var havePrescription = document.getElementById("havePrescription").checked;
  var blueCutCheck = document.getElementById("blueCutCheck").checked;
  var uvCheck = document.getElementById("uvCheck").checked;

  if (havePrescription == true) {
    var prescription = 1;
  } else {
    var prescription = 0;
  }
  if (blueCutCheck == true) {
    var blueCut = 1;
  } else {
    var blueCut = 0;
  }
  if (uvCheck == true) {
    var uv = 1;
  } else {
    var uv = 0;
  }

  var f = new FormData();
  // f.append("title", title);
  // f.append("qty", qty);
  f.append("uploadPrescription", uploadPrescription.files[0]);
  f.append("prescription", prescription);

  f.append("blueCut", blueCut);
  f.append("uv", uv);

  f.append("subTotal", subTotal);



  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  }
  r.open("POST", "placeOrder1.php", true);
  r.send(f);


}



function sendVerification() {
  var email = document.getElementById("email").value;

  var f = new FormData();
  f.append("email", email);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "welcome") {

        document.getElementById("emailBox").style.display = "none";
        document.getElementById("codeBox").style.display = "block";
        document.getElementById("codeBox").style.display = "flex";

      } else {
        alert(t);
      }
    }
  }
  r.open("POST", "verifyAdmin.php", true);
  r.send(f);


}

function sendVerification1() {
  var code = document.getElementById("code").value;

  var f = new FormData();
  f.append("code", code);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "welcome") {
        window.location = "adminPanel.php";

      } else {
        alert(t);
      }
    }
  }
  r.open("POST", "verifyAdmin1.php", true);
  r.send(f);


}

function searchManageProducts() {

  var searchText = document.getElementById("searchText").value;
  var category = document.getElementById("category").value;
  var brand = document.getElementById("brand").value;
  var f = new FormData();
  f.append("searchText", searchText);
  f.append("category", category);
  f.append("brand", brand);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {

      var t = r.responseText;

      document.getElementById("searchBox").innerHTML = t;

    }
  }
  r.open("POST", "manageProductsSearch.php", true);
  r.send(f);

}

function deleteManageProducts(id) {
  var pid = id;
  var result = confirm("Are you sure you want to delete this products?");
  if (result == true) {

    var f = new FormData();
    f.append("pid", pid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {

        var t = r.responseText;

        alert(t);
        window.location.reload();

      }
    }
    r.open("POST", "productDeleteProcess.php", true);
    r.send(f);


  } else {

    window.location.reload();
  }
}

function contactUs() {

  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;

  var f = new FormData();
  f.append("fname", fname);
  f.append("lname", lname);
  f.append("email", email);
  f.append("message", message);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {

      var t = r.responseText;
      alert(t);
      // document.getElementById("searchBox").innerHTML = t;

    }
  }
  r.open("POST", "contactUsProcess.php", true);
  r.send(f);


}

function addCart(id) {
  var id = id;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      window.location.reload();
    }
  }
  r.open("GET", "addCartProcess.php?id=" + id, true);
  r.send();


}

function cartPlaceOrder() {

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      document.getElementById("productDiv").innerHTML = t;
      // window.location.reload();
    }
  }
  r.open("GET", "cartPlaceOrder.php", true);
  r.send();

}

function viewMenu() {
  var icon = document.getElementById("icon");
  var dropdown = document.getElementById("dropdown");

  icon.style.display = "none";
  dropdown.style.display = "block";

}

function viewMenu1() {
  var icon = document.getElementById("icon");
  var dropdown = document.getElementById("dropdown");

  icon.style.display = "block";
  dropdown.style.display = "none";

}

function deleteOrder(oid, pid) {
  var oid = oid;
  var pid = pid;

  var f = new FormData();
  f.append("oid", oid);
  f.append("pid", pid);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {

      var t = r.responseText;
      alert(t);
      window.location.reload();

    }
  }
  r.open("POST", "orderDeleteProcess.php", true);
  r.send(f);



}

function printInvoice() {
  // var order_id = document.getElementById("order_id").value;
  var body = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = body;
}

function saveInvoice(){
  var order_id = document.getElementById("order_id").value;
  var order_date = document.getElementById("order_date").value;
  var name = document.getElementById("name").value;
  var address = document.getElementById("address").value;
  var mobile = document.getElementById("mobile").value;
  var r_sph = document.getElementById("r_sph").value;
  var r_cyl = document.getElementById("r_cyl").value;
  var r_axis = document.getElementById("r_axis").value;
  var r_add = document.getElementById("r_add").value;
  var l_sph = document.getElementById("l_sph").value;
  var l_cyl = document.getElementById("l_cyl").value;
  var l_axis = document.getElementById("l_axis").value;
  var l_add = document.getElementById("l_add").value;
  var pd = document.getElementById("pd").value;
  var sh = document.getElementById("sh").value;
  var remarks = document.getElementById("remarks").value;
  var lens = document.getElementById("lens").value;
  var frame = document.getElementById("frame").value;
  var frame_price = document.getElementById("frame_price").value;
  var lens_price = document.getElementById("lens_price").value;
  var other = document.getElementById("other").value;
  var amount = document.getElementById("amount").value;
  var discount = document.getElementById("discount").value;
  var total = document.getElementById("total").value;
  var advance = document.getElementById("advance").value;
  var balance = document.getElementById("balance").value;


  var f = new FormData();
  f.append("order_id", order_id);
  f.append("order_date", order_date);
  f.append("name", name);
  f.append("address", address);
  f.append("mobile", mobile);
  f.append("r_sph", r_sph);
  f.append("r_cyl", r_cyl);
  f.append("r_axis", r_axis);
  f.append("r_add", r_add);
  f.append("l_sph", l_sph);
  f.append("l_cyl", l_cyl);
  f.append("l_axis", l_axis);
  f.append("l_add", l_add);
  f.append("pd", pd);
  f.append("sh", sh);
  f.append("remarks", remarks);
  f.append("lens", lens);
  f.append("frame", frame);
  f.append("frame_price", frame_price);
  f.append("lens_price", lens_price);
  f.append("other", other);
  f.append("amount", amount);
  f.append("discount", discount);
  f.append("total", total);
  f.append("advance", advance);
  f.append("balance", balance);



  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {

      var t = r.responseText;
      alert(t);
      if(t == "Successfully Saved"){
        window.location = "invoice1.php?id="+order_id;
      }
      

    }
  }
  r.open("POST", "saveInvoiceProces.php", true);
  r.send(f);


}


