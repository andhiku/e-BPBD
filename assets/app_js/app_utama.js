$(document).ready(function() {
    // Diagram Batang (Indeks Dokumen)
    $.ajax({
        type: 'GET',
        url: base_domain + '/utama/get_document',
        success: function(data) {
            new Chart(document.getElementById("canvas").getContext("2d")).Bar(data);
        }
    });
    // Diagram Pie (Jenis Bencana)
    var pieChartCanvas = $("#jenisbencana").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var pieOptions = {
      segmentShowStroke: true,
      segmentStrokeColor: "#fff",
      segmentStrokeWidth: 1,
      percentageInnerCutout: 50, 
      animationSteps: 100,
      animationEasing: "easeOutBounce",
      animateRotate: true,
      animateScale: false,
      responsive: true,
      maintainAspectRatio: false,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
      tooltipTemplate: "<%=value %>  <%=label%>"
    };
    $.ajax({
        type: 'GET',
        url: base_domain + '/utama/get_warrant',
        success: function(PieDataWarrant) {
            pieChart.Doughnut(PieDataWarrant, pieOptions); 
        }
    });
});


//$(document).ready(function() {
//    // Diagram Batang (Indeks Dokumen)
//    $.ajax({
//        type: 'GET',
//        url: base_domain + '/utama/get_tanggungan',
//        success: function(data) {
//            var line = new Morris.Line(data);
//        }
//    });
//});


$(document).ready(function() {
    // Diagram Pie (Kecamatan)
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var pieOptions = {
      segmentShowStroke: true,
      segmentStrokeColor: "#fff",
      segmentStrokeWidth: 1,
      percentageInnerCutout: 50, 
      animationSteps: 100,
      animationEasing: "easeOutBounce",
      animateRotate: true,
      animateScale: false,
      responsive: true,
      maintainAspectRatio: false,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
      tooltipTemplate: "<%=value %>  <%=label%>"
    };
    $.ajax({
        type: 'GET',
        url: base_domain + '/utama/get_districts',
        success: function(PieDatadistricts) {
            pieChart.Doughnut(PieDatadistricts, pieOptions); 
        }
    });
});



function formatNumber(number, decimalsLength, decimalSeparator, thousandSeparator) {
       var n = number,
           decimalsLength = isNaN(decimalsLength = Math.abs(decimalsLength)) ? 2 : decimalsLength,
           decimalSeparator = decimalSeparator == undefined ? "," : decimalSeparator,
           thousandSeparator = thousandSeparator == undefined ? "." : thousandSeparator,
           sign = n < 0 ? "-" : "",
           i = parseInt(n = Math.abs(+n || 0).toFixed(decimalsLength)) + "",
           j = (j = i.length) > 3 ? j % 3 : 0;

       return sign +
           (j ? i.substr(0, j) + thousandSeparator : "") +
           i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousandSeparator) +
           (decimalsLength ? decimalSeparator + Math.abs(n - i).toFixed(decimalsLength).slice(2) : "");
}

