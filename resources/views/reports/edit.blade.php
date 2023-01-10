@extends('layouts.app')
@section('title') Daily Demands@endsection




@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Daily Demands
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc" id="kt_subheader_total">
										 Update Daily Demands </span>
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
                                <i class="flaticon2-file"></i> Daily Demands
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
                                <i class="flaticon2-file"></i> Step-Down Power Transformers
                            </a>
                        </li>

                    </ul>

                </div>
                <div class="kt-portlet__head-toolbar">

                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="error-alert" style="display:none"></div>
                <form method="post" enctype="multipart/form-data" id="user_form">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="title"
                                                               class="">Time</label>
                                                        <select name="time" id="date" class="form-control">
                                                            @for($i=1;$i<=24;$i++)
                                                                <option value="{{$i != 24 ?$i : 0}}:00">{{$i != 24 ?$i : 0}}:00</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @for($i=1;$i<=10;$i++)
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h5>J{{$i}}
                                                                    @if($i==5 || $i==9)
                                                                        (Mid-area)
                                                                    @elseif($i==8)
                                                                        (Khan Y.)
                                                                    @else
                                                                    (Gaza-area)
                                                                    @endif
                                                                </h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title{{$i}}"
                                                                           class="">MW</label>
                                                                    <input class="form-control" type="text" value="{{$report->j_.$i[
    'mw']}}"
                                                                           name="j_{{$i}}[mw]" id="title{{$i}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title_t{{$i}}"
                                                                           class="">P.F</label>
                                                                    <input class="form-control" type="text"
                                                                           name="j_{{$i}}[pw]" id="title_t{{$i}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_apps_user_edit_tab_2" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                @for($j=1;$j<=4;$j++)
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h5>T{{$j}}</h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title{{$j}}"
                                                                           class="">MW</label>
                                                                    <input class="form-control" type="text"
                                                                           name="t_{{$j}}[mw]" id="title{{$j}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title_t{{$j}}"
                                                                           class="">P.F</label>
                                                                    <input class="form-control" type="text"
                                                                           name="t_{{$j}}[pw]" id="titletitle_t{{$j}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-xl-6">
                            <button type="button" class="btn red-btn btn-bold btn-create">
                                {{ ucwords(__('common.add'))}}
                            </button>
                            <div class="loadingMask">
                                <img src="{{asset('assets/images/loader.gif')}}" alt="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end:: Content -->



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
                        url: "{{route('reports.store')}}",

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
                                    title: '{{ trans('common.added_successfully')}}',
                                    confirmButtonText: '{{ trans('common.ok')}}',
                                }).then(function (result) {
                                    if (result.value) {
                                        window.location = "{{route('reports.index')}}"
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
                                url: "#",
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


@endsection
