@extends('layouts.app_sneat_admin')

@section('content')

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-14 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-9">
                                <div class="card-body">
                                    @if (session('status'))
                                        <h3 class="card-title text-primary">
                                            {{ session('status') }}
                                        </h3>
                                    @endif

                                    {{ __('Welcome, You are logged in!') }}
                                </div>

                            </div>
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 col-6 mb-4" style="margin: 5px;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar flex-shrink-0">
                                                            <i class="menu-icon tf-icons bx bx-user-check" style="font-size: 45px;"></i>
                                                        </div>
                                                    </div>
                                                    <span>Siswa Aktif</span>
                                                    <h3 class="card-title text-nowrap mb-1">{{ \App\Models\Siswa::where('status', 'Aktif')->count() }}</h3>
                                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Aktif</small>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-2 col-md-12 col-6 mb-4" style="margin: 5px;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar flex-shrink-0">
                                                            
                                                            <i class="menu-icon tf-icons bx bx-user-plus" style="font-size: 45px;"></i>
                                                        </div>
                                                    </div>
                                                    <span>Siswa Lulus</span>
                                                    <h3 class="card-title text-nowrap mb-1">{{ \App\Models\Siswa::where('status', 'Lulus')->count() }}</h3>
                                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Lulus</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-12 col-6 mb-4" style="margin: 5px;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar flex-shrink-0">
                                                            <i class="menu-icon tf-icons bx bx-user-minus" style="font-size: 45px;"></i>
                                                        </div>
                                                    </div>
                                                    <span>Siswa Pindah</span>
                                                    <h3 class="card-title text-nowrap mb-1">{{ \App\Models\Siswa::where('status', 'Pindah')->count() }}</h3>
                                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Pindah</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-12 col-6 mb-4" style="margin: 5px;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar flex-shrink-0">
                                                            <i class="menu-icon tf-icons bx bx-user-x" style="font-size: 45px;"></i>
                                                        </div>
                                                    </div>
                                                    <span>Siswa Nonaktif</span>
                                                    <h3 class="card-title text-nowrap mb-1"> {{ \App\Models\Siswa::where('status', 'Nonaktif')->count() }}</h3>
                                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Nonaktif</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-50 text-end">
                                        <img src="../sneat/assets/img/illustrations/man-with-laptop-light.png" height="180"
                                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="sneat/assets/img/icons/unicons/chart-success.png"
                        alt="chart success"
                        class="rounded"
                      />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Profit</span>
                  <h3 class="card-title mb-2">$12,628</h3>
                  <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="sneat/assets/img/icons/unicons/wallet-info.png"
                        alt="Credit Card"
                        class="rounded"
                      />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt6"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <span>Sales</span>
                  <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                  <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                </div>
              </div>
            </div> --}}
                </div>
            </div>

            <!-- / Content -->
        @endsection
