<div class="d-inline-flex">
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger"><i class="fas fa-trash"></i></div></a>
    {!! Form::open(['route'=>['reservations.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
</div>
