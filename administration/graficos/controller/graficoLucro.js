$(document).ready(function() {
    showGraphLucro();
});


function showGraphLucro() {
    {
        $.post("administration/graficos/model/graficoLucro.php",
            function(data) {
                console.log(data);
                var name = [];
                var marks = [];

                for (var i in data) {
                    name.push(data[i].data_);
                    marks.push(data[i].lucro_bruto);
                }

                var chartdata = {
                    labels: name,
                    datasets: [{
                        label: 'Lucro Bruto',
                        backgroundColor: 'rgba(82, 230, 205, 0.575)',
                        borderColor: 'rgb(13, 202, 171)',
                        hoverBackgroundColor: 'grey',
                        hoverBorderColor: '#666666',
                        data: marks
                    }]
                };

                var graphTarget = $("#graphCanvasLucro");

                var barGraph = new Chart(graphTarget, {
                    type: 'line',
                    data: chartdata
                });
            });
    }
}