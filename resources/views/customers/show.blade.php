@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/ekko-lightbox/ekko-lightbox.css')}}">
    <style>
        .id_documents img {
            max-width: 300px;
            margin: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">View Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Customers</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                        <div class="card card-success">
                            <div class="card-header">
                                Personal Info
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i> Name</strong>

                                        <p class="text-muted">
                                            {{$customer->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i> Birthday</strong>

                                        <p class="text-muted">
                                            {{$customer->DOB}}
                                        </p>
                                    </div>


                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i> Sex</strong>

                                        <p class="text-muted">
                                            {{$customer->sex == "M" ? "Male" : "Female"}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i> Email</strong>

                                        <p class="text-muted">
                                            {{$customer->email}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-book mr-1"></i> Address</strong>

                                        <p class="text-muted">
                                            {{$customer->address}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-book mr-1"></i> Category</strong>

                                        <p class="text-muted">
                                            {{$customer->category->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-book mr-1"></i> ID Type</strong>

                                        <p class="text-muted">
                                            {{$customer->documenttype->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-book mr-1"></i> Line</strong>

                                        <p class="text-muted">
                                            {{$customer->line_id ?? "-"}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-book mr-1"></i> Facebook</strong>

                                        <p class="text-muted">
                                            {{$customer->facebook_id ?? '-'}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-book mr-1"></i> Twitter</strong>

                                        <p class="text-muted">
                                            {{$customer->twitter_id ?? '-'}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-book mr-1"></i> Youtube</strong>

                                        <p class="text-muted">
                                            {{$customer->youtube_id ?? "-"}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    <div class="col-md-8">
                        <div class="card card-success">
                            <div class="card-header">
                                Personal Details
                            </div>

                            <div class="card-body">
                                <div class="col-md-12 id_documents">
                                    @php
                                        $documents = $customer->documents;
                                        $documents = explode(', ', $documents);
                                    @endphp
                                    @foreach($documents as $document)
                                        <a href="{{'/uploads/'.$document}}" data-toggle="lightbox">
                                        <img src="{{'/uploads/'.$document}}" alt="">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        });
    </script>
@endsection
