@extends('user-views.layouts.app')
@push('addon-style')
<style>
    .slider {
        width: 640px;
        /*Same as width of the large image*/
        position: relative;
        /*Instead of height we will use padding*/
        padding-top: 320px;
        /*That helps bring the labels down*/

        margin: 10px auto;

        /*Lets add a shadow*/
    }

    .slider>img {
        position: absolute;
        left: 0;
        top: 0;
        transition: all 0.5s;
    }

    .slider input[name='slide_switch'] {
        display: none;
    }

    .slider label {
        /*Lets add some spacing for the thumbnails*/
        margin: 18px 0 0 18px;
        border: 3px solid #999;

        float: left;
        cursor: pointer;
        transition: all 0.5s;

        /*Default style = low opacity*/
        opacity: 0.6;
    }

    .slider label img {
        display: block;
    }

    .slider input[name='slide_switch']:checked+label {
        border-color: #666;
        opacity: 1;
    }

    /*Clicking any thumbnail now should change its opacity(style)*/
    /*Time to work on the main images*/
    .slider input[name='slide_switch']~img {
        opacity: 0;
        transform: scale(1.1);
    }

    .slider input[name='slide_switch']:checked+label+img {
        opacity: 1;
        transform: scale(1);
    }

</style>
@endpush

@section('name')
Bengkel Detail
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Page Layout-->
            <div class="d-flex flex-row">
                <!--begin::Layout-->
                <div class="flex-row-fluid">
                    <!--begin::Section-->
                    <div class="row">
                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <!--begin::Engage Widget 14-->
                            <div class="card card-custom gutter-b gutter-b">
                                <div class="slider">
                                    <input type="radio" name="slide_switch" id="id1" />
                                    <label for="id1">
                                        <img src="http://thecodeplayer.com/uploads/media/3yiC6Yq.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/3yiC6Yq.jpg" />

                                    <!--Lets show the second image by default on page load-->
                                    <input type="radio" name="slide_switch" id="id2" checked="checked" />
                                    <label for="id2">
                                        <img src="http://thecodeplayer.com/uploads/media/40Ly3VB.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/40Ly3VB.jpg" />

                                    <input type="radio" name="slide_switch" id="id3" />
                                    <label for="id3">
                                        <img src="http://thecodeplayer.com/uploads/media/00kih8g.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/00kih8g.jpg" />

                                    <input type="radio" name="slide_switch" id="id4" />
                                    <label for="id4">
                                        <img src="http://thecodeplayer.com/uploads/media/2rT2vdx.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/2rT2vdx.jpg" />

                                    <input type="radio" name="slide_switch" id="id5" />
                                    <label for="id5">
                                        <img src="http://thecodeplayer.com/uploads/media/8k3N3EL.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/8k3N3EL.jpg" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Card Body-->
                                <div class="card-body">
                                    <h3 class="font-weight-bold font-size-h2 text-dark-75 mb-3">{{ $bengkel->nama_bengkel }}</h3>

                                    <div class="row">

                                        <div class="col-9">
                                            <div class="separator separator-solid separator-border-4"></div>


                                            <p class="font-size-h6">{{ $bengkel->alamat_bengkel }}</p>
                                            <p class="font-size-h6">{{ $bengkel->jam_buka_bengkel }} - {{ $bengkel->jam_tutup_bengkel }}</p>
                                            <p class="font-size-h6">{{ $bengkel->nohp_bengkel }}</p>

                                        </div>
                                        <div class="col-3">
                                            <a href="{{ route('bengkel-maps', $bengkel->slug ) }}" class="btn btn-light-success font-weight-bold mr-3 mb-5 btn-block">MAPS</a>
                                            <a href="#" class="btn btn-light-success font-weight-bold mr-3 mb-5 btn-block">FAQ</a>
                                            <a href="#" class="btn btn-light-success font-weight-bold mr-3 mb-5 btn-block ">Reservasi</a>

                                        </div>
                                    </div>



                                    <!--begin::Info-->

                                    <!--end::Info-->

                                </div>

                                <!--end::Card Body-->
                            </div>
                            <!--end::Card-->
                            <!--end::Stats Widget 33-->
                        </div>

                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <!--begin::List Widget 19-->
                            <div class="card card-custom example example-compact gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Sparepart</h3>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="scroll scroll-pull ps ps--active-y" data-scroll="true"
                                        style="height: 400px; overflow: hidden;">
                                        @forelse ($sparepart as $item)
                                            <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="https://bengkel-kuy.com/image/{{ $item ->Galleries_one->photo }}"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="{{ route('detail', $item->slug) }}"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{ $item->nama_sparepart }}</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">Rp. {{number_format($item->harga_market)}}</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">review belummmm</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{ $item->keterangan }}</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        @empty
                                            
                                        @endforelse
                                        
                                    </div>
                                    <!--begin: Example code-->

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <!--begin::List Widget 19-->
                            <div class="card card-custom example example-compact gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Perbaikan</h3>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="scroll scroll-pull ps ps--active-y" data-scroll="true"
                                        style="height: 400px; overflow: hidden;">
                                        @forelse ($perbaikan as $item)
                                         <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{$item->nama_jenis_perbaikan}}</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">{{$item->harga_jenis_perbaikan}}</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{ $item->group_jenis_perbaikan }}</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                            
                                        @empty
                                            
                                        @endforelse
                                       
                                        
                                    </div>
                                    <!--begin: Example code-->

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                <!--end::Section-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Page Layout-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!--end::Content-->
@endsection

@push('addon-style')
<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
@endpush
