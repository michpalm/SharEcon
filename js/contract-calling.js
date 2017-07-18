function call_contract(username, password, methodToCall){

    var ipAddress = '129.192.20.176';
    var contractHash = 'dd97012cef2c187070b2c32fc6a8d2504f941623';
    var cumulusVM = '1122';

    switch (methodToCall) {
      case 'balance':
      console.log("Switch case ok!");
        newAccount=false;
        urlT = "http://" + username + ":" + password + "@" + ipAddress + ":8090" + "/call/" + cumulusVM + "/" + contractHash + "/" + methodToCall
        break;
      case 'objTransfer':
        var sel1 = document.getElementById("inputOrigin");
        var origin = sel1.options[sel1.selectedIndex].text;
        var sel2 = document.getElementById("inputDestination");
        var destination = sel2.options[sel2.selectedIndex].text;
        var item = document.getElementById("inputItem").value;
        urlT = "http://" + username + ":" + password + "@" + ipAddress + ":8090" + "/call/" + cumulusVM + "/" + contractHash + "/" + methodToCall + "?args=" + item + "%20" + origin + "%20" + destination
        break;
      case 'register':
        var newUser = document.getElementById("newUser").value;
        var newEmail = document.getElementById("newEmail").value;
        var newPassword = document.getElementById("newPassword").value;
        urlT = "http://" + newUser + ":" + newPassword + "@" + ipAddress + ":8090" + "/" + methodToCall + "?invitationkey=hej"
        break;
      default:
    }

    if (newAccount==true) {
      console.log("Wrong!!!");
      $.ajax({
        type: "POST",
        url: urlT,
        contenType: 'text/plain',
        processData: true,
        async: true,
        headers: {
          "Authorization": "Basic " + btoa(newUser + ":" + newPassword)
        },
        success: function (){
          window.location.replace("success.php?user="+ newUser + "&email=" + newEmail + "&pass=" + newPassword);
          //$.get("success.php", { user: newUser, email: newEmail, pass: newPassword});
          console.log("success!");
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });

    } else {
      console.log("Ajax!");
      $.ajax({
        type: "POST",
        url: urlT,
        dataType: 'JSON',
        contenType: 'text/plain',
        processData: true,
        async: true,
        headers: {
          "Authorization": "Basic " + btoa(username + ":" + password)
        },
        success: function (result){
          var data = JSON.parse(result);
          if (methodToCall=='balance') {
            $("#Balance").html("<p>"+ data +" tokens</p>");
          }
          if (methodToCall=='objTransfer') {
            console.log("Contract Signed!");
          }
          console.log(result);
          console.log("success!");
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
    }
}
