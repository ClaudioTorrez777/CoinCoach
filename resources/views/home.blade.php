@extends('layouts.app')

@php
    $capital = \Illuminate\Support\Facades\Auth::user()->capital;
@endphp

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-8">
            <div class="row mb-3">
                <div class="col-5">
                    <div class="card bg-coin-500 border-coin-100 border-2"  >
                        <div class="card-body">
                            <div class="row text-white">
                                <div class="col-2 align-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                        <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                                    </svg></div>
                                <div class="col-6 align-content-center pt-2"><h4 class="fw-bolder">Capital total</h4></div>
                                <div class="col-4 align-content-center pt-2 fw-bolder font-monospace"><h5>${{$capital}}</h5></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card bg-coin-300 border-coin-100 border-2"  >
                        <div class="card-body">
                            <div class="row text-white">
                                <div class="col-2 align-content-center ps-4"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
                                    </svg></div>
                                <div class="col-3 align-content-center pt-2"><h4 class="fw-bolder">Historial</h4></div>
                                <div class="col-7 align-content-center pt-2 fw-bolder font-monospace">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5>Bitcoin</h5>
                                        </div>
                                        <div class="col-5">
                                            <h5>+2.5%</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="position-relative">
                    <div class="position-absolute top-50 start-50 translate-middle"><h2 class="fw-bolder">Criptomonedas más conocidas</h2></div>
                </div>
            </div>
            <div class="row maca mb-3">
                <div class="col-12">
                    <canvas id="cryptoChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4">
            <table class="table table-bordered border-black table-striped">
                <thead class="table-dark fw-bolder">
                <tr>
                    <td>Criptomoneda</td>
                    <td>Precio</td>
                    <td>Comprar</td>
                </tr>
                </thead>
                <tbody class="table-coin border-black">
                @foreach($criptomonedas as $criptomoneda)
                    <tr >
                        <td class="fw-bolder">{{$criptomoneda->nombre_c}}</td>
                        <td class="fw-bolder">{{$criptomoneda->precio_actual}}</td>
                        <td class="col-3 align-content-lg-between ">
                            <a href="{{ route('compras.comprahome', $criptomoneda->id_criptomoneda) }}" class="btn btn-coin-100 fw-bolder border-black"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                    <path d="M0 5a5 5 0 0 0 4.027 4.905 6.5 6.5 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05q-.001-.07.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.5 3.5 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98q-.004.07-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5m16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0m-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674z"/>
                                </svg></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('styles')
    <style>
        .custom-label {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3E95D1;
            color: white;
            font-size: 1.25rem;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('cryptoChart').getContext('2d');
            var cryptoChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                    datasets: [
                        {
                            label: 'Bitcoin',
                            data: [300010, 320010, 310020, 330000, 340000],
                            borderColor: '#3E95D1',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Ethereum',
                            data: [4500, 1600, 4700, 4800, 56000],
                            borderColor: '#8e5ea2',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Litecoin',
                            data: [200, 220, 210, 230, 240],
                            borderColor: '#3cba9f',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Ripple',
                            data: [0.5, 0.6, 0.55, 0.65, 0.7],
                            borderColor: '#e8c3b9',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuad'
                    },
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            // Actualizar el precio total al cambiar la criptomoneda o la cantidad
            const criptomonedaSelect = document.getElementById('id_criptomoneda');
            const cantidadInput = document.getElementById('cantidad_de_venta');
            const totalInput = document.getElementById('total');

            function actualizarTotal() {
                const selectedOption = criptomonedaSelect.options[criptomonedaSelect.selectedIndex];
                const precio = selectedOption.getAttribute('data-precio');
                const cantidad = cantidadInput.value;
                totalInput.value = precio * cantidad;
            }

            criptomonedaSelect.addEventListener('change', actualizarTotal);
            cantidadInput.addEventListener('input', actualizarTotal);
        });
    </script>
@endsection
