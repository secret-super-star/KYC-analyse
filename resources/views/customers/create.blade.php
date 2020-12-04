@extends('layouts.app')
@section('title', 'New Customer')
@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/boostrap-tag-input/css/tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/intl-tel-input/css/intlTelInput.min.css')}}">

    <style>
        .bootstrap-tagsinput .badge {
            margin-right: 5px;
        }

        .addnewip {
            cursor: pointer;
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
                        <h1 class="m-0 text-dark">New Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Customers</a></li>
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

                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Personal Info:
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_name">Name</label>
                                                        <input type="text" name="name" id="customer_name"
                                                               class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_sex">Sex</label>
                                                        <select name="sex" id="customer_sex" class="form-control">
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_DOB">Birthday</label>
                                                        <input type="date" name="DOB" id="customer_DOB"
                                                               class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_phone">Phone</label>
                                                        <br>
                                                        <input type="text" name="phone[full]" id="customer_phone"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_address">Address</label>
                                                        <input type="text" name="address" id="customer_address"
                                                               class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_email">Email</label>
                                                        <input type="email" name="email" id="customer_email"
                                                               class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Social Info:
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_line">Line</label>
                                                        <input type="text" name="line_id" id="customer_line"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_facebook">Facebook</label>
                                                        <input type="text" name="facebook_id" id="customer_facebook"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_twitter">Twitter</label>
                                                        <input type="text" name="twitter_id" id="customer_twitter"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_telegram">Telegram </label>
                                                        <input type="text" name="telegram_id" id="customer_telegram"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_youtube">YouTube </label>
                                                        <input type="text" name="youtube_id" id="customer_youtube"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Other Details:
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="customer_category">Category</label>
                                                <select name="category_id" id="customer_category"
                                                        class="form-control">
                                                    @foreach($categoriss as $key=>$category)
                                                        <option
                                                            value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="customer_tags">Tags</label>
                                                <select class="select2bs4" multiple="multiple"
                                                        data-placeholder="Select a tag"
                                                        style="width: 100%;" id="customer_tags" name="labels[]">
                                                    @foreach($tags as $tag)
                                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-6">
                                            <div class="form-group ipmessages mb-0">
                                                <label for="">Ip Address</label>
                                                <div class="input-group mb-0 ipaddress" hidden>
                                                    <input type="text" name="ipaddress[]"
                                                           class="form-control form-control-sm "
                                                           data-inputmask="'alias': 'ip'" data-mask=""
                                                           im-insert="true">
                                                    <div class="input-group-append remove-item">
                                                        <span class="input-group-text"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="badge badge-primary addnewip">
                                                            Add new +
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Customer Document:
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="customer_id_type">ID Type</label>
                                                <select class="select2bs4" data-placeholder="Select ID Type"
                                                        style="width: 100%;" id="customer_id_type"
                                                        name="documenttype_id">
                                                    @foreach($documenttypes as $key=>$documenttype)
                                                        <option
                                                            value="{{$documenttype->id}}">{{$documenttype->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="customer_documents">Upload Documents</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                               id="customer_documents"
                                                               name="documents[]" multiple required>
                                                        <label class="custom-file-label" for="article-featured-image">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-sm float-right">Save</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('plugins/boostrap-tag-input/js/tagsinput.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/intl-tel-input/js/intlTelInput.min.js')}}"></script>
    <script>
        function updatetags(data) {
            let txt = ""
            $('#customer_tags').html('')
            for (let i = 0; i < data.length; i++) {
                txt += "<option value='" + data[i]['id'] + "'>" + data[i]['name'] + "</option>"
            }
            console.log(txt)
            $('#customer_tags').html(txt);
        }

        $(function () {
            bsCustomFileInput.init();
            var phone_input = document.querySelector("#customer_phone");
            var iti = window.intlTelInput(phone_input, {
                hiddenInput: "full",
                utilsScript: "/plugins/intl-tel-input/js/utils.js?1603274336113"
            });

            iti.setCountry("us");


            $('[data-mask]').inputmask()

            $('.select2bs4').select2({
                theme: 'bootstrap4',
                tags: true,
            })

            $('#customer_category').change(function () {
                let category_id = $(this).val();

                $.ajax({
                    type: "POST",
                    url: '{{route('searchtags')}}',
                    data: {
                        category_id: category_id
                    },
                }).done(function (res) {
                    updatetags(res)
                });
            })

            $('.addnewip').click(function () {
                let clone_object = $('.ipaddress').clone().removeClass('ipaddress').removeAttr('hidden');
                $(clone_object).find('input').val('').inputmask();
                $('.ipmessages').append(clone_object);
            })

            $(document).on('click', '.remove-item', function () {
                let parent = $(this).parent();
                if(!$(parent).hasClass('ipaddress')) {
                    $(parent).remove();
                }
            })

            @if($message = Session::get('success'))
            toastr.success('{{$message}}')
            @endif
        })
    </script>
@endsection
