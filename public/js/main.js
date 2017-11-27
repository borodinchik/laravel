$(document).ready(function() {
  var myChart=null;
/*This event create input option answers in Admin panel */
$('#input').click(function() {
  var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
  var str = '<input class="form-control" type="text" name="answer[]-' +
  random + '" placeholder="Вариант ответа:"/><br> ';
  $('#sites').append(str);
});
/*On click frome links we are show modal and get attrebut 'data-question-id'
which is responsible for id questions modal*/
$('.question-id').on('click', function(event) {
  $('.modal-loader').show(function () {
    $('.loader').show();
    var currentTarget = $(event.currentTarget);
    var dataQuestionId = currentTarget.attr('data-question-id');
    submitForm(dataQuestionId);
    getUserAnswerId(dataQuestionId);
    setTimeout(function () {
      $('.loader').hide();
      currentTarget.parent().siblings('.myModal-' + dataQuestionId).show();
    }, 3000);
  });
});
/*This function gets questions list by id*/
function getUserAnswerId(dataQuestionId,data) {
  if (dataQuestionId) {
    getAjaxRequest('POST',window.location.href + '/' + dataQuestionId,data,function (result) {

    });
  }
}
/*Close modal event */
$('.close').on('click', function(){
  $('.cartQuestions').hide();
    $('.modal-loader').hide();
});

function postAjaxRequest(method,url,data,callback) {
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

function submitForm(dataQuestionId) {
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
}

function postFormAnswer(data) {
  postAjaxRequest('POST',"/user/store",data,function (result) {
    if (result != "error!" ){
      console.log(data);
    }else{
      console.log(result,"User answer not add");
    }
  });
}
/*Function getAjax generate Ajax requests GET*/
function getAjaxRequest(getMethod,getUrl,dataType,callback) {
  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: getMethod,
    url: getUrl,
  }).done(function (data) {
    getData(data);
    console.log(data);
    callback(data);
  }).fail(function (data) {
    callback(data);
  })
};
/*Ajax request from Charts date*/
function getDataCharts(dataQuestionId) {
  getAjaxRequest('GET','http://127.0.0.1:8000/admin/column/' + dataQuestionId,'json',function (result) {

  });
}
/*We hang an event for ajax request*/
$('.result').on('click', function () {
  var dataQuestionId = $(this).attr('id');
  getDataCharts(dataQuestionId);
  $('.my_result_modal').show();
});
$('.close').on('click', function () {
  $('.my_result_modal').hide();
  myChart.destroy()
});
/*Function getData responsed data = "answer","count_user","count_age","body"*/
function getData(data) {
  var responseObjAnswer = data[0].answer.map(function (myArrayObjAnswer) {
    return myArrayObjAnswer.answer;
  });
  var responseObjData = data[1].map(function (myArrayObjData) {
    return myArrayObjData.count_all_user;
  });
  // var responseObjUserAge = data[2].map(function (myArrayObjUserAge) {
  //   return myArrayObjUserAge.count_age;
  // });
  var responseObjBody = data[0].body;
  drouCharts(responseObjAnswer,responseObjData,responseObjBody);
}
/*Added data in charts*/
function drouCharts(lables,data,body) {
  console.log(lables,data,body);
var ctx = document.getElementById("myChart");
myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: lables,
        datasets: [{
            label: body,
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
}

});
