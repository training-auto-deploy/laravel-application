@extends('user.layout.main')

@section('content')
<div class="home">
        <div class="home_slider_container">
            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">
                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.webp)"></div>
                    <div class="home_slider_content">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="home_slider_title">The Premium System Education</div>
                                    <div class="home_slider_subtitle">Future Of Education Technology In Vietnam</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.webp)"></div>
                    <div class="home_slider_content">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="home_slider_title">The Premium System Education</div>
                                    <div class="home_slider_subtitle">Future Of Education Technology</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 -->
            </div>
        </div>

        <!-- Home Slider Nav -->

        <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>

    <!-- Features -->

   <div class="features">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Welcome To E-Learning</h2>
                        <div class="section_subtitle"><p>Hệ thống giáo dục chất lượng hàng đầu</p></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
                <!-- @csrf -->
                <div class="col-sm-2">
                    <div id="filter">
                        <form method="GET" action="{{ route('home') }}">
                            <div class="list-todo">
                                <h5 class="filter-by">Lọc theo cấp học</h5>
                                <div >
                                    @foreach ($grades as $key => $grade)
                                    <div class="item todo-item">
                                        <div class="form-check form-check-inline">
                                            <input class="inp-cbx todo d-none" name="grades[]" {{ (isset($request['grades'])) && in_array($grade->id, $request['grades']) ? 'checked' : '' }} id="grades{{ $key }}" value="{{ $grade->id }}" type="checkbox"/>
                                            <label class="cbx" for="grades{{ $key }}">
                                                <span>
                                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                                <span>{{ $grade->name }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="list-todo">
                                <h5 class="filter-by">Lọc theo môn học</h5>
                                <div >
                                     @foreach ($subjects as $key => $subject)
                                    <div class="item todo-item">
                                        <div class="form-check form-check-inline">
                                            <input class="inp-cbx todo d-none" name="subjects[]" {{ (isset($request['subjects'])) && in_array($subject->id, $request['subjects']) ? 'checked' : '' }} id="subjects_{{ $key }}" value="{{ $subject->id }}" type="checkbox"/>
                                            <label class="cbx" for="subjects_{{ $key }}">
                                                <span>
                                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                                <span>{{ $subject->name }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" style="margin-left: 15px" class="home_search_button">Filter</button>
                        </form>
                    </div>
                </div>
            <div class="col-sm-7">
                <div class="team">
                    <!-- <div class="team_background parallax-window" data-parallax="scroll" data-image-src="images/team_background.jpg" data-speed="0.8"></div> -->
                    <div class="container">
                      <!--   <div class="row">
                            <div class="col">
                                <div class="section_title_container text-center">
                                    <h2 class="section_title">Top giáo viên môn Toán</h2>
                                    <div class="section_subtitle"><p>Những giáo viên tốt nhất được đánh giá bởi chúng tôi</p></div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row team_row">
                            @foreach($teachers as $key => $teacher)
                            <div class="col-lg-4 col-md-6 team_col">
                                <div class="team_item">
                                    <div class="team_image"><img src="{{ asset('images/' . $teacher->user->avatar) }}" alt=""></div>
                                    <div class="team_body">
                                        <div class="team_title">
                                        <a href="{{ route('profile', $teacher->user->id) }}">{{ $teacher->user->name }}</a>
                                        </div>
                                        <div class="team_subtitle">{{ $teacher->score }}/10</div>
                                        <div class="social_list">
                                            <div class="star-list">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <span>(15)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty(Auth::User()) and Auth::User()->role == "teacher")
            <div class="col-sm-3">
                <!-- detail -->
                <div id="detail-user">
                    <div id="notification">
                        <h5 class="text-center">Lớp học của bạn sẽ diễn ra trong 15:00</h5>
                    </div>
                    <div id="profile">
                        <!-- proflie user -->
                        <div class="user-info">
                            <div class="avatar">
                                <img src="{{ asset(config('asset.avatar')) }}" alt="">
                            </div>
                            <h3 class="user-name">Nguyễn Danh Lợi</h5>
                            <div class="user-star">
                                <div class="score">
                                    <span>8.8</span>
                                </div>
                                <div class="star-list">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span>(15)</span>
                            </div>
                            <div class="user-detail">
                                <p>0984.282.942</p>
                                <p>Địa chỉ: Mỹ Đình, Từ Liêm, Hà Nội</p>
                                <p>Email: danhloimta@gmail.com</p>
                                <p>Birthday: 18/06/1996</p>
                                <p>Giới tính: Nam</p>
                                <p>Kinh nghiệm: 4 năm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Newsletter -->
    <div class="newsletter">
        <div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">
                        <!-- Newsletter Content -->
                        <div class="newsletter_content text-lg-left text-center">
                            <div class="newsletter_title">sign up for news and offers</div>
                            <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
                        </div>
                        <!-- Newsletter Form -->
                        <div class="newsletter_form_container ml-lg-auto">
                            <form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                                <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
                                <button type="submit" class="newsletter_button">subscribe</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
