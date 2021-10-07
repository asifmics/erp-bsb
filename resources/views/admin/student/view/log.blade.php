                                <!--begin:: Widgets/Trends-->
                                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder">
                                        <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Log History
                                        </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr class="bg-dark text-light">
                                                            <td>SN</td>
                                                            <td>Type</td>
                                                            <td>Details</td>
                                                        </tr>
                                                        @php
                                                            $i =1;
                                                        @endphp
                                                        @foreach ($student->logs as $item)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $item->type }}</td>
                                                            <td>{{ $item->details }}</td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end:: Widgets/Trends-->
