@extends('layouts.main.app')

@section('title')
    <title>{{ $service->name_page }}</title>
    <meta property="og:title" content="{{ $service->name_page }}">

    <meta property="og:description" content="Якісні послуги прання та хімчистки в Києві. Звертайтеся до Єнот-24 для чистоти, яку ви заслуговуєте!">
    <meta property="og:url" content="https://enot-24.com.ua/poslugi/{{ $service->transform_url }}">
    
     <meta name="keywords" content="{{ $service->seo_keywords }}">

    <meta name="DC.title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="DC.description" content="{{ $service->seo_description }}">
    <meta name="DC.subject" content="{{ $service->seo_keywords }}">
    
    <meta name="business" content="{{ $service->name_page }}">
    
    <meta name="twitter:title" content="{{ $service->name_page }}">
    <meta name="twitter:description" content="{{ $service->seo_description }}">
    <meta name="twitter:url" content="https://enot-24.com.ua/poslugi/{{ $service->transform_url }}">
    
    <meta name="service" content="{{ $service->seo_keywords }}">
    <meta name="audience" content="{{ $service->seo_keywords }}">
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "{{ $service->name_page }}",
      "image": "{{ asset('storage/src/logo/logo-enot24.png') }}",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Київ",
        "addressCountry": "UA"
      },
      "url": "https://enot-24.com.ua/poslugi/{{ $service->transform_url }}",
      "telephone": "+38 (067) 887-2233",
      "priceRange": "₴₴",
      "description": "{{ $service->seo_description }}",
      "areaServed": "Київ, Україна"
    }
    </script>
@endsection

@section('header')
    @include('includes.header.nav')
    @include('includes.header-page', [
        'content' => $service->name_page,
        'paragraph' => $service->description,
    ])
@endsection

@section('content')
    @include('includes.feedback-page', ['content' => $service])
@endsection
