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
Route::get('/Outsourced-Data-Protection-Officer', function () {
    return view('pages.services_dpo');
})->name('services.dpo');
Route::get('/Data-Protection-Training', function () {
    return view('pages.services_dpt');
})->name('services.dpt');
Route::get('/Data-Protection-Consultancy', function () {
    return view('pages.services_dpc');
})->name('services.dpc');
Route::get('/Data-Protection-Auditor-Services', function () {
    return view('pages.services_dpas');
})->name('services.dpas');

