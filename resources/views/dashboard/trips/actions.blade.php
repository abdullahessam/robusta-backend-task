<div class="d-inline-flex">
    <a  href="{{route('trips.edit',$id)}}"><div class="btn btn-warning"><i class="fas fa-pencil-alt"></i></div></a>
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger"><i class="fas fa-trash"></i></div></a>
    {!! Form::open(['route'=>['trips.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
</div>
