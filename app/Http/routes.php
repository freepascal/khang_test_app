<?php

Route::get('/', function () {
    return view('welcome');
});

// RESTful
Route::resource('api/v1/member', 'MemberController');

// feature list
Route::get('/partials/member/index', function() {
    return view("partials.member.index");
});

// feature add
Route::get('/partials/member/create', function() {
    return view("partials.member.create");
});

// feature edit
Route::get('/partials/member/edit', function() {
    return view("partials.member.edit");
});
