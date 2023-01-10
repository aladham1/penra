@extends('layouts.app')
@section('title') {{ucwords(__('common.admins'))}} @endsection

@section('css')
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                {{ucwords(__('common.admins'))}}</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->


    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-user red"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        {{ucwords(__('common.admins'))}}
                    </h3>
                </div>

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            &nbsp;
                            <a href="javascript:;" class="btn btn-elevate btn-icon-sm red-btn"
                               data-toggle="modal" data-target="#kt_modal_1">
                                <i class="la la-plus"></i>
                                {{ucwords(__('common.new_admin'))}}
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body table-responsive">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable table_1" id="">
                    <thead>
                    <tr>
                        <th class="text-center"> {{ ucwords(trans('common.name'))}}</th>
                        <th class="text-center"> {{ ucwords(trans('common.phone'))}}</th>
                        <th class="text-center"> {{ ucwords(trans('common.email'))}}</th>
                        <th class="text-center"> {{ ucwords(trans('common.type'))}}</th>
                        <th class="text-center"> {{ ucwords(trans('common.action'))}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr class="text-center">
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->phone}}</td>
                            <td>{{$admin->email}}</td>
                            <td class="text-center">
                                {{$admin->is_owner ? ucwords(__('common.owner')) : ucwords(__('common.admin'))}}
                            </td>

                            <td class="action-ic">
                                <a title="Edit" href="{{route('admins.edit',$admin->id)}}"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                                <a title="Delete" href="javascript:;"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md delete">
                                    <i class="la la-remove red"></i>
                                    <input type="hidden" value="{{$admin->id}}" class="id">
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>

    </div>
    <!-- end:: Content -->

    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ucwords(trans('common.new_admin'))}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error-alert" style="display:none"></div>
                    <form role="form" id="user_form" method="post" class="add_admin">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">{{ucwords(trans('common.name'))}}:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ ucwords(trans('common.phone'))}}:</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ ucwords(trans('common.email'))}}:</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">{{ ucwords(trans('common.password'))}}</label>
                            <input type="password" name="password" id="password" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <div class="kt-checkbox-list">
                                <label class="kt-checkbox">
                                    <input type="checkbox" name="is_owner"> {{ucwords(__('common.owner'))}}
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red-btn btn-create">{{ ucwords(trans('common.add'))}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ ucwords(trans('common.back'))}}</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            var create_user = function () {
                $('.btn-create').on("click", function () {
                    $(".loadingMask").css('display', 'inline-block');

                    $.ajax({
                        method: "post",
                        beforeSend: function () {
                            $(".loadingMask").css('display', 'inline-block');
                        },
                        url: "{{route('admins.store')}}",

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
                                    $("body, html").animate({scrollTop: 0}, 600);

                                });
                            } else {
                                $('.error-alert p').remove();
                                $('.error-alert').hide();
                                swal.fire({
                                    type: 'success',
                                    title: '{{ trans('common.added_successfully')}}',
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
            };


            var delete_item = function () {
                $('.delete').on("click", function () {
                    var this_item = $(this);
                    var id = $(this).parent().find('.id').val();
                    Swal.fire({
                        title: '{{ trans('common.are_you_sure')}}',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '{{ trans('common.yes')}}',
                        cancelButtonText: '{{ trans('common.no')}}',
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                method: "post",
                                url: "{{route('admins.destroy')}}",
                                headers: {
                                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                                },
                                data: {
                                    id: id,
                                },
                                async: true,
                                success: function (data) {
                                    //  wait.resolve();
                                    $(".loadingMask").css('display', 'none');
                                    if (data.errors) {

                                        // swal("Errors!", "Please Enter all required field!", "error");
                                        jQuery.each(data.errors, function (key, value) {
                                            $('.alert-danger').show();
                                            $('.alert-danger').append('<p>' + value + '</p>');
                                            $("body, html").animate({scrollTop: 0}, 600);
                                            setTimeout(function () {
                                                $('.alert p').remove();
                                                $('.alert').hide();
                                            }, 5000)
                                        });
                                    } else {
                                        this_item.parent().parent().remove();
                                        Swal.fire({
                                            type: 'success',
                                            title: '{{ trans('common.deleted_successfully')}}',
                                            confirmButtonText: '{{ trans('common.ok')}}',
                                        })
                                    }
                                },
                                error: function () {
                                    alert("Error!,Please try again");
                                }
                            });

                        }
                    })


                });
            };

            delete_item();
            create_user();


        });


    </script>
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/datatables/basic/basic.js')}}" type="text/javascript"></script>
@endsection

