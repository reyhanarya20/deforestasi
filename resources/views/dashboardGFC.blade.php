<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard - Deforestation</title>
    <link rel="icon" href="/assets/img/treebagus-removebg-preview.png">
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <!-- <link href="/assets/img/" rel="icon" /> -->
    <!-- <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    {{-- Library Leaflet  --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    {{-- Library Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmins
  * Updated: Mar 13 2024 with Bootstrap v5.3.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--Buat Chart maps-->
    <script src="https://cdn.jsdelivr.net/npm/ee@0.8.4/dist/ee_api_js.js"></script>
    <script>
        // Inisialisasi Earth Engine
        ee.initialize();

        // Memuat gambar
        var image = ee.Image('LANDSAT/LC08/C01/T1_TOA/LC08_044034_20140318');

        // Menampilkan gambar di peta
        Map.centerObject(image, 10);
        Map.addLayer(image, {
            bands: ['B4', 'B3', 'B2'],
            max: 0.3
        }, 'Landsat 8');
    </script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 400px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('gfcdashboard') }}" class="logo d-flex align-items-center">
                <img src="/assets/img/treebagus-removebg-preview.png" alt="" />
                <span class="d-none d-lg-block">Deforestation</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->username }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('myprofile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('gfcdashboard') }}">
                    <i class="bi bi-grid" id="logo-color"></i>
                    <span>GFC</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ntldashboard') }}">
                    <i class="bi bi-grid" id="logo-color"></i>
                    <span>NTL</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->
        </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <!-- <h1>Dashboard</h1> -->
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <!-- About GFC -->
                <div class="col-xxl-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">About GFC</h5>

                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <p class="text-justify">
                                        <small>
                                            Sebuah proyek yang bertujuan untuk memantau perubahan hutan di seluruh dunia
                                            menggunakan citra satelit. Proyek ini menggunakan data dari satelit Landsat
                                            untuk mengidentifikasi dan memetakan perubahan tutupan lahan
                                            dan kondisi hutan di seluruh dunia.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-12">
                    <div class="row">
                        <!-- Forest Loss Card -->
                        <div class="col-md-5">
                            <div class="card info-card forestloss-card" style="height:202px;">
                                <div class="card-body">
                                    <h5 class="card-title">Forest Loss <span>| GFC</span></h5>

                                    <div class="d-flex align-items-center mt-4">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-arrow-down-circle-fill"></i>
                                            <!-- EDIT -->
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="text-danger">{{ number_format($total, 3, ',', '.') }} kha Loss
                                            </h6>
                                            <small>Menampilkan data
                                                @if (!empty($province_name))
                                                    {{ $province_name }}
                                                @else
                                                    seluruh provinsi dan
                                                @endif

                                                @if (!empty($year))
                                                    tahun {{ $year }}
                                                @else
                                                    seluruh tahun
                                                @endif
                                            </small>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Forest Gain Card -->

                        <!-- Filter Card -->
                        <div class="col-md-7">
                            <div class="card info-card filter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Filter <span>| Provinsi & Tahun</span></h5>
                                    <form action="{{ route('filter-gfc') }}" method="get">
                                        <div class="gap-3">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="province_id" class="form-label">Provinsi</label>
                                                    <select class="form-select" aria-label="Large select example"
                                                        name="province_id">
                                                        <option value="" selected>Pilih provinsi</option>
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">
                                                                {{ $province->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="province_id" class="form-label">Tahun</label>
                                                    <select class="form-select" aria-label="Large select example"
                                                        name="year">
                                                        <option value="" selected>Pilih Tahun</option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year }}">
                                                                {{ $year }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">
                                                Simpan Filter
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Card -->

                    <!-- Maps -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Maps <span>/GFC</span></h5>

                                <!-- Line Chart -->
                                {{-- <div id="reportsChart" style="width: auto"></div> --}}
                                <div id="map"></div>

                                <script>
                                    var map = L.map('map').fitWorld().setView([-4.8877000, 116.3197000], 5);
                                    var tiles = L.tileLayer(
                                        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
                                            maxZoom: 18,
                                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                            id: 'mapbox/streets-v11',
                                            tileSize: 512,
                                            zoomOffset: -1
                                        }).addTo(map);

                                    // Array of marker coordinates
                                    var markerCoordinates = [

                                        @foreach ($coordinates as $cor)
                                            [{{ $cor->lat }}, {{ $cor->long }}],
                                        @endforeach

                                    ];

                                    // Array of marker names
                                    var markerNames = [
                                        @foreach ($coordinates as $cor)
                                            "{{ $cor->name }}",
                                        @endforeach
                                    ];

                                    // Array of total losses
                                    var markerLosses = [
                                        @foreach ($cordinateslos as $cor)
                                            "{{ $cor->total_loss }}",
                                        @endforeach
                                    ];

                                    // Adding markers to the map
                                    for (var i = 0; i < markerCoordinates.length; i++) {
                                        var coord = markerCoordinates[i];
                                        var name = markerNames[i];
                                        var marker = L.marker(coord).addTo(map);
                                        var loss = markerLosses[i]; // Mengambil loss yang sesuai dengan indeks i
                                        // console.log(name);
                                        console.log(coord);
                                        // console.log(loss);
                                        marker.bindPopup('<b>' + name + '</b><br />Rata-rata Loss: ' + loss).openPopup();
                                    }

                                    function onMapClick(e) {
                                        var popup = L.popup()
                                            .setLatLng(e.latlng)
                                            .setContent('You clicked the map at ' + e.latlng.toString())
                                            .openOn(map);
                                    }

                                    map.on('click', onMapClick);
                                </script>
                                <!-- End Line Chart -->

                                <!-- Tempatkan elemen peta -->
                            </div>
                        </div>
                    </div>

                    <!-- End Maps -->

                    <!-- Chart -->
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="card" style="min-height: 568px">
                                <div class="card-body">
                                    <h5 class="card-title">Chart <span>/Yearly Forest Loss</span></h5>

                                    <div>
                                        <canvas id="barchart"></canvas>
                                    </div>

                                    <script>
                                        const ctx1 = document.getElementById('barchart');

                                        new Chart(ctx1, {
                                            type: 'bar',
                                            data: {
                                                labels: [
                                                    @foreach ($yearsbar as $yearbar)
                                                        '{{ $yearbar }}',
                                                    @endforeach
                                                ],
                                                datasets: [{
                                                    label: '# of Votes',
                                                    data: [
                                                        @foreach ($barcharts as $barchart)
                                                            '{{ $barchart->avg_loss_year }}',
                                                        @endforeach
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            },
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- End Chart -->

                        <!-- Chart -->
                        <div class="col-md-4 col-sm-12 ">
                            <div class="card" style="min-height: 568px">
                                <div class="card-body">
                                    <h5 class="card-title">Chart <span>/Yearly Forest Loss</span></h5>

                                    <div>
                                        <canvas class="" style="max-width: 500px; max-height: 500px;"
                                            id="doughnutchart"></canvas>
                                    </div>

                                    <script>
                                        const ctx2 = document.getElementById('doughnutchart');

                                        new Chart(ctx2, {
                                            type: 'pie',
                                            data: {
                                                labels: [
                                                    @foreach ($doughnutlabels as $label)
                                                        '{{ $label }}',
                                                    @endforeach
                                                ],
                                                datasets: [{
                                                    label: 'My First Dataset',
                                                    data: [
                                                        @foreach ($doughnutvalues as $doughnut)
                                                            '{{ $doughnut }}',
                                                        @endforeach
                                                    ],
                                                    backgroundColor: [
                                                        "rgb(255,193,0)",
                                                        "rgb(255,154,0)",
                                                        "rgb(255,116,0)",
                                                        "rgb(255,77,0)",
                                                        "rgb(255,0,0)"
                                                    ],
                                                    hoverOffset: 4
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            },
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- End Chart -->
                    </div>

                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Loss Forest | Prediction</h5>

                                <!-- <img src="/assets/img/tableau ntl sementara.png" alt="data NTL" width="900" height="500" style="justify-content: center; align-items: center" /> -->

                                <div id="carouselExampleDark" class="carousel carousel-dark slide"
                                    data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        @foreach ($images as $key => $item)
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="{{ $key }}"
                                                class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                                                aria-label="Slide {{ $key + 1 }}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach ($images as $key => $item)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ url('images/ntl/' . $item->path) }}.png"
                                                    class="d-block w-100" alt="{{ $item->name }}">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <p>{{ $item->year }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- Berita -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Berita</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Whole Indonesia -->
                                        <iframe width="520" height="690" frameborder="0"
                                            src="https://www.globalforestwatch.org/embed/widget/treeLoss/country/IDN"></iframe>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- ANNUAL TREE COVER LOSS BY DOMINANT DRIVER IN INDONESIA -->
                                        <iframe width="520" height="690" frameborder="0"
                                            src="https://www.globalforestwatch.org/embed/widget/treeLossTsc/country/IDN"></iframe>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- COMPONENTS OF NET CHANGE IN TREE COVER IN INDONESIA -->
                                        <iframe width="520" height="690" frameborder="0"
                                            src="https://www.globalforestwatch.org/embed/widget/netChange/country/IDN"></iframe>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- TREE COVER BY TYPE IN INDONESIA -->
                                        <iframe width="520" height="690" frameborder="0"
                                            src="https://www.globalforestwatch.org/embed/widget/treeCover/country/IDN"></iframe>
                                    </div>
                                </div>




                                <!-- Bar Chart -->
                                <div id="reportsChart" style="width: auto"></div>

                                <!-- End Line Chart -->
                            </div>
                        </div>
                    </div>
                    <!-- End Berita -->
                </div>
            </div>
            <!-- End Left side columns -->
            </div>
        </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Deforestation</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">UMN Deforestation Research Team (Reyhan & Thomas)</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
</body>

</html>
