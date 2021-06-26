<div>
    @push('styles')

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/sc-2.0.4/sb-1.1.0/sp-1.3.0/datatables.min.css"/>


@endpush
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{$dataTable->table()}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        @push('scripts')
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/sc-2.0.4/sb-1.1.0/sp-1.3.0/datatables.min.js"></script>
            <script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
            {{$dataTable->scripts()}}

        @endpush

</div>
