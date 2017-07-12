function call_contract(username){

    var ipAddress = '129.192.20.158';
    var methodToCall = 'balance';
    var contractHash = '7d2cc610d93e22d6c0c291ec501bee35d766da72';
    var location = $("inputLocation").val();
    var tokens = $("inputTokens").val();
    var item = $("inputItem").val();

    $.ajax({
      type: "POST",
      //url: "http://jay:secret@129.192.20.158:8090/call/3000/7d2cc610d93e22d6c0c291ec501bee35d766da72/balance",
      url: "http://" + username + ":secret@" + ipAddress + ":8090" + "/call/3000/" + contractHash + "/" + methodToCall,
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
