@extends('layouts.app')
@section('title') Daily Demands @endsection


@section('content')

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Daily Demands</h3>
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
											<i class="kt-font-brand flaticon2-map red"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        Daily Demands
                    </h3>
                    <div class="form-group mt-4">
                        <form action="{{route('reports.index')}}" class="form-date">
                            <input type="text" class="form-control" id="kt_datepicker_1"
                                   name="date"
                                   value="{{request()->date ?? Carbon\Carbon::now()->format('Y-m-d')}}">
                        </form>
                    </div>
                </div>

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <form action="{{route('reports.index')}}" class="d-inline">
                                <input type="hidden" name="export">
                                <button class="btn btn-elevate btn-icon-sm red-btn">
                                	<span class="kt-portlet__head-icon">
											<i class="flaticon-download "></i>
										</span>
                                    {{ ucwords(__('common.export_to_excel')) }}
                                </button>
                            </form>
                            <form action="" class="d-inline">
                                <input type="hidden" name="export">
                                <button class="btn btn-elevate btn-icon-sm red-btn">
                                	<span class="kt-portlet__head-icon">
											<i class="flaticon-upload"></i>
										</span>
                                    {{ __('Import') }}
                                </button>
                            </form>
                            <a href="{{route('reports.create')}}" class="btn btn-elevate btn-icon-sm red-btn">
                                	<span class="kt-portlet__head-icon">
											<i class="flaticon-add"></i>
										</span>
                                {{ __('Add Daily Demands') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body table-responsive">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="">
                    <thead>
                    <tr class="text-center" style="background-color: #bab4f6">
                        <th colspan="2" rowspan="2" style="vertical-align: inherit;">Time</th>
                        @for($i=1;$i<=10;$i++)
                            <th colspan="2">J{{$i}}
                                @if($i==5 || $i==9)
                                    (Mid-area)
                                @elseif($i==8)
                                    (Khan Y.)
                                @else
                                (Gaza-area)
                                @endif
                            </th>
                        @endfor
                        @for($j=1;$j<=4;$j++)
                            <th colspan="2">T{{$j}}</th>
                        @endfor
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    <tr class="text-center" style="background-color: #fffcc2">
                        @for($i=1;$i<=14;$i++)
                            <td>MW</td>
                            <td>PF</td>
                        @endfor
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr class="text-center">
                            <td colspan="2" class="font-weight-bold">{{\Carbon\Carbon::parse($report->date)->format('H:i')}}</td>
                            <td style="color: {{$report->j_1['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_1['mw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_1['mw'], 2) }}</td>
                            <td style="color: {{$report->j_1['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_1['pw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_1['pw'],2) }}</td>
                            <td style="color: {{$report->j_2['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_2['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_2['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_2['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_2['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_2['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_3['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_3['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_3['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_3['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_3['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_3['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_4['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_4['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_4['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_4['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_4['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_4['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_5['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_5['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_5['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_5['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_5['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_5['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_6['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_6['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_6['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_6['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_6['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_6['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_7['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_7['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_7['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_7['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_7['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_7['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_8['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_8['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_8['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_8['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_8['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_8['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_9['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_9['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_9['mw'] ,2) }}</td>
                            <td style="color: {{$report->j_9['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_9['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_9['pw'] ,2) }}</td>
                            <td style="color: {{$report->j_10['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_10['mw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_10['mw'],2)  }}</td>
                            <td style="color: {{$report->j_10['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_10['pw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_10['pw'],2)  }}</td>
                            <td style="color: {{$report->t_1['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_1['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_1['mw'] ,2) }}</td>
                            <td style="color: {{$report->t_1['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_1['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_1['pw'] ,2) }}</td>
                            <td style="color: {{$report->t_2['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_2['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_2['mw'] ,2) }}</td>
                            <td style="color: {{$report->t_2['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_2['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_2['pw'] ,2) }}</td>
                            <td style="color: {{$report->t_3['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_3['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_3['mw'] ,2) }}</td>
                            <td style="color: {{$report->t_3['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_3['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_3['pw'] ,2) }}</td>
                            <td style="color: {{$report->t_4['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_4['mw'] < 0 ? '#e7abab' : ''}}">{{number_format( $report->t_4['mw'],2)  }}</td>
                            <td style="color: {{$report->t_4['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_4['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_4['pw'] ,2) }}</td>
                            <td>{{$report->created_at->format('Y-m-d H:i:s')}}</td>
                            <td class="action-ic">
{{--                                <a title="Edit" href="{{route('reports.edit',$report->id)}}"--}}
{{--                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">--}}
{{--                                    <i class="la la-edit"></i>--}}
{{--                                </a>--}}
                                <a title="Delete" href="javascript:;"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md delete">
                                    <i class="la la-remove red"></i>
                                    <input type="hidden" value="{{$report->id}}" class="id">
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
@endsection
@section('js')

    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>
    <script>
        $(document).ready(function () {
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
                                url: "{{route('reports.destroy')}}",
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
        });
        $("#kt_datepicker_1").on("change", function() {
            $('.form-date').submit();
        });
    </script>
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/datatables/basic/basic.js')}}" type="text/javascript"></script>
@endsection
