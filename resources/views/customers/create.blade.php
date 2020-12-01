@extends('layouts.app')

@section('styles')

@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">New Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Customers</a></li>
                            <li class="breadcrumb-item active">New</li>
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
                    <div class="col-md-12">
                        <div class="card card-body">
                            <form action="{{route('customers.store')}}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Name</label>
                                            <input type="text" name="name" id="" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Address</label>
                                            <input type="text" name="address" id=""
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Birthday</label>
                                            <input type="date" name="DOB" id="" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Sex</label>
                                            <select name="sex" id="" class="form-control form-control-sm">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Phone</label>
                                            <input type="text" name="phone" id="" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Email</label>
                                            <input type="email" name="email" id="" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Line</label>
                                            <input type="text" name="line_id" id=""
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Facebook</label>
                                            <input type="text" name="facebook_id" id=""
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Twitter</label>
                                            <input type="text" name="twitter_id" id=""
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Telegram </label>
                                            <input type="text" name="telegram_id" id=""
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">YouTube </label>
                                            <input type="text" name="youtube_id" id=""
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Category</label>
                                            <select name="category_id" id="" class="form-control form-control-sm">
                                                @foreach($categoriss as $key=>$category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">ID Type</label>
                                            <select name="documenttype_id" id="" class="form-control form-control-sm">
                                                @foreach($documenttypes as $key=>$documenttype)
                                                    <option
                                                        value="{{$documenttype->id}}">{{$documenttype->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Upload Documents</label>
                                            <input type="text" name="" id="" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quote_hidden_comment">Ip Address</label>
                                            <input type="text" name="ipaddress" id=""
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-sm float-right">Save</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')

@endsection
