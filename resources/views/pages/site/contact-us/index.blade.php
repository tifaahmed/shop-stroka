@extends('layout')

@section('title')
<title>contact-us </title>
@endsection

@section('content')  

<div class="site__body">

    <div class="block-map block">
        @include('pages.site.contact-us.map')
    </div>

    <div class="page-header">
        @include('pages.site.contact-us.breadcrumb')
    </div>

    <div class="block">
        <div class="container">
            <div class="card mb-0">
                <div class="card-body contact-us">
                    <div class="contact-us__container">
                        <div class="row">

                            <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                @include('pages.site.contact-us.information')
                            </div>
                            <div class="col-12 col-lg-6">
                                @include('pages.site.contact-us.form')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
