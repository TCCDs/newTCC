$(document).ready(function () {
    showGraphGastos();
});


function showGraphGastos() {
    {
        $.post("client/customers/model/graficoGasto.php",
        function (data) {
            console.log(data);
             var name = [];
             var marks = [];

            for (var i in data) {
                name.push(data[i].data_);
                marks.push(data[i].total_gastos);
            }

            var chartdata = {
                labels: name,
                datasets: [{
                        label: 'Total Gastos',
                        backgroundColor: '#49e2ff',
                        borderColor: 'black',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: marks
                }]
            };

            var graphTarget = $("#graphCanvasGastos");

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata
            });
        });
    }
}