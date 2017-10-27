//Adds new input in the form
$('#input').click(function(){
  var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
    var str = '<input class="form-control" type="text" name="answer[]-' +random+ '" placeholder="Вариант ответа:"/><br> ';
    $('#sites').append(str);
  });
var url = 'http://127.0.0.1:8000/questions/questions/';
  // $.ajax({
  //   method:"PUT";
  //   url: url ,
  //
  // });
