// // Load the Visualization API and the corechart package.
//   google.charts.load('current', {'packages':['corechart']});
//
//   // Set a callback to run when the Google Visualization API is loaded.
//   google.charts.setOnLoadCallback(drawChart);
//
//   // Callback that creates and populates a data table,
//   // instantiates the pie chart, passes in the data and
//   // draws it.
//   function drawChart() {
//     var jsonData = $.ajax({
//         url: "http://127.0.0.1:8000/column",
//         dataType: "json",
//         async: false
//         }).responseText;
//
//     // Create the data table.
//     var data = new google.visualization.DataTable(jsonData);
//     console.log(jsonData)
//     data.addColumn('string', 'Topping');
//     data.addColumn('number', 'Slices');
//     data.addRows([
//       ['Onionsd', 3],
//       ['Onions', 1],
//       ['Olives', 1],
//       ['Zucchini', 1],
//       ['Pepperoni', 2]
//     ]);
//
//     // Set chart options
//     var options = {'title':'How Much Pizza I Ate Last Night',
//                    'width':800,
//                    'height':500};
//
//     // Instantiate and draw our chart, passing in some options.
//     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
//     chart.draw(data, options);
//   }
