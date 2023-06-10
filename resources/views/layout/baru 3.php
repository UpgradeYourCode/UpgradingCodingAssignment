    @extends('layouts.sidebar')

    @section('title','Home')

    @section('content')
    <h2 class="mt-4">Selamat Datang</h2>
    
    <div class="row mt-4">    
        {{-- 1   --}}
        <div class="col-6 col-md-3">
            <div class="card" style="width: 260px; height: 100px; background-color: rgba(103, 0, 255, 0.733); color: aliceblue;">
                <div class="card-body text-center">
                    <h4 class="card-title"><li type="none" class="bi bi-basket-fill"> Barang</li></h4>
                    <h5 class="card-title">{{ $barang }}</h5>
                </div>s
            </div>
        </div>
        {{-- 2 --}}
        <div class="col-6 col-md-3">
            <div class="card" style="width: 260px; height: 100px; background-color: rgba(41, 104, 240, 0.733); color: aliceblue;">
                <div class="card-body text-center">
                    <h4 class="card-title"><li type="none" class="bi bi-person-check"> Suplier</li></h4>
                    <h5 class="card-title">{{ $pemasok }}</h5>
                </div>
            </div>
        </div>
        {{-- 3 --}}
        <div class="col-6 col-md-3">
            <div class="card" style="width: 260px; height: 100px; background-color: rgba(34, 197, 61, 0.959); color: aliceblue;">
                <div class="card-body text-center">
                    <h4 class="card-title"><li type="none" class="bi bi-cash-stack"> Hari ini</li></h4>
                    <h5 class="card-title">Rp.{{ number_format($total_hariini,2,',','.') }}</h5>
                </div>
            </div>
        </div>
        {{-- 4 --}}
        <div class="col-6 col-md-3">
            <div class="card" style="width: 260px; height: 100px; background-color: rgb(38, 43, 71); color: aliceblue;">
                <div class="card-body text-center">
                    <h4 class="card-title"><li type="none" class="bi bi-currency-dollar">Total Pendapatan</li></h4>
                    <h5 class="card-title">Rp.{{  number_format($total_bulanini,2,',','.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Grafik Penjualan Tahun ini</div>
                    <div class="card-body">
                        <div id="grafik"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
    <script src="{{ asset('js/hightcharts.js') }}"></script>
    <script type="text/javascript">
        var pendapatan = {{ json_encode($total_harga) }};
        var bulan = {!! json_encode($bulan) !!};
        console.log(pendapatan);
        console.log(bulan);

        Highcharts.chart('grafik', {
            title :{
                text : 'Grafik Pendapatan Bulanan'
            },
            xAxis :{
                categories : bulan
            },
            yAxis : {
                title:{
                    text:'Nominal Pendapatan Bulanan'
                }
            },
            plotOptions:{
                series:{
                    allowPointSelect:true
                }
            },
            series : [
            {
                name: 'Nominal Pendapatan',
                data: pendapatan
            }
            ]
        });
    </script>
    @endsection
	