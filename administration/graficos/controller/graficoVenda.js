$(document).ready(function () {
            showGraph();
        });


        function showGraph() {
            {
                $.post("administration/graficos/model/graficoVenda.php",
                function (data) {
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
                                backgroundColor: '#49e2ff',
                                borderColor: 'black',
                                hoverBackgroundColor: '#CCCCCC',
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