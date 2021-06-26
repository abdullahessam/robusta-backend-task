<div class="d-inline-flex">
    <a  href="{{route('lines.edit',$id)}}"><div class="btn btn-warning"><i class="fas fa-pencil-alt"></i></div></a>
    <a  href="{{route('lines.show',$id)}}"><div class="btn btn-default"><i class="fas fa-route"></i></div></a>
    <a onclick=" $('#delete-form-{{$id}}').submit();" ><div class="btn btn-danger"><i class="fas fa-trash"></i></div></a>
    {!! Form::open(['route'=>['lines.destroy',$id],'method'=>'DELETE','id'=>'delete-form-'.$id]) !!}
    {!! Form::close() !!}
</div>
