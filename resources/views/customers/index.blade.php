@extends('layouts.app')

@section('styles')
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <style>
        a {
            color: unset;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group label {
            margin-bottom: 0;
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
                        <h1 class="m-0 text-dark">Customers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashbaord</a></li>
                            <li class="breadcrumb-item active">Customers</li>
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
                            <form id="filter_form" action="{{route('customers.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_name">Name</label>
                                            <input type="text" name="name" id="customer_name"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_address">Address</label>
                                            <input type="text" name="address" id="customer_address"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_DOB">Birthday</label>
                                            <input type="date" name="DOB" id="customer_DOB"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_sex">Sex</label>
                                            <select name="sex" id="customer_sex" class="form-control form-control-sm">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_phone">Phone</label>
                                            <input type="text" name="phone" id="customer_phone"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_email">Email</label>
                                            <input type="email" name="email" id="customer_email"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_line">Line</label>
                                            <input type="text" name="line_id" id="customer_line"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_facebook">Facebook</label>
                                            <input type="text" name="facebook_id" id="customer_facebook"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_twitter">Twitter</label>
                                            <input type="text" name="twitter_id" id="customer_twitter"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_telegram">Telegram </label>
                                            <input type="text" name="telegram_id" id="customer_telegram"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_youtube">YouTube </label>
                                            <input type="text" name="youtube_id" id="customer_youtube"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_category">Category</label>
                                            <select name="category_id" id="customer_category"
                                                    class="form-control form-control-sm">
                                                @foreach($categoriss as $key=>$category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_id_type">ID Type</label>
                                            <select name="documenttype_id" id="customer_id_type"
                                                    class="form-control form-control-sm">
                                                @foreach($documenttypes as $key=>$documenttype)
                                                    <option
                                                        value="{{$documenttype->id}}">{{$documenttype->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_ip_address">Ip Address</label>
                                            <input type="text" name="ipaddress" id="customer_ip_address"
                                                   class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-sm float-right ml-3">Search</button>
                                        <button type="reset" class="btn btn-primary btn-sm float-right clear-filter">
                                            Clear
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="card card-body ">
                            <table id="customer_table" class="table table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Account ID</th>
                                    <th>Address</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Line</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Telegram</th>
                                    <th>Youtube</th>
                                    <th>ID type</th>
                                    <th>Ip Address</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $key=>$customer)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>account_{{$customer->id}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->sex}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->line_id}}</td>
                                        <td>{{$customer->facebook_id}}</td>
                                        <td>{{$customer->twitter_id}}</td>
                                        <td>{{$customer->telegram_id}}</td>
                                        <td>{{$customer->youtube_id}}</td>
                                        <td>{{$customer->documenttype->name}}</td>
                                        <td>{{$customer->ipaddress}}</td>
                                        <td>{{$customer->category->name}}</td>
                                        <td>
                                            <buttton class="btn btn-sm btn-success">
                                                View <a class="fa fa-eye action"
                                                        href="{{ route('customers.show', $customer->id) }}"></a>
                                            </buttton>
                                            <buttton class="btn btn-sm btn-warning">
                                                Edit <a class="fa fa-pen action"
                                                        href="{{ route('customers.show', $customer->id) }}"></a>
                                            </buttton>
                                            <buttton class="btn btn-sm btn-danger">
                                                Delete <a class="fa fa-trash action"
                                                          href="{{ route('customers.show', $customer->id) }}"></a>
                                            </buttton>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script>


        $(function () {
            var datatable = $("#customer_table").DataTable({
                "autoWidth": true,
            });

            function drawtable(data) {
                console.log(data);
                datatable.destroy();

                let txt = ""
                for (let i = 0; i < data.length; i++) {
                    let key = i + 1
                    txt += "<tr>";
                    txt += "<td>" + key + "</td>"
                    txt += "<td>" + (data[i]['name'] ? data[i]['name'] : '') + "</td>"
                    txt += "<td>account_" + (data[i]['id'] ? data[i]['id'] : '') + "</td>"
                    txt += "<td>" + (data[i]['address'] ? data[i]['address'] : '') + "</td>"
                    txt += "<td>" + (data[i]['sex'] ? data[i]['sex'] : '') + "</td>"
                    txt += "<td>" + (data[i]['phone'] ? data[i]['phone'] : '') + "</td>"
                    txt += "<td>" + (data[i]['email'] ? data[i]['email'] : '') + "</td>"
                    txt += "<td>" + (data[i]['line_id'] ? data[i]['line_id'] : '') + "</td>"
                    txt += "<td>" + (data[i]['facebook_id'] ? data[i]['facebook_id'] : '') + "</td>"
                    txt += "<td>" + (data[i]['twitter_id'] ? data[i]['twitter_id'] : '') + "</td>"
                    txt += "<td>" + (data[i]['telegram_id'] ? data[i]['telegram_id'] : '') + "</td>"
                    txt += "<td>" + (data[i]['youtube_id'] ? data[i]['youtube_id'] : '') + "</td>"
                    txt += "<td>" + (data[i]['documenttype']['name'] ? data[i]['documenttype']['name'] : '') + "</td>"
                    txt += "<td>" + (data[i]['ipaddress'] ? data[i]['ipaddress'] : '') + "</td>"
                    txt += "<td>" + (data[i]['category']['name'] ? data[i]['category']['name'] : '') + "</td>"
                    txt += `<td>
                                <buttton class="btn btn-sm btn-success">
                                    View <a class="fa fa-eye action"
                                            href="{{ route('customers.show', $customer->id) }}"></a>
                                </buttton>
                                <buttton class="btn btn-sm btn-warning">
                                    Edit <a class="fa fa-pen action"
                                            href="{{ route('customers.show', $customer->id) }}"></a>
                                </buttton>
                                <buttton class="btn btn-sm btn-danger">
                                    Delete <a class="fa fa-trash action"
                                              href="{{ route('customers.show', $customer->id) }}"></a>
                                </buttton>
                            </td>`;
                    txt += "</tr>";
                }

                $('#customer_table tbody').html(txt);
                datatable = $("#customer_table").DataTable({
                    "autoWidth": true,
                });

            }

            $('#filter_form').submit(function (e) {
                e.preventDefault()
                let form_data = $(this).serialize();
                console.log(form_data)

                $.ajax({
                    type: "POST",
                    url: '{{route('searchcustomers')}}',
                    data: form_data,
                }).done(function (res) {
                    drawtable(res);
                });
            })


        });
    </script>
@endsection
