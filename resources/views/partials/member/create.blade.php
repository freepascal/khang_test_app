<!-- Mix Laravel Form Helper with Bootstrap -->
<div class="container" ng-controller="addMemberCtrl">
    {!!
        Form::open(array(
            'class'             => 'form col-sm-8 col-sm-offset-2',
            'files'             => true,
            'action'            => array('MemberController@store',)
        ))
    !!}

    <div class="form-group">
        {!!
            Form::text('name', '', array(
                'class'         => 'form-control',
                'ng-model'      => 'name',
                'placeholder'   => 'Your Name'
            ))
        !!}
    </div>

    <div class="from-group">
        {!!
            Form::text('address', '', array(
                'class'         => 'form-control',
                'ng-model'      => 'address',
                'placeholder'   => 'Your Address'
            ))
        !!}
    </div>

    <div class="form-group">
        {!!
            Form::text('age', '', array(
                'class'         => 'form-control',
                'ng-model'      => 'age',
                'placeholder'   => 'Your Age'
            ))
        !!}
    </div>

    <div class="form-group">
        {!!
            Form::file('photo', null, array(
                'class'         => 'form-control'
            ))
        !!}
    </div>

    <div class="form-group">
        {!!
            Form::submit('Create member', array(
                'class'         => 'form-control btn btn-primary'
            ))
        !!}
    </div>
    {!! Form::close() !!}
</div>
