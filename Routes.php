<?php
Route::set('login', function() {
    (new User)->CreateView('login');
});

Route::set('register', function() {
    (new User)->CreateView('register');
});

Route::set('index.php', function() {
    (new Post)->CreateView('index');
});

Route::set('logout', function() {
    (new User)->CreateView('logout');
});

Route::set('addpost', function() {
    (new Post)->CreateView('addPost');
});

Route::set('editpost', function() {
    (new Post)->CreateView('editPost');
});

Route::set('delpost', function() {
    (new Post)->CreateView('delPost');
});