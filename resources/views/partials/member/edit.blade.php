<div class="container" ng-controller="editMemberCtrl">
    <div class="col-sm-8 col-sm-offset-2">

        <!--
        {!!
            Form::model("[[ mem ]]", array(
                'class'     => 'form',
                'files'     => true,
                'action'    => array(
                    'MemberController@update',
                    2
                ),
                'method'    => 'PATCH'
            ))
        !!}
    -->
        <form method="PATCH" action="api/v1/member/[[ mem.id ]]" enctype="multipart/form-data">

        <div class="form-group">
        {!!
            Form::text('name', "[[ mem.name ]]", array(
                'class'         => 'form-control',
            ))
        !!}
        </div>

        <div class="form-group">
        {!!
            Form::text('address', "[[ mem.address ]]", array(
                'class'         => 'form-control'
            ))
        !!}
        </div>

        <div class="form-group">
        {!!
            Form::text('age', "[[ mem.age ]]", array(
                'class'         => 'form-control'
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

        <img src="/up/[[ mem.photo ]]">

        <div class="form-group">
        {!!
            Form::submit('Save', array(
                'class'     => 'form-control btn btn-primary',
            ))
        !!}
        </div>
    </div>
</div>
