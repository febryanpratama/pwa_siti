@extends('layouts.base.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                    <!-- Revenue, Hit Rate & Deals -->
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Grafik Pembayaran SPP</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <form action="">
                                                @csrf
                                                <select name="tahun" class="btn btn-glow btn-round btn-bg-gradient-x-red-pink form-control" id="tahun" >
                                                    <option value="">Pilih Tahun</option>
                                                    @for ($i = 2020; $i < 2025; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                    {{-- @foreach ($tahun as $item)
                                                        <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body p-1 pb-0">
                                        <div class="chartist">
                                            <div id="project-stats" class="height-350 areaGradientShadow1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card pull-up bg-gradient-directional-danger">
                                        <div class="card-header bg-hexagons-danger">
                                            <h4 class="card-title white">Jumlah Siswa</h4>
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li>
                                                        <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width pull-right"
                                                            href="#" target="_blank">Report <i
                                                                class="ft-bar-chart pl-1"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content collapse show bg-hexagons-danger">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="align-self-center width-100">
                                                        <div id="Analytics-donut-char" class="height-100 donutShadow">
                                                        </div>
                                                    </div>
                                                    <div class="media-body text-right mt-1">
                                                        <h3 class="font-large-2 white">{{ $countsiswa }}</h3>
                                                        <h6 class="mt-1">
                                                            <span class="text-muted white">Analytics in the <a
                                                                    href="#" class="darken-2 white">last year.</a></span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                        <div class="card-header">
                                            <h4 class="card-title">Total Guru <span
                                                    class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body p-1">
                                                <h4 class="font-large-1 text-bold-400">{{ $countguru }} Guru<i class="ft-users float-right"></i>
                                                </h4>
                                            </div>
                                            <div class="card-footer p-1">
                                                <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i> Data Widget</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Revenue, Hit Rate & Deals -->
                    <!-- Emails Products & Avg Deals -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                        <div class="card-header">
                                            <h4 class="card-title">Target Pembayaran <span
                                                    class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body p-1">
                                                <h4 class="font-large-1 text-bold-400">Rp. {{ number_format($spplunas+$sppbelumlunas+$sppcicilan, '0') }} <i class="ft-users float-right"></i>
                                                </h4>
                                            </div>
                                            <div class="card-footer p-1">
                                                <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i>
                                                    Data Widget
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                        <div class="card-header">
                                            <h4 class="card-title">Jumlah Pembayaran <span
                                                    class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body p-1">
                                                <h4 class="font-large-1 text-bold-400">Rp. {{ number_format($spplunas+$sppcicilan, '0') }} <i class="ft-users float-right"></i>
                                                </h4>
                                            </div>
                                            <div class="card-footer p-1">
                                                <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i>
                                                    Data Widget
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                        <div class="card-header">
                                            <h4 class="card-title">Persentase Target Pembayaran <span
                                                    class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body p-1">
                                                <h4 class="font-large-1 text-bold-400"> {{ substr((($spplunas+$sppcicilan)/($spplunas+$sppbelumlunas+$sppcicilan))*100,0,5) }} % <i class="ft-users float-right"></i>
                                                </h4>
                                            </div>
                                            <div class="card-footer p-1">
                                                <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i>
                                                    Data Widget
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                        <div class="card-header">
                                            <h4 class="card-title">Spp Lunas <span
                                                    class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body p-1">
                                                <h4 class="font-large-1 text-bold-400">Rp. {{ number_format($spplunas, '0') }} <i class="ft-users float-right"></i>
                                                </h4>
                                            </div>
                                            <div class="card-footer p-1">
                                                <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i>
                                                    Data Widget
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                        <div class="card-header">
                                            <h4 class="card-title">Spp Belum Lunas <span
                                                    class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body p-1">
                                                <h4 class="font-large-1 text-bold-400">Rp. {{ number_format($sppbelumlunas, '0') }} <i class="ft-users float-right"></i>
                                                </h4>
                                            </div>
                                            <div class="card-footer p-1">
                                                <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i>
                                                    Data Widget
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                                        <div class="card-header">
                                            <h4 class="card-title">Spp Cicilan <span
                                                    class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body p-1">
                                                <h4 class="font-large-1 text-bold-400">Rp. {{ number_format($sppcicilan, '0') }} <i class="ft-users float-right"></i>
                                                </h4>
                                            </div>
                                            <div class="card-footer p-1">
                                                <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i>
                                                    Data Widget
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Presentasi Pembayaran</h5>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart" ></div>
                                        </div>
                                    </div>

                                    {{-- <div id="chart" style="height: 50vh"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Emails Products & Avg Deals -->
                    <!-- Chat and Recent Projects -->
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                            <h5 class="card-title text-bold-700 my-2">Recent Data</h5>
                            <div class="card">
                                <div class="card-content">
                                    <div id="recent-projects" class="media-list position-relative">
                                        <div class="table-responsive">
                                            <table class="table table-padded table-xl mb-0" id="recent-project-table">
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0">Nama Siswa</th>
                                                        <th class="border-top-0">Bendahara</th>
                                                        <th class="border-top-0">Tanggal Pembayaran</th>
                                                        <th class="border-top-0">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($listspp as $item=>$it)
                                                    <tr>
                                                        <td class="text-truncate align-middle">
                                                            <a href="#">{{ $it->siswa->nama_siswa }}</a>
                                                        </td>
                                                        <td class="text-truncate">
                                                            <ul class="list-unstyled users-list m-0">
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-original-title="{{ @$it->guru->nama_guru }}"
                                                                    class="avatar avatar-sm pull-up">
                                                                    <img class="media-object rounded-circle"
                                                                        src="{{ asset('') }}admin/app-assets/images/portrait/small/avatar-s-19.png"
                                                                        alt="Avatar" >
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="text-truncate pb-0">
                                                            <span>{{ \Carbon\Carbon::parse($it->updated_at)->format('d/m/Y H:i:s') }}</span>
                                                            {{-- <p class="font-small-2 text-muted"> in 11 Days</p> --}}
                                                        </td>
                                                        <td>
                                                            @switch($it->status_pembayaran)
                                                                @case('Lunas')
                                                                    <div class="badge badge-success">Lunas</div>
                                                                    @break
                                                                    @case('Cicilan')
                                                                    <div class="badge badge-warning">Cicilan</div>
                                                                    
                                                                    @break
                                                                @default
                                                                    
                                                            @endswitch
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Products sell and New Orders -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // $(document).ready(function(){
        // let data = []
        $('#tahun').on('change', function(){
            let val = $('#tahun option:selected').val();
            console.log(val);

            $.ajax({
                url: "{{ url('api/dashboard') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    tahun: val
                },
                success: function(res){
                    console.log(res.data);
                    // data = res;
                    chart(res.data)
                }
            })

        });

        function chart(val){
                    var projectStats = new Chartist.Line(
            "#project-stats",
            {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                series: [
                    val,
                    // [75, 120, 50, 80, 130, 60, 120, 50, 80, 130, 60, 120],
                    // [110, 50, 70, 20, 90, 150, 0, 50, 70, 20, 90, 150],
                ],
            },
            {
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 2,
                }),
                fullWidth: true,
                showArea: true,
                chartPadding: {
                    right: 35,
                    left: 50
                },

                axisX: {
                    showGrid: false,
                },
                axisY: {
                    labelInterpolationFnc: function (value) {
                        return value + ".";
                    },
                    scaleMinSpace: 40,
                    showGrid: false,
                },
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: true,
                        pointClass: "ct-point",
                    }),
                ],
                low: 0,
                onlyInteger: true,
            }
        );

        projectStats
            .on("created", function (data) {
                var defs = data.svg.querySelector("defs") || data.svg.elem("defs");
                defs.elem("linearGradient", {
                    id: "area-gradient",
                    x1: 1,
                    y1: 0,
                    x2: 0,
                    y2: 0,
                })
                    .elem("stop", {
                        offset: 0,
                        "stop-color": "rgba(248,161,236, 1)",
                    })
                    .parent()
                    .elem("stop", {
                        offset: 1,
                        "stop-color": "rgba(115,150,255, 1)",
                    });

                return defs;
            })
            // .on("draw", function (data) {
            //     var circleRadius = 9;
            //     if (data.type === "point") {
            //         var circle = new Chartist.Svg("circle", {
            //             cx: data.x,
            //             cy: data.y,
            //             "ct:value": data.y,
            //             r: circleRadius,
            //             class:
            //                 data.value.y === 180 || data.value.y === 150
            //                     ? "ct-point-circle ct-point"
            //                     : "ct-point ct-point-circle-transperent",
            //         });
            //         data.element.replace(circle);
            //     }
            //     if (data.type === "line" || data.type == "area") {
            //         data.element.animate({
            //             d: {
            //                 begin: 1000,
            //                 dur: 1000,
            //                 from: data.path
            //                     .clone()
            //                     .scale(1, 0)
            //                     .translate(0, data.chartRect.height())
            //                     .stringify(),
            //                 to: data.path.clone().stringify(),
            //                 easing: Chartist.Svg.Easing.easeOutQuint,
            //             },
            //         });
            //     }
            // });
        }

    // })
</script>
<script>
   $(document).ready(function(){
      var jumlah = "{{ ($spplunas+$sppcicilan) }}"
      var target = "{{ ($spplunas+$sppbelumlunas+$sppcicilan)-($spplunas+$sppcicilan) }}"
      var jumint = parseInt(jumlah)
      var targetint = parseInt(target)

    //   console.log(jumint +"ok"+targetint)
       var options = {
          series: [targetint,jumint],
          chart: {
        //   width: 1000,
        height: 'auto',
          type: 'pie',
        },
        labels: ['Target Pembayaran', 'Realisasi Pembayaran'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
            //   width: 'auto'
            height: 'auto'
            },
            legend: {
              position: 'top'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
});
</script>
@endsection