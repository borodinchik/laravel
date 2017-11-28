$(document).ready(function() {

/*This event create input option answers in Admin panel */
//админка
$('#input').click(function() {
  var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
  var str = '<input class="form-control" type="text" name="answer[]-' +
  random + '" placeholder="Вариант ответа:"/><br> ';
  $('#sites').append(str);
});


});
