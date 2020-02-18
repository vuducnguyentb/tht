@extends('themes.tht.en.layouts.main')
@section('content')
    @include('themes.tht.en.home.sections.slides')
    <section id="page-item" class="pt-30">
        <div class="container-fluid">
            <div class="row mt-0">
                @include('themes.tht.en.home.articles.companies')
                @include('themes.tht.en.home.articles.products')
                @include('themes.tht.en.home.articles.services')
                @include('themes.tht.en.home.articles.projects')
            </div>
        </div>
    </section>

    @include('themes.tht.en.home.sections.partners')
    @include('themes.tht.en.home.sections.contact')
@endsection
