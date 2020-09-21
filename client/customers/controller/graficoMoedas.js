$(document).ready(function () {
    showGraphMoedas();
});


function showGraphMoedas() {
    {
        $.post("client/customers/model/graficoMoedas.php",
        function (data) {
            console.log(data);
             var name = [];
             var marks = [];

            for (var i in data) {
                name.push(data[i].data_);
                marks.push(data[i].total_moedas);
            }

            var chartdata = {
                labels: name,
                datasets: [{
                        label: 'Moedas',
                        backgroundColor: '#49e2ff',
                        borderColor: 'black',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: marks
                }]
            };

            var graphTarget = $("#graphCanvasMoedas");

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata
            });
        });
    }
}