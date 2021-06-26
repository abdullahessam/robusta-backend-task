<div class="form-group">
    <label for="name">name</label>
    {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'name']) !!}
</div>
<div class="form-group">
    <label for="email">email</label>
    {!! Form::email('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'email']) !!}
</div>
<div class="form-group">
    <label for="password">password</label>
    {!! Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'password']) !!}
</div>
<div class="form-group">
    <label for="password_confirmation">password confirmation</label>
    {!! Form::password('password_confirmation',['class'=>'form-control','id'=>'password_confirmation','placeholder'=>'password confirmation']) !!}
</div>
