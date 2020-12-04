@extends('layouts.app')
@section('title', 'Customers')

@section('styles')
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/intl-tel-input/css/intlTelInput.min.css')}}">
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

        table td {
            vertical-align: middle !important;
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
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="" data-toggle="pill"
                                           href="#tab_search_by_fields" role="tab"
                                           aria-controls="custom-tabs-four-home" aria-selected="true">Filter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="" data-toggle="pill"
                                           href="#tab_ip_analyse" role="tab"
                                           aria-controls="custom-tabs-four-profile" aria-selected="false">Ip Analyse</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade active show" id="tab_search_by_fields" role="tabpanel"
                                         aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-body">
                                                    <form id="filter_form" action="{{route('users.store')}}"
                                                          method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_name">Name</label>
                                                                    <input type="text" name="name" id="customer_name"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_address">Address</label>
                                                                    <input type="text" name="address"
                                                                           id="customer_address"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_DOB">Birthday</label>
                                                                    <input type="date" name="DOB" id="customer_DOB"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_sex">Sex</label>
                                                                    <select name="sex" id="customer_sex"
                                                                            class="form-control form-control-sm">
                                                                        <option value=""></option>
                                                                        <option value="M">Male</option>
                                                                        <option value="F">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_phone">Phone</label>
                                                                    <input type="text" name="phone" id="customer_phone"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_email">Email</label>
                                                                    <input type="email" name="email" id="customer_email"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_line">Line</label>
                                                                    <input type="text" name="line_id" id="customer_line"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_facebook">Facebook</label>
                                                                    <input type="text" name="facebook_id"
                                                                           id="customer_facebook"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_twitter">Twitter</label>
                                                                    <input type="text" name="twitter_id"
                                                                           id="customer_twitter"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_telegram">Telegram </label>
                                                                    <input type="text" name="telegram_id"
                                                                           id="customer_telegram"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_youtube">YouTube </label>
                                                                    <input type="text" name="youtube_id"
                                                                           id="customer_youtube"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_category">Category</label>
                                                                    <select name="category_id" id="customer_category"
                                                                            class="form-control form-control-sm">
                                                                        <option value=""></option>
                                                                        @foreach($categoriss as $key=>$category)
                                                                            <option
                                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_id_type">ID Type</label>
                                                                    <select name="documenttype_id" id="customer_id_type"
                                                                            class="form-control form-control-sm">
                                                                        <option value=""></option>
                                                                        @foreach($documenttypes as $key=>$documenttype)
                                                                            <option
                                                                                value="{{$documenttype->id}}">{{$documenttype->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="customer_ip_address">Ip Address</label>
                                                                    <input type="text" name="ipaddress"
                                                                           id="customer_ip_address"
                                                                           data-inputmask="'alias': 'ip'" data-mask=""
                                                                           im-insert="true"
                                                                           class="form-control form-control-sm">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <button class="btn btn-primary btn-sm float-right ml-3">
                                                                    Search
                                                                </button>
                                                                <button type="reset"
                                                                        class="btn btn-primary btn-sm float-right clear-filter">
                                                                    Clear
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card card-body ">
                                                    <table id="customer_table"
                                                           class="table table-bordered table-hover table-responsive">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Account ID</th>
                                                            <th>Address</th>
                                                            <th>Sex</th>
                                                            <th>Birthday</th>
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

                                                        @forelse($customers as $key=>$customer)
                                                            <tr>
                                                                <td>{{++$key}}</td>
                                                                <td>{{$customer->name}}</td>
                                                                <td>account_{{$customer->id}}</td>
                                                                <td>{{$customer->address}}</td>
                                                                <td>{{$customer->sex}}</td>
                                                                <td>{{$customer->DOB}}</td>
                                                                <td>{{$customer->phone}}</td>
                                                                <td>{{$customer->email}}</td>
                                                                <td>{{$customer->line_id}}</td>
                                                                <td>{{$customer->facebook_id}}</td>
                                                                <td>{{$customer->twitter_id}}</td>
                                                                <td>{{$customer->telegram_id}}</td>
                                                                <td>{{$customer->youtube_id}}</td>
                                                                <td>{{$customer->documenttype->name}}</td>
                                                                <td>
                                                                    {{ implode(', ', $customer->ipaddress->pluck('ipaddress')->toArray() ) }}
                                                                </td>
                                                                <td>{{$customer->category->name}}</td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-success"
                                                                       href="{{ route('users.show', $customer->id) }}">
                                                                        View <i class="fa fa-eye "></i>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-warning"
                                                                       href="{{ route('users.edit', $customer->id) }}">
                                                                        Edit <i class="fa fa-pen "></i>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-danger" href="#">
                                                                        Delete <i class="fa fa-trash "></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_ip_analyse" role="tabpanel"
                                         aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="row">

                                            @forelse($ipaddresses as $ipaddress)
                                                <div class="col-md-2">
                                                    <p class="m-0">
                                                        {{$ipaddress->ipaddress}}
                                                    </p>
                                                    <ul>
                                                        @forelse($ipaddress->user as $user)
                                                            <li>
                                                                <a href="{{route('users.show', $user->id) }}">{{ $user->name }}</a>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>

                                                </div>
                                            @empty
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
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
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/intl-tel-input/js/intlTelInput.min.js')}}"></script>
    <script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

    <script>


        $(function () {

            $('[data-mask]').inputmask()

            function drawdatatable() {
                return $("#customer_table").DataTable({
                    dom: 'Bfrtip',
                    "searching": false,
                    buttons: [
                        {
                            extend: 'csv',
                            footer: false,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                            }
                        },
                        {
                            extend: 'pdf',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            footer: false,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                            }
                        },
                    ]
                });
            }

            var datatable = drawdatatable()

            function drawtable(data) {
                console.log(data);
                if (data.length > 0) {
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
                        txt += "<td>" + (data[i]['DOB'] ? data[i]['DOB'] : '') + "</td>"
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
                                <a class="btn btn-sm btn-success" href="/users/` + data[i]['id'] + `">
                                    View <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-warning" href="/users/` + data[i]['id'] + `">
                                    Edit <i class="fa fa-pen"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="/users/` + data[i]['id'] + `">
                                    Delete <i class="fa fa-trash"></i>
                                </a>
                            </td>`;
                        txt += "</tr>";
                    }

                    $('#customer_table tbody').html(txt);
                    datatable = drawdatatable()
                } else {
                    datatable.clear().draw();
                }
            }

            $('.clear-filter').click(function (e) {
                let form_data = $('#filter_form').serialize();

                $.ajax({
                    type: "POST",
                    url: '{{route('getallcustomers')}}',
                    data: form_data,
                }).done(function (res) {
                    drawtable(res);
                });
            })

            $('#filter_form').submit(function (e) {
                e.preventDefault()
                let form_data = $(this).serialize();

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
