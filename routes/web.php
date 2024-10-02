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
//carousel
Route::get('/Raising-Awareness-through-Data-Protection-Awareness-Workshops', function () {
    return view('pages.carasel.pageone');
})->name('carasel.one');
Route::get('/Building-Capacity-for-Compliance-Readiness-through-Advanced-Data-Protection-Training', function () {
    return view('pages.carasel.pagetwo');
})->name('carasel.two');
Route::get('/Achieving-Compliance-through-Outsourced-Data-Protection-Services', function () {
    return view('pages.carasel.pagethree');
})->name('carasel.three');
Route::get('/Demonstrating-Compliance-through-Data-Audits', function () {
    return view('pages.carasel.pagefour');
})->name('carasel.four');
Route::get('/Managing-Risk-through-Data-Protection-Impact-Assessments', function () {
    return view('pages.carasel.pagefive');
})->name('carasel.five');
//sectors
Route::get('/Banking-and-Finance', function () {
    return view('pages.sectors.pageone');
})->name('sectors.one');
Route::get('/Pensions-and-Insurance', function () {
    return view('pages.sectors.pagetwo');
})->name('sectors.two');
Route::get('/Medical-and-Healthcare', function () {
    return view('pages.sectors.pagethree');
})->name('sectors.three');
Route::get('/Technology', function () {
    return view('pages.sectors.pagefour');
})->name('sectors.four');
Route::get('/Education', function () {
    return view('pages.sectors.pagefive');
})->name('sectors.five');
Route::get('/Non-Governmental-Organisations', function () {
    return view('pages.sectors.pagesix');
})->name('sectors.six');
//new and events
//Route::get('/news-events', function () {
//    return view('pages.eventsnews.pageone');
//})->name('pageonenewsevents');
//
//Route::get('/news-events', function () {
//    return view('pages.eventsnews.pageone');
//})->name('pageonenewsevents');
//
//Route::get('/news-events', function () {
//    return view('pages.eventsnews.pageone');
//})->name('pageonenewsevents');
//
//Route::get('/news-events', function () {
//    return view('pages.eventsnews.pageone');
//})->name('pageonenewsevents');
// Route for CEO Attends AUDA-NEPAD Data Governance Policy Stakeholder Engagement Workshop
Route::get('/news-events/data-governance-workshop', function () {
    return view('pages.eventsnews.pageone');
})->name('dataGovernanceWorkshop');

// Route for CEO Attends AUDA-NEPAD Training of Trainers Workshop
Route::get('/news-events/trainers-workshop', function () {
    return view('pages.eventsnews.pagetwo');
})->name('trainersWorkshop');

// Route for Press Release
Route::get('/news-events/press-release', function () {
    return view('pages.eventsnews.pagethree');
})->name('pressRelease');

// Route for CEO & Principal Consultant Delivers Data Protection Awareness Training to the Health Sector
Route::get('/news-events/data-protection-training-health-sector', function () {
    return view('pages.eventsnews.pagefour');
})->name('dataProtectionHealthSector');
