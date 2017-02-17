<div class="form-group">
    {{ Form::label('email', 'email') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Your email']) }}
</div>
<div class="form-group">
    {{ Form::label('password', 'password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('firstName', 'First Name') }}
    {{ Form::text('firstName', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('lastName', 'Last Name') }}
    {{ Form::text('lastName', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('rol','User Role') }}
    {{ Form::select('rol',
                    config('options.rol'),
                    null,
                    ['class' => 'form-control']
                    )
    }}
</div>