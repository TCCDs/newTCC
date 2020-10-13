$(document).ready(function() {
    showGraph();
});


function showGraph() {
    {
        $.post("administration/graficos/model/graficoVenda.php",
            function(data) {
                console.log(data);
                var name = [];
                var marks = [];

                for (var i in data) {
                    name.push(data[i].data_);
                    marks.push(data[i].total_vendas);
                }

                var chartdata = {
                    labels: name,
                    datasets: [{
                        label: 'vendas',
                        backgroundColor: 'rgba(82, 230, 205, 0.575)',
                        borderColor: 'rgb(13, 202, 171)',
                        hoverBackgroundColor: 'grey',
                        hoverBorderColor: '#666666',
                        data: marks
                    }]
                };

                var graphTarget = $("#graphCanvasVendas");

                var barGraph = new Chart(graphTarget, {
                    type: 'line',
                    data: chartdata
                });
            });
    }
}