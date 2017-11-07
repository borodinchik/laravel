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
            url: window.location.href + '/' + dataQuestionId,
            dataType: 'html',
            success: function(data) {

            }
        });
    }
}
$(function () {
   $('.result').on('click', function () {
    $('.my_result_modal').show();
});
    $('.close').on('click', function () {
         $('.my_result_modal').hide();
       });
});
//Код для графика
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
