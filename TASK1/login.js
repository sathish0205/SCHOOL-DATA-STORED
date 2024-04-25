function togglePW() {
    var a = document.getElementById("password");
    var y = document.getElementById("eye");

    if (a.type === "password") {
        a.type = "text";
        y.className = "fa fa-eye-slash";
    } else {
        a.type = "password";
        y.className = "fa fa-eye";

    }
  }