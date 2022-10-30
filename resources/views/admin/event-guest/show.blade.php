@extends("layouts.admin")
@section('title', 'Admin Panel')
@section("content")

    @push('header-scripts')
        @once
            <link rel="stylesheet" href="/admin-assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet"
                  href="/admin-assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet"
                  href="/admin-assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
        @endonce
    @endpush


    {{--    <h2 class="content-heading">Event Guest Table</h2>--}}


    <div class="block block-rounded">
        <div class="block-content block-content-full">

            <div class="row">

                <div class="container">
                    <form action="/event-guests" method="get">
                        <div class="input-group row">

                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="query" placeholder="Name or Phone Number">
                            </div>

                            <div class="col-sm-3">
                                <select class="form-select" name="category" id="category">
                                    <option value="">All</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <select class="form-select" name="gender" id="gender">

                                    <option value="">লিঙ্গ</option>
                                    <option>পুরুষ</option>
                                    <option>নারী</option>
                                    <option>অন্যান্য</option>

                                </select>
                            </div>

                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Event Guest <small>Table</small>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImport">
                    Import
                </button>


                <button type="button" class="btn btn-alt-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#modalCreate">
                    <i class="fa fa-plus"></i> New
                </button>
                @include('admin.event-guest.create')
                @include('admin.event-guest.modal')


            </h3>
        </div>

        <div class="block-content block-content-full">

            <div class="row">

                <table
                    class="table table-bordered table-striped table-vcenter {{--js-dataTable-buttons dataTable--}} no-footer"
                    id="{{--DataTables_Table_1--}}">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>

                        <th>Phone/ Email/ Gender</th>
                        <th>Address</th>
                        <th>Qr</th>
                        {{--  <th>Speciality</th>--}}
                        <th>Image</th>
                        <th class="d-none d-sm-table-cell">Status</th>
                        <th class="d-none d-sm-table-cell">Checkin</th>

                        <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i = 1?>
                    @foreach($result as $item)
                        <tr>
                            <td class="text-center">{{$i++}}</td>
                            {{--  <td><a href="/profile/{{$item->qr_code}}" target="_blank">{{$item->name}}</a></td>--}}
                            <td><a href="/success/{{$item->qr_code}}"
                                   target="_blank">{{$item->name}}</a></td>

                            <td>{{$item->phone_number}}
                                <br>
                                {{$item->email}}
                                <br>
                                {{$item->gender}}
                            </td>
                            <td>{{$item->address}}</td>
                            <td>

                                {!! QrCode::generate($item->qr_code); !!}

                                {{--{{$item->qr_code}}--}}
                            </td>
                            {{--  <td>{{$item->guest_category }} </td>--}}
                            <td><img src="{{$item->picture}}" width="50"/></td>
                            <td class="d-none d-sm-table-cell">
                                <small>
                                    Confirm:
                                </small>
                                @if( $item->status==0)
                                    <span class="badge bg-warning">Pending</span>
                                @elseif( $item->status==1)
                                    <span class="badge bg-primary">Accepted</span>
                                @else
                                    <span class="badge bg-danger">Declined</span>
                                @endif

                                <br/>
                                <small>
                                    Mail:
                                </small>
                                @if( $item->mail_sent==0)
                                    <span class="badge bg-warning">No</span>
                                @else
                                    <span class="badge bg-primary">Yes</span>
                                @endif

                                <br>
                                <a href="{{ route('event-guests.show', $item ) }}">Sent Mail</a>
                            </td>

                            <td>
                                @if( $item->checkin_status==0)
                                    <span class="badge bg-warning">No</span>
                                @else
                                    <span class="badge bg-primary">Yes</span>
                                @endif

                            </td>
                            <td class="">

                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                            href="{{ route('event-guests.edit', $item ) }}" data-bs-toggle="modal"
                                            data-bs-target="#modal{{$item->id}}">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>

                                    <form action="{{ route('event-guests.destroy', $item ) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                                data-toggle="tooltip"
                                                title="View Customer"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>

                                    {{-- <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                             onclick="copyToClipBoard('{{Url("/profile")."/".$item->qr_code}}')">
                                         <i class="fa fa-copy"></i>
                                     </button>--}}


                                    {{-- <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                             onclick="copyToClipBoard('{{Url("/profile")."/".$item->id."/".getTextToUrl($item->name)}}')">
                                         <i class="fa fa-copy"></i>
                                     </button>--}}

                                    <a href="/success/{{$item->qr_code}}" target="_blank"
                                       class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
                                        <i class="fa fa-download"></i>
                                    </a>

                                </div>

                                @include('admin.event-guest.edit')

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $result->links("pagination::bootstrap-4") }}
            </div>
        </div>


    </div>





    @push('footer-scripts')
        @once
            <!--Start JS for This Page-->
            <script src="/admin-assets/js/lib/jquery.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
            <script src="/admin-assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
            <script src="/admin-assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
            <script src="/admin-assets/js/pages/be_tables_datatables.min.js"></script>
            <!--End JS for This Page-->

            <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


            <script>

                function copyToClipBoard(qr_code) {
                    navigator.clipboard.writeText(qr_code);
                    // alert("Copied");
                    toastr.info('Copied to Clipboard');
                }


            </script>
        @endonce
    @endpush

@endsection
