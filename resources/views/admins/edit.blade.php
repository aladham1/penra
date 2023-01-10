@extends('layouts.app')
@section('title')  {{ucwords(__('common.edit_admin'))}} @endsection




@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <a href="{{route('admins.index')}}">
                    {{ucwords(__('common.admins'))}}
                </a>
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc" id="kt_subheader_total">
										 {{ucwords(__('common.edit_admin'))}} </span>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <span class="kt-subheader__desc" id="kt_subheader_total">
										 {{ucwords($admin->name)}} </span>
            </div>
        </div>

    </div>

    <!-- end:: Content Head -->

    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_1" role="tab">
                                <i class="flaticon2-user"></i> {{ucwords(__('common.personal_information'))}}
                            </a>
                        </li>

                    </ul>

                </div>
                <div class="kt-portlet__head-toolbar">

                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="error-alert" style="display:none"></div>

                <div class="tab-content">
                    <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                        <form method="post" enctype="multipart/form-data" id="user_form">
                            @csrf
                            <input type="hidden" name="id" value="{{$admin->id}}">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ ucwords(__('common.name'))}}</label>
                                                        <input class="form-control" type="text" name="name" id="name" value="{{$admin->name}}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">{{ ucwords(__('common.phone'))}}</label>
                                                        <input class="form-control" type="text" name="phone" id="phone"
                                                               value="{{$admin->phone}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">{{ ucwords(__('common.email'))}}</label>
                                                        <input class="form-control" type="email" name="email"
                                                               value="{{$admin->email}}" id="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password">{{ ucwords(__('common.password'))}}</label>
                                                        <input class="form-control" type="password" name="password"
                                                             id="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="kt-checkbox-list">
                                                            <label class="kt-checkbox">
                                                                <input type="checkbox" name="is_owner" {{$admin->is_owner? 'checked' : ''}}> {{ucwords(__('common.owner'))}}
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6 col-xl-6">
                                                    <button type="button" class="btn red-btn btn-bold btn-create">
                                                        {{ ucwords(__('common.save'))}}
                                                    </button>
                                                    <div class="loadingMask">
                                                        <img src="{{asset('assets/images/loader.gif')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- end:: Content -->



@endsection
@section('js')

    <script>
        $('#kt_select2_1').select2({
            placeholder: "{{ucwords(__('common.select_user'))}}",
        });
        $('#kt_select2_2').select2({
            placeholder: "{{ucwords(__('common.select_place'))}}",
        });
        function totalSalary(){
            var houseAllowance = $('#house_allowance').val();
            var transportationAllowance = $('#transportation_allowance').val();
            var basicSalary = $('#basic_salary').val();
            var otherAllowance = $('#other_allowance').val();
            var govDeduction = $('#gov_deduction').val();
            var otherDeduction = $('#other_deduction').val();
            var total = (parseFloat(houseAllowance) + parseFloat(transportationAllowance) + parseFloat(basicSalary)
                + parseFloat(otherAllowance)) - (parseFloat(govDeduction) + parseFloat(otherDeduction));
            $('#total').val(total);
        }
        $('.btn-create').on("click", function () {
            $(".loadingMask").css('display', 'inline-block');

            $.ajax({
                method: "post",
                beforeSend: function () {
                    $(".loadingMask").css('display', 'inline-block');
                },
                url: "{{route('admins.update')}}",
                data:
                    new FormData($("#user_form")[0])
                ,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                async: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    //  wait.resolve();
                    $(".loadingMask").css('display', 'none');
                    if (data.errors) {
                        $('.error-alert p').remove();
                        $('.error-alert').show();
                        // swal("Errors!", "Please Enter all required field!", "error");
                        jQuery.each(data.errors, function (key, value) {
                            $('.error-alert').append('<p>' + value + '</p>');
                            $('.modal').animate({scrollTop: 0}, 'slow');
                        });
                    } else {
                        $('.error-alert p').remove();
                        $('.error-alert').hide();
                        swal.fire({
                            type: 'success',
                            title: '{{ trans('common.updated_successfully')}}',
                            confirmButtonText: '{{ trans('common.ok')}}',
                        }).then(function (result) {
                            if (result.value) {
                                window.location = "{{route('admins.index')}}"
                            }
                        });
                    }
                },
                error: function () {
                    $(".loadingMask").css('display', 'none');
                    alert("Error!,Please try again");
                }
            });


        });

    </script>

@endsection
