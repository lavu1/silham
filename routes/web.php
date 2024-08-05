<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');//welcome
})->name('home');
Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');
Route::get('/blogs', function () {
    return view('pages.blog');
})->name('blog');
Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact');
Route::get('/events', function () {
    return view('pages.events_news');
})->name('events');
Route::get('/faqs', function () {
    return view('pages.faqs');
})->name('faqs');
Route::get('/services', function () {
    return view('pages.home');
})->name('services');

