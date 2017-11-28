$(document).ready(function() {

  var dataQuestionId;
/*On click frome links we are show modal and get attrebut 'data-question-id'
which is responsible for id questions modal*/
//user
$('.question-id').on('click', function(event) {
  $('.modal-loader').show(function () {
    $('.loader').show();
    var currentTarget = $(event.currentTarget);
    dataQuestionId = currentTarget.attr('data-question-id');
    // getUserAnswerId(dataQuestionId);
    setTimeout(function () {
      $('.loader').hide();
      currentTarget.parent().siblings('.myModal-' + dataQuestionId).show();
    }, 3000);
  });
});
function getAjax(getMethod,getUrl,callback) {
  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: getMethod,
    url: getUrl,
  }).done(function (data) {
    callback(data);
  }).fail(function (data) {
    callback(data);
  })
};
  /*This function gets questions list by id*/
function getUserAnswerId(dataQuestionId) {
  if (dataQuestionId) {
    getAjax('POST',window.location.href + '/' +  dataQuestionId,function (result) {

    });
  }
}
  $('.form-save').on('submit', function (e) {
    e.preventDefault();
    var formValue = $(this).find('input:checked').val();
    postFormAnswer({'user_answer_id':formValue});
    $('.id-answer-' + dataQuestionId).hide();
    $('.myModal-' + dataQuestionId).css('display','none');
    $('.modal-loader').css('display','none');
    $('.alert-success').show(function () {
      setTimeout(function () {
        $('.alert-success').hide();
      }, 3000);
    });
  });

/*Function getAjax generate Ajax requests GET*/
function postAjax(method,url,data,callback) {
  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: method,
    url: url,
    data:data
  }).done(function (data) {
    callback(data);
  }).fail(function (data) {
    callback(data);
  })
};

//ответ user
function postFormAnswer(data) {
  postAjax('POST',"/user/store",data,function (result) {
    if (result != "error!" ){
      }else{
        console.log(data,"User answer not add");
    }
  });
}
//user
/*Close modal event */
$('.close').on('click', function(){
  $('.cartQuestions').hide();
    $('.modal-loader').hide();
  });
});
