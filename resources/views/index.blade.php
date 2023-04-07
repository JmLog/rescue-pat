@extends('layouts.layout')

@section('content')
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Breadcrumbs -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                </ul>
            </div>
            <!-- Page Header-->
            <div class="page-header">
                <h1 class="page-heading">Gallery</h1>
            </div>
            <section>
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card mb-4">
                            <a class="glightbox" href="" data-gallery="gallery" data-title="Image 1">
                                <img class="card-img-top" src="{{ asset('images/item/item_1.jpg') }}" alt="Image 1">
                            </a>
                            <div class="card-body p-3 p-lg-4">
                                <h6 class="card-title fw-bold mb-1">유기견을 도와주세요!</h6>
                                <p class="card-text text-muted text-sm">경기도 의정부시 용민로...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
