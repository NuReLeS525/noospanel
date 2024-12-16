@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Banner Start ***** -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-profile ">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="assets/images/profile.jpg" alt="" style="border-radius: 23px;">
                                    </div>
                                    <div class="col-lg-4 align-self-center">
                                        <div class="main-info header-text">
                                            <span>Offline</span>
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p>You Haven't Gone Live yet. Go Live By Touching The Button Below.</p>
                                            <div class="main-border-button">
                                                <a href="#">Start Live Stream</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-center">
                                        <ul>
                                            <li>Games Downloaded <span>3</span></li>
                                            <li>Friends Online <span>16</span></li>
                                            <li>Live Streams <span>None</span></li>
                                            <li>Clips <span>29</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->

                    <!-- ***** Gaming Library Start ***** -->
                    <div class="gaming-library profile-library">
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
                                    <li><h4>Hours Played</h4><span>745 H 22 Mins</span></li>
                                    <li><h4>Currently</h4><span>Downloaded</span></li>
                                    <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                                </ul>
                            </div>
                            <div class="item last-item">
                                <ul>
                                    <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                                    <li><h4>CS-GO</h4><span>Sandbox</span></li>
                                    <li><h4>Date Added</h4><span>21/04/2022</span></li>
                                    <li><h4>Hours Played</h4><span>632 H 46 Mins</span></li>
                                    <li><h4>Currently</h4><span>Downloaded</span></li>
                                    <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Gaming Library End ***** -->
                </div>
            </div>
        </div>
    </div>

@endsection