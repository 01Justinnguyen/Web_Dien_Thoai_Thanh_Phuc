@extends('client.master')
@section('content')
<div class="error404-area pt-30 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-wrapper text-center ptb-50 pt-xs-20">
                    <div class="error-text">
                        <h2 style="font-size: 60px; margin-top: 60px" >THANK FOR YOUR PURCHASE</h2>
                        <p style="font-size: 30px; margin-top: 40px" >We hope you will be pleased with our service.</p>
                    </div>
                    <div class="search-error" style="margin-top: 20px">
                        <form id="search-form" action="#">
                            <input type="text" placeholder="Search">
                            <button><i class="zmdi zmdi-search"></i></button>
                        </form>
                    </div>
                    <div class="error-button">
                        <a href="/">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
