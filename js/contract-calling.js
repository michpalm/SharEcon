function call_contract(username, password, methodToCall){

    var ipAddress = '129.192.20.176';
    var contractHash = '55a820e190370d3e6e2b6a7541d01f4c0b9d7927';
    var cumulusVM = '1122';

    //Swtich case for selecting post call based on method call
    switch (methodToCall) {
      case 'balance':
      newAccount=false;
        console.log("Checking balance...");
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

    //Special ajax call for registering users due to header Authorization
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

    }
    //Regular Ajax call for the rest of the contracts with different actions based on success
    else {
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
