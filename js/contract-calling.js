function call_contract(username, methodToCall){

    var ipAddress = '129.192.20.176';
    var contractHash = 'e885fb4e2cc9b30917909d1aa39b26d644ec1582';
    var cumulusVM = '1005';
    var origin = $("inputOrigin").val();
    var destination = $("inputDestination").val();
    var item = $("inputItem").val();
    switch (methodToCall) {
      case 'balance':
        urlT = "http://" + username + ":secret@" + ipAddress + ":8090" + "/call/" + cumulusVM + "/" + contractHash + "/" + methodToCall
        break;
      case 'objTransfer':
        urlT = "http://" + username + ":secret@" + ipAddress + ":8090" + "/call/" + cumulusVM + "/" + contractHash + "/" + methodToCall + "?args=" + "item" + "%20" + "origin" + "%20" + "destination"
        break;
      default:
    }

    $.ajax({
      type: "POST",
      url: urlT,
      dataType: 'JSON',
      contenType: 'text/plain',
      processData: true,
      async: true,
      headers: {
        "Authorization": "Basic " + btoa(username + ":secret")
      },
      success: function (result){
        var data = JSON.parse(result);
        $("#Balance").html("<p>"+ data +" tokens</p>");
        console.log(data);
        console.log("success!");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
}
