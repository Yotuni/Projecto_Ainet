@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">STATISTICS</div>

                        <div class="panel-body">
                                <div class="col-md-6" border="1">
                                    <div class="row">
                                        <h2>Tipos de impressão</h2>
                                        <div class="graph">
                                            <canvas id="lineChart"></canvas>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
                                            <script src="css/main.js"></script>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="text">
                                            <h2>Total de impressoes:
                                                {{htmlspecialchars(DB::table('requests')->count())}}
                                            </h2>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="text"><h2>Total de Impressões por departamento</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" border="1">
                                    <div class="row">

                                        <div class="text-center"><h2>Impressões feitas hoje</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center"><h2>Média diária de impressões no mês atual</h2>
                                        </div>
                                        <div class="text-center"><h2>Tempo médio de impressão</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center"><h2>Satisfação dos nossos clientes</h2></div>
                                        </div>
                                    <div class="col-md-6"><h2>Contactos dos utilizadores da organização</h2></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection