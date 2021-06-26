<div class="form-group">
    <label for="bus">bus</label>
    {!! Form::select('bus_id',$buses,null,['class'=>'form-control','id'=>'bus','placeholder'=>'chose bus name']) !!}
</div>
<div class="form-group">
    <label for="line">line name</label>
    {!! Form::select('line_id',$lines,null,['class'=>'form-control','id'=>'line','placeholder'=>'chose line name']) !!}
</div>

<div class="form-group">
    <label>date</label>
    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
        {!! Form::text('date',null,['class'=>'form-control datetimepicker-input','data-target'=>'#reservationdatetime']) !!}
        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    @endpush
@push('scripts')
    <script src="{{asset('dashboard/plugins/moment/moment.min.js')}}"></script>

    <script src="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        $('#reservationdatetime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            icons: { time: 'far fa-clock' }
        });

    </script>
    @endpush
