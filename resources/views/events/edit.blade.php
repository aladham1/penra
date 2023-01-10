@extends('layouts.app')
@section('title')  {{__('Events')}} @endsection




@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <a href="{{route('events.index')}}">
                    {{__('Events')}}
                </a>
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc" id="kt_subheader_total">
										 {{__('Update Event')}} </span>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <span class="kt-subheader__desc" id="kt_subheader_total">
										 </span>
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
                                <i class="flaticon2-settings"></i> Update
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
                            <input type="hidden" name="id" value="{{$event->id}}">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="event">{{ __('Event')}}</label>
                                                        <input class="form-control" type="text" name="event" id="event" value="{{$event->title}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6 col-xl-6">
                                                    <button type="button" class="btn red-btn btn-bold btn-create">
                                                        {{__('Save')}}
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
        $('.btn-create').on("click", function () {
            $(".loadingMask").css('display', 'inline-block');

            $.ajax({
                method: "post",
                beforeSend: function () {
                    $(".loadingMask").css('display', 'inline-block');
                },
                url: "{{route('events.update')}}",
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
                            title: '{{ __('Updated successfully')}}',
                            confirmButtonText: 'Ok',
                        }).then(function (result) {
                            if (result.value) {
                                window.location = "{{route('events.index')}}"
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
