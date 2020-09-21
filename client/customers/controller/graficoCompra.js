$(document).ready(function () {
            showGraph();
        });


        function showGraph() {
            {
                $.post("client/customers/model/graficoCompra.php",
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

                    var graphTarget = $("#graphCanvasCompras");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }