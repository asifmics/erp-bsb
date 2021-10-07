@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .datepicker {
            z-index: 99999 !important;
        }
        p{
            font-size: 14px !important;
            padding: 10px;
        }
    </style>
@endpush
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Working Day Sheet</h3>
		</div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @if ( request('first_date'))
                        <a href="{{route('report_workingDay')}}" class="btn btn-info btn-elevate btn-icon-sm"><i class="fa fa-angle-left"></i>Back</a>
                        <a href="{{route('report_workingDay_pdf',request('first_date'))}}" class="btn btn-youtube btn-elevate btn-icon-sm"><i class="fa fa-file-pdf"></i>PDF</a>
                    @endif
                </div>
            </div>
        </div>

    </div>
    @php
        $requestDate = '';
            $aDates = array();
            if (request('first_date'))   {
                $requestDate =  \Carbon\Carbon::createFromFormat('m-Y', request('first_date'))->format("Y-m") ;
            }
            $oStart = new DateTime("$requestDate");
     $oEnd = clone $oStart;
     $oEnd->add(new DateInterval("P1M"));

     while ($oStart->getTimestamp() < $oEnd->getTimestamp()) {
         $aDates[] = $oStart->format('jS F ,y');
         $oStart->add(new DateInterval("P1D"));
     }
    @endphp

	<div class="kt-portlet__body {{ (request('first_date')) ? 'd-none' : '' }}">

        <form action="{{ route('report_workingDay') }}" method="GET">
            @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="col-form-label text-right">First Date</label>
                    <div class="">
                        <div class="input-group date">
                            <input type="text" name="first_date" class="form-control" readonly="readonly" value="" id="kt_datepicker_3">
                            <div class="input-group-append"><span class="input-group-text">
                            <i class="la la-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-1"></div>
            <div class="col-md-2 float-right">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" style="Width:100%; margin-top: 38px">
                    Submit
                  </button>
                </div>
            </div>

        </div>
    </form>
    <br>


	</div>
    <div class="kt-portlet__body {{ (request('first_date')) ? 'd-block' : ' d-none' }}">
        <div style="width: 90%; margin: 50px auto;">
            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td colspan="5" height="40" style="text-align: center">
                        <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
                    </td>
                </tr>
            </table>

            <table width="100%" cellpadding="2" cellspacing="0" border="1" align="center">
                <tr>
                    <td colspan="5" height="70" style="text-align: center">
                        <h4 style="margin: 0; color: #000; font-size: 20px; font-family: sans-serif; text-transform: capitalize;">Month Working Days Information for the Month of {{ (request('first_date')) ? $date = \Carbon\Carbon::createFromFormat('m-Y', request('first_date'))->format("F'Y") : '' }}</h4>
                    </td>
                </tr>
                <tr>
                    <td height="30" style="text-align: center" colspan="1" width="10%">
                        <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Date</p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="26%">
                        <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Day</p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="18%">
                        <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Day Details</p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="18%">
                        <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Days Information</p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="18%">
                        <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;"> Remarks </p>
                    </td>
                </tr>
                @php
                $i = 0;
                $holidayCount = 0
                @endphp
                @foreach( $aDates as $day)
                <tr>
                    <td height="30" style="text-align: center" colspan="1" width="10%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $day }}</p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="26%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") }}</p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="18%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">

                            @php
                            $dayf = \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format('Y-m-d');
                            $holiday = \App\Holiday::where('date',$dayf)->first();
                            if (($holiday)){
                            echo $holiday->reason ??  '' ;
                            }else{
                            echo \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? 'Off Day' : 'Normal Working Day';
                            }

                            @endphp
                             </p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="18%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                            @php
                                $dayf = \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format('Y-m-d');
                                $holiday = \App\Holiday::where('date',$dayf)->first();
                                if (($holiday)){
                                echo $holiday->reason ??  '' ;
                                }else{
                                echo \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? 'Off Day' : 'Normal Working Day';
                                }

                            @endphp
                        </p>
                    </td>
                    <td height="30" style="text-align: center" colspan="1" width="18%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                            @php
                                $dayf = \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format('Y-m-d');
                                $holiday = \App\Holiday::where('date',$dayf)->first();
                                if (($holiday)){
                                echo 0 ??  '' ;
                                $holidayCount += 1;
                                }else{
                                echo \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? '0' : 1;
                                }

                            @endphp
                        </p>
                    </td>
                    @php
                        $i +=  \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? '0' : 1

                    @endphp
                </tr>
                @endforeach
                <tr>
                    <td height="30" style="text-align: center" colspan="1" width="18%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">

                        </p>
                    </td>
                    <td height="30" style="text-align: center" colspan="3" width="100%">
                        <h5 style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">Total Working days for the month of {{ (request('first_date')) ? $date = \Carbon\Carbon::createFromFormat('m-Y', request('first_date'))->format("F'Y") : ''  }}</h5>
                    </td>
                    <td height="30" style="text-align: center"  width="100%">
                        <h5 style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">{{ $i - $holidayCount }}</h5>
                    </td>
                </tr>
                <tr>
                    <td height="30" style="text-align: left" colspan="5" width="100%">
                        <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Special Note -</p>
                    </td>
                </tr>

            </table>
        </div>
    </div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>



@endsection


@push('js')
    <script type="text/javascript">
        $("#kt_datepicker_3").datepicker( {
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });
    </script>
@endpush
