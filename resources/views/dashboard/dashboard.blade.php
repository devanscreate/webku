@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pendaftar <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 id="totalDaftar">{{ $total }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Pendaftar <span>| Diproses</span></h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>

                                <div class="ps-3">
                                    <h6 id="totalProses">{{ $proses }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Pendaftar <span>| Diterima</span></h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>

                                <div class="ps-3">
                                    <h6 id="totalTerima">{{ $terima }}</h6>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    const totalDaftarElement = document.querySelector("#totalDaftar");
                                    const totalDaftarValue = parseFloat(totalDaftarElement.textContent);

                                    const totalTerimaElement = document.querySelector("#totalTerima");
                                    const totalTerimaValue = parseFloat(totalTerimaElement.textContent);

                                    const totalProsesElement = document.querySelector("#totalProses");
                                    const totalProsesValue = parseFloat(totalProsesElement.textContent);

                                    echarts.init(document.querySelector("#trafficChart")).setOption({
                                        tooltip: {
                                            trigger: 'item'
                                        },
                                        legend: {
                                            top: '5%',
                                            left: 'center'
                                        },
                                        series: [{
                                            name: 'Access From',
                                            type: 'pie',
                                            radius: ['40%', '70%'],
                                            avoidLabelOverlap: false,
                                            label: {
                                                show: false,
                                                position: 'center'
                                            },
                                            emphasis: {
                                                label: {
                                                    show: true,
                                                    fontSize: '18',
                                                    fontWeight: 'bold'
                                                }
                                            },
                                            labelLine: {
                                                show: false
                                            },
                                            data: [{
                                                    value: totalDaftarValue,
                                                    name: 'Total Pendaftar'
                                                },
                                                {
                                                    value: totalTerimaValue,
                                                    name: 'Pendaftar Diterima'
                                                },
                                                {
                                                    value: totalProsesValue,
                                                    name: 'Pendaftar Diproses'
                                                },
                                            ]
                                        }]
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
    </div>
</section>
@endsection