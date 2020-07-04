@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h2><b>Dashboards</b></h2>

                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8" id="curve_chart">
                                </div> 

                                <div class="col-md-2">

                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8" id="columnchart_values">
                                
                                </div>

                                <div class="col-md-2">

                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8" id="donutchart">
                                </div>

                                <div class="col-md-2">

                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8" id="piechart_3d">
                                </div>
                    
                               
                              
                            </div>  
                            
                        </div>   
                        </div>          
                    </div>
                </div>
            

            </div>

        </div>
    </div>

                        
    


@endsection

@section('script')
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {


            var data = google.visualization.arrayToDataTable([
                ['Hora', 'Média Vendas'],
                @foreach ($vendas_hora as $v)
                    [{{ $v->hora }},  {{ $v->media }}],
                @endforeach
            ]);

            var options = {
                title: 'Média de Vendas por Hora',
                curveType: 'function',
                legend: { position: 'bottom' }
            };           

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }
            </script>

                

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(drawChart);


                function drawChart() {

                     
                  var data = google.visualization.arrayToDataTable([
                    ['Dia', 'Qtd Vendas'],
                            @foreach ($vendas_mes as $v)
                            [{{ $v->mes }},  {{ $v->quantidade }}],
                            @endforeach
                  ]);

                  var view = new google.visualization.DataView(data);
                        view.setColumns([0,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       1]);

                  var options = {
                    title: "Quantidade de Vendas por Mês",
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                  };
                  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                  chart.draw(view, options);
              }
            </script>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Produto', 'Vendas por Produto'],
                            @foreach ($vendas_por_produto as $v)
                            ["{{ $v->produtos }}",  {{ $v->somatorio }}],
                            @endforeach
                ]);

                

                var options = {
                  title: 'Percentual de vendas por Produto',
                  pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
              }
            </script>


            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Clientes Cadastrados', 'Período'],
                            @foreach ($quantidade_clientes as $c)
                            ["{{ $c->admin }}", {{ $c->quantidade }}],
                            @endforeach
                 
                ]);

                var options = {
                  title: 'Total de Usuários Cadastrados Até o momento',
                  is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
              }
            </script> 

@endsection
