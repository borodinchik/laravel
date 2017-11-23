/*Added data in charts*/
function parseResponse(responseRet) {
  console.log(responseRet);
  var responseObj = responseRet.map(function (myArrayObj) {
        return myArrayObj.data;
      });
  alert(responseObj);
}
/*Logic in Charts*/
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ["Variant1", "Variant2", "Variant3", "Variant4", "Variant5", "Variant6", "Variant7"],
        datasets: [{
            label: "Название опроса",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [5,6,7,6,8,3,1,4]
        }]
    },
    // Configuration options go here
    options: {},
  }
