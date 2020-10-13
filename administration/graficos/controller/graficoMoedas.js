$(document).ready(function() {
    showGraphMoedas();
});


function showGraphMoedas() {
    {
        $.post("administration/graficos/model/graficoMoedas.php",
            function(data) {
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
                        backgroundColor: 'rgba(82, 230, 205, 0.575)',
                        borderColor: 'rgb(13, 202, 171)',
                        hoverBackgroundColor: 'white',
                        hoverBorderColor: 'white',
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