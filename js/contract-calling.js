function call_contract(username, password, methodToCall){

    var ipAddress = '129.192.20.176';
    var contractHash = 'b1c341807822d399146da021f0aeaea736431c93';
    var cumulusVM = '1122';

    switch (methodToCall) {
      case 'balance':
        console.log("Checking balance...");
        newAccount=false;
        urlT = "http://" + username + ":" + password + "@" + ipAddress + ":8090" + "/call/" + cumulusVM + "/" + contractHash + "/" + methodToCall
        break;
      case 'objTransfer':
        newAccount=false;
        console.log("Setting up contract...");
        var sel1 = document.getElementById("inputOrigin");
        var origin = sel1.options[sel1.selectedIndex].text;
        var sel2 = document.getElementById("inputDestination");
        var destination = sel2.options[sel2.selectedIndex].text;
        var item = document.getElementById("inputItem").value;
        urlT = "http://" + username + ":" + password + "@" + ipAddress + ":8090" + "/call/" + cumulusVM + "/" + contractHash + "/" + methodToCall + "?args=" + item + "%20" + origin + "%20" + destination
        break;
      case 'register':
        newAccount=true;
        console.log("Creating user...");
        var newUser = document.getElementById("newUser").value;
        var newEmail = document.getElementById("newEmail").value;
        var newPassword = document.getElementById("newPassword").value;
        urlT = "http://" + newUser + ":" + newPassword + "@" + ipAddress + ":8090" + "/" + methodToCall + "?invitationkey=hej"
        break;
      case 'transferDones':
        newAccount=false;
        console.log("Finalizing trasport...");
        urlT = "http://" + username + ":" + password + "@" + ipAddress + ":8090" + "/call/" + cumulusVM + "/" + contractHash + "/" + methodToCall
        break;
      default:
    }

    if (newAccount==true) {
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
          console.log("User created!");
          console.log("Success!");
          console.log("Redirecting to login page...");
          window.location.replace("success.php?user="+ newUser + "&email=" + newEmail + "&pass=" + newPassword);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });

    } else {
      $.ajax({
        type: "POST",
        url: urlT,
        contenType: 'text/plain',
        processData: true,
        async: true,
        headers: {
          "Authorization": "Basic " + btoa(username + ":" + password)
        },
        success: function (result){
          if (methodToCall=='balance') {
            $("#Balance").html("<p>"+ result +" tokens</p>");
            console.log("Balance updated!");
          }
          if (methodToCall=='objTransfer') {
            console.log("Contract Signed!");
          }
          if (methodToCall=='transferDones') {
            console.log("Transfer Done!!");
          }
          console.log(result);
          console.log("Success!");
          return true;
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
    }
}
