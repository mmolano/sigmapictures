<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900,300italic,400italic|Open+Sans:100,200,300,400,500,600,700,800,900,300italic,400italic|Poppins:100,200,300,400,500,600,700,800,900,300italic,400italic|Niconne:100,200,300,400,500,600,700,800,900,300italic,400italic&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://badge.fury.io/js/flag-icon-css.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

    <link rel="stylesheet" href="{{asset('assets/css/ninja-slider.css')}}">


    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/scrolling-nav.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/mdb.css')}}">

    <link rel="stylesheet" href="{{asset('assets/slider/assets/bootstrap-material-design-font/css/material.css')}}">
    <link rel="stylesheet" href="{{asset('assets/slider/assets/et-line-font-plugin/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/slider/assets/tether/tether.min.css')}}">
    <link href="{{asset('assets/css/lightbox.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    @yield('styles')
</head>
<body>
@include('partials.header')

    @yield('content')

@include('partials.footer')
