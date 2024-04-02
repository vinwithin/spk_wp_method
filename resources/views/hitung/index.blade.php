@extends('layout/index')
@section('nilai')
    <ul class="nav nav-pills p-2">
        <li class="active"><a data-toggle="pill" href="#home">Perhitungan</a></li>
        <li><a data-toggle="pill" href="#menu1">Normalisasi</a></li>
        <li><a data-toggle="pill" href="#menu2">Terbobot</a></li>
        <li><a data-toggle="pill" href="#menu3">Ranking</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade show in active ">
            <div class="d-flex card shadow p-3">

                <div class="table-responsive col-lg-">


                    <form action="/artikel" method="get"
                        class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">

                    </form>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>

                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}:
                                        {{ $kriteria->bobot }})</th>
                                @endforeach
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilais as $key => $val)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                                    @foreach ($val as $k => $v)
                                        <td>{{ $v }}</td>
                                    @endforeach
                                    {{-- <td>{{ $minmax[$key]['min'] }}</td>
                                    <td>{{ $minmax[$key]['max'] }}</td> --}}

                                </tr>
                            @endforeach


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div id="menu1" class="tab-pane fade  ">
            <div class="d-flex card shadow p-3">

                <div class="table-responsive col-lg-">


                    

                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>


                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}:
                                        {{ $kriteria->bobot }})</th>
                                @endforeach
                                <th scope="col">Jumlah</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hitung as $key => $val)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @foreach ($val as $k => $v)
                                        <td >{{ (round($v, 4)) }}</td>
                                    @endforeach
                                    <td>{{ $total[$key] }}</td>
                                </tr>
                                
                            @endforeach


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
         <div id="menu2" class="tab-pane fade  ">
            <div class="d-flex card shadow p-3">

                <div class="table-responsive col-lg-8">


                    <form action="/artikel" method="get"
                        class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">

                    </form>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>             
                                <th scope="col">Vektor S</th>             
                                <th scope="col">V</th>             
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vector as $key => $val)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $total[$key] }}</td>
                                <td>{{ $val }}</td>
                            </tr>
                            
                        @endforeach


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="d-flex card shadow p-3">

                <div class="table-responsive col-lg-8">


                    <form action="/artikel" method="get"
                        class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">

                    </form>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Vektor V</th>


                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rank as $key => $val)
                            <tr>
                                <td>{{ $val }}</td>
                                
                                <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                                <td>{{ round($vector[$key], 4) }}</td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
