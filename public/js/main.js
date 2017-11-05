//Adds new input in the form
$('#input').click(function() {
    var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
    var str = '<input class="form-control" type="text" name="answer[]-' +
        random + '" placeholder="Вариант ответа:"/><br> ';
    $('#sites').append(str);
});
//С помощью ajax выводим мадалку и форму по id
$(document).ready(function() {
    $('.question-id').on('click', function(event) {
        var currentTarget = $(event.currentTarget);
        var dataQuestionId = currentTarget.attr('data-question-id');
        getUserAttr(dataQuestionId);
        currentTarget.parent().siblings('.myModal-' + dataQuestionId).show();
      });
      $('.close').on('click', function(){
        $('.cartQuestions').hide();
        });

});
function getUserAttr(dataQuestionId) {
    if (dataQuestionId) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "POST",
            url: window.location.href + dataQuestionId,
            dataType: 'html',
            success: function(data) {

            }
        });
    }
}
