function validateForm() {
    var nameNode = document.getElementById("username");
    var password1 = document.getElementById("password");
    var password2 = document.getElementById("password2");
    var emailNode = document.getElementById("email");
  
    if (!checkName(nameNode) || !checkP1(password1) || !checkP2(password1, password2) || !checkEmail(emailNode)) {
        // If any of the checks fail, prevent the form submission.
        return false;
    }
  
    // If all checks pass, allow the form submission.
    return true;
  }
  
  
  function checkName(custname) {
      var chk = custname.value.search(/^[\w]{4,10}$/);
      if (chk != 0) {
          alert("The username you entered is not in the correct form. \n" +
              "The correct form contains uppercase letters and/or lowercase letters and/or numbers.\n" +
              "The length of username is between 4 to 10 words. Whitespace is not allowed.");
          custname.focus();
          custname.select();
          return false;
      }
      return true;
  }
  
  function checkP1(custpw) {
      var chk = custpw.value.search(/^([\w]+){8,12}$/);
      if (chk != 0) {
          alert("The password you entered is not in the correct form. \n" +
              "The correct form contains uppercase letters, lowercase letters or numbers.\n" +
              "The length of password is between 8 to 12 words.");
          custpw.focus();
          custpw.select();
          return false;
      }
      return true;
  }
  
  function checkP2(custpw1, custpw2) {
    var chk = custpw1.value.search(/^([\w]+){8,12}$/);
    if (chk != 0) {
        alert("The password you entered is not in the correct form. \n" +
            "The correct form contains uppercase letters, lowercase letters, or numbers.\n" +
            "The length of the password is between 8 to 12 characters.");
        custpw1.focus();
        custpw1.select();
        return false;
    }
  
    var init = custpw1.value;
    var sec = custpw2.value;
    if (init !== sec) {
        alert("The two passwords you entered are not the same. Please re-enter both now.");
        custpw1.focus();
        custpw1.select();
        return false;
    }
    return true;
  }
  
  
  function checkEmail(custemail) {
      var chk = custemail.value.search(/^[\w.-]+@(\w+\.){1,3}\w{2,3}$/);
      if (chk != 0) {
          alert("The email you entered is not in the correct form. \n" +
              "The correct form is abc123@xx.xx.xx");
          custemail.focus();
          custemail.select();
          return false;
      }
      return true;
  }
  
  
  
  var nameNode = document.getElementById("username");
  var password1 = document.getElementById("password");
  var password2 = document.getElementById("password2");
  var emailNode = document.getElementById("email");
  
  
  
  nameNode.addEventListener("change", checkName, false);
  password1.addEventListener("change", checkP1, false);
  password2.addEventListener("change", checkP2, false);
  emailNode.addEventListener("change", checkEmail, false);
  
  
  