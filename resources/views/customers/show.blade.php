@extends('layouts.app')
@section('title', 'Show Customer')
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

                        <div class="card">
                            <div class="ribbon-wrapper">
                                <div class="ribbon bg-danger">
                                    Pending
                                </div>
                            </div>
                            <div class="card-header">
                                Personal Info
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i> Name</strong>

                                        <p class="text-muted">
                                            {{$customer->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fa fa-birthday-cake mr-1"></i> Birthday</strong>

                                        <p class="text-muted">
                                            {{$customer->DOB}}
                                        </p>
                                    </div>


                                    <div class="col-md-4">
                                        <strong><i class="fas fa-venus-mars"></i> Sex</strong>

                                        <p class="text-muted">
                                            {{$customer->sex == "M" ? "Male" : "Female"}}
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                                        <p class="text-muted">
                                            {{$customer->email}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-phone"></i> Phone</strong>

                                        <p class="text-muted">
                                            {{$customer->phone ?? "-"}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fas fa-address-book mr-1"></i> Address</strong>

                                        <p class="text-muted">
                                            {{$customer->address}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-list mr-1"></i> Category</strong>

                                        <p class="text-muted">
                                            {{$customer->category->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-id-card mr-1"></i> ID Type</strong>

                                        <p class="text-muted">
                                            {{$customer->documenttype->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i> Line</strong>

                                        <p class="text-muted">
                                            {{$customer->line_id ?? "-"}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fab fa-facebook-square"></i> Facebook</strong>

                                        <p class="text-muted">
                                            {{$customer->facebook_id ?? '-'}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fab fa-twitter-square mr-1"></i> Twitter</strong>

                                        <p class="text-muted">
                                            {{$customer->twitter_id ?? '-'}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fab fa-youtube-square mr-1"></i> Youtube</strong>

                                        <p class="text-muted">
                                            {{$customer->youtube_id ?? "-"}}
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fa fa-tags mr-1"></i> Tags</strong>

                                        <p class="text-muted">
                                            @forelse($tags as $tag)
                                                <span class="badge badge-success">
                                                    {{$tag->name}}
                                                </span>
                                            @empty
                                            {{$customer->youtube_id ?? "-"}}
                                            @endforelse
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <strong><i class="fa fa-network-wired mr-1"></i> Ip Address</strong>

                                        <p class="text-muted">
                                            {{$customer->ipaddress ?? "-"}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Bonus History

                            </div>

                            <div class="card-body">
                                <a class="btn btn-app" data-toggle="modal" data-target="#Bonus_add_modal">
                                    <i class="fas fa-plus"></i> Add New
                                </a>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Description</td>
                                            <td>Amount</td>
                                            <td>Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bonuses as $key=>$bonus)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$bonus->description}}</td>
                                                <td>{{$bonus->amount}}</td>
                                                <td>{{date('d/m/Y', strtotime($bonus->created_at))}}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                ID Documents
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

                        <div class="card">
                            <div class="card-header">
                                Customer Notes
                            </div>

                            <div class="card-body">
                                <a class="btn btn-app" data-toggle="modal" data-target="#note_add_modal">
                                    <i class="fas fa-plus"></i> Add New
                                </a>

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Description</td>
                                        <td>Date</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($notes as $key=>$note)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$note->description}}</td>
                                            <td>{{date('d/m/Y', strtotime($note->created_at))}}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <div class="modal fade" id="Bonus_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('bonus.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$customer->id}}">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Bonus</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bonus_description">Description</label>
                            <input type="text" class="form-control" id="bonus_description" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="bonus_amount">Amount</label>
                            <input type="number" class="form-control" id="bonus_amount" name="amount" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="note_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('notes.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$customer->id}}">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Note</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bonus_description">Description</label>
                            <textarea id="bonus_description" name="description" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
