{{--Оказывается что этот файл index.blade.php и есть тот, что открывается
при переходе на /--}}

@extends('layouts.base')
{{--@extends('layouts.app')--}}
{{--здесь я импортирую layouts.app или layouts.base и он вмонтируется в файл index.blade.php--}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Banner Start ***** -->
                    <div class="main-banner">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h6>Welcome To Cyborg</h6>
                                    <h4><em>Browse</em> Our Popular Games Here</h4>
                                    <div class="main-button">
                                        <a href="browse.html">Browse Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->

                    <!-- ***** Most Popular Start ***** -->
                    <div class="most-popular">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section">
                                    <h4><em>Most Popular</em> Right Now</h4>
                                </div>
                                @foreach ($currencies as $pair)
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <h4>{{ $pair->from_currency }}<br><span>{{ $pair->to_currency }}</span></h4>
                                            <ul>
                                                <li><i class="fa fa-star"></i>{{ $pair->price }}</li>
                                                <li><i class="fa fa-download"></i>{{ $pair->updated_at }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div style="max-height: 15px;">
                                    {{ $currencies->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Most Popular End ***** -->

                    <!-- ***** Gaming Library Start ***** -->
                    <div class="gaming-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Your Gaming</em> Library</h4>
                            </div>
                            <div class="item">
                                <ul>
                                    <li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
                                    <li><h4>Dota 2</h4><span>Sandbox</span></li>
                                    <li><h4>Date Added</h4><span>24/08/2036</span></li>
                                    <li><h4>Hours Played</h4><span>634 H 22 Mins</span></li>
                                    <li><h4>Currently</h4><span>Downloaded</span></li>
                                    <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul>
                                    <li><img src="assets/images/game-02.jpg" alt="" class="templatemo-item"></li>
                                    <li><h4>Fortnite</h4><span>Sandbox</span></li>
                                    <li><h4>Date Added</h4><span>22/06/2036</span></li>
                                    <li><h4>Hours Played</h4><span>740 H 52 Mins</span></li>
                                    <li><h4>Currently</h4><span>Downloaded</span></li>
                                    <li><div class="main-border-button"><a href="#">Donwload</a></div></li>
                                </ul>
                            </div>
                            <div class="item last-item">
                                <ul>
                                    <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                                    <li><h4>CS-GO</h4><span>Sandbox</span></li>
                                    <li><h4>Date Added</h4><span>21/04/2036</span></li>
                                    <li><h4>Hours Played</h4><span>892 H 14 Mins</span></li>
                                    <li><h4>Currently</h4><span>Downloaded</span></li>
                                    <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="{{ route('app.profile') }}">View Your Library</a>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Gaming Library End ***** -->
                </div>
            </div>
        </div>
    </div>

@endsection
