@extends('layouts.master')
@section('content')

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">{{ config('app.name') }}</span>
                <h2>An online reading habitat, anywhere, anytime, as the page turns</h2>
                <p>A social and educational reading habitat where bookworms can plan, co-read, network, chat, talk, collaborate, and share knowledge without borders as the page turns.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="/publisher/register">
                      <i class="fa fa-user"></i> Sign up as a Publisher
                    </a>
                  </div>
                  <div class="icon-button">
                    <a href="#download"><i class="fa fa-mobile-alt"></i> Download our Reader's App</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="item item-2">
              <div class="header-text">
                <span class="category">MyBookHut</span>
                <h2>Set up and personalize your BookHut, and enjoy access to unlimited books</h2>
                <p>Plan and track your reading habits with Knet Planner, ROCK, and Neural Insight to make your reading more productive and enjoyable with every turns.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="/publisher/register">
                      <i class="fa fa-user"></i> Sign up as a Publisher
                    </a>
                  </div>
                  <div class="icon-button">
                    <a href="#download"><i class="fa fa-mobile-alt"></i> Download our Reader's App</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="item item-3">
              <div class="header-text">
                <span class="category">Smart Tools</span>
                <h2>Plan your reading on Knet Planner and track reading habits</h2>
                <p>Set and track your reading productivity and stay engaged with the community of like minds with your communicable data. Create personal reading goals to develop daily regenerative reading habits.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="/publisher/register">
                      <i class="fa fa-user"></i> Sign up as a Publisher
                    </a>
                  </div>
                  <div class="icon-button">
                    <a href="#download"><i class="fa fa-mobile-alt"></i> Download our Reader's App</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="/themes/scholar/images/services/book.png" alt=""/>
            </div>
            <div class="main-content">
              <h4>Co-Reading</h4>
              <p>Engage in collaborative and interactive reading with your Hutmates at your convenience while on the same page.</p>
              <div class="main-button">
                <a href="#">Download the App</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="/themes/scholar/images/services/calendar.png" alt=""/>
            </div>
            <div class="main-content">
              <h4>Knet Planner</h4>
              <p>Schedule personal and knowledge networking reading activities and set reminders.</p>
              <div class="main-button">
                <a href="#">Download the App</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="/themes/scholar/images/services/video-call.png" alt=""/>
            </div>
            <div class="main-content">
              <h4>HutTalks</h4>
              <p>Schedule and engage in Huttalk and Hutchat with your Hutmates and Knetworkers. </p>
              <div class="main-button">
                <a href="#">Download the App</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section about-us">
    <div class="container" id="bookut">
      <div class="row">
        <div class="col-lg-6 offset-lg-1">
          <div class="content accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  What is a BookHut?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  &nbsp;
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How do I co-read together?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  &nbsp;
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Who can use eBookquet?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  &nbsp;
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Do we get the best support?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  &nbsp;
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>About Us</h6>
            <h2>What make eBookquet unique?</h2>
            <p>eBookquet offers different learning environments for reading, coaching, networking, matching interests, knowledge sharing, and tracking the reading progress of readers and stakeholders’ knowledge baselines.</p>
            <div class="main-button">
              <a href="#">Discover More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Stay Connected</h6>
            <h2>Trending BookHuts</h2>
          </div>
        </div>
      </div>
      <ul class="event_filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".design">Folklore</a>
        </li>
        <li>
          <a href="#!" data-filter=".development">Family</a>
        </li>
        <li>
          <a href="#!" data-filter=".wordpress">Politics</a>
        </li>
      </ul>
      <div class="row event_box">
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-01.jpg" alt=""></a>
              <span class="category">100+ Hutmates</span>
            </div>
            <div class="down-content">
              <span class="author">Stella Blair</span>
              <h4>Black & White Rainbow</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6  development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-02.jpg" alt=""></a>
              <span class="category">500+ Hutmates</span>
            </div>
            <div class="down-content">
              <span class="author">Cindy Walker</span>
              <h4>Secret of Family Ties</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design wordpress">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-03.jpg" alt=""></a>
              <span class="category">250+ Hutmates</span>
            </div>
            <div class="down-content">
              <span class="author">David Hutson</span>
              <h4>The American People</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-04.jpg" alt=""></a>
              <span class="category">150+ Hutmates</span>
            </div>
            <div class="down-content">
              <span class="author">Stella Blair</span>
              <h4>Meeting with Billy</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-05.jpg" alt=""></a>
              <span class="category">299+ Hutmates</span>
            </div>
            <div class="down-content">
              <span class="author">Sophia Rose</span>
              <h4>Teens and the Internet</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-06.jpg" alt=""></a>
              <span class="category">200+ Hutmates</span>
            </div>
            <div class="down-content">
              <span class="author">David Hutson</span>
              <h4>Making the right thing wrong</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="counter mb-4 mb-md-0 end">
            <h2 class="timer count-title count-number" data-to="2000" data-speed="1000"></h2>
            <p class="count-text">Books</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="counter mb-4 mb-md-0">
            <h2 class="timer count-title count-number" data-to="100" data-speed="1000"></h2>
              <p class="count-text">Authors</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="counter mb-4 mb-md-0">
            <h2 class="timer count-title count-number" data-to="1000" data-speed="1000"></h2>
            <p class="count-text">Knetworkers</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="counter mb-4 mb-md-0">
            <h2 class="timer count-title count-number" data-to="1250" data-speed="1000"></h2>
            <p class="count-text">BookHuts</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="section team">
    <div class="container">
      <div class="row" style="top: -100px; position: relative;">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Meet the Authors</h6>
            <h2>Our Publishers</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="/themes/scholar/images/member-01.jpg" alt="">
              <span class="category">100+ books</span>
              <h4>Sophia Rose</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="/themes/scholar/images/member-02.jpg" alt="">
              <span class="category">20+ books</span>
              <h4>Cindy Walker</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="/themes/scholar/images/member-03.jpg" alt="">
              <span class="category">75+ books</span>
              <h4>David Hutson</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="/themes/scholar/images/member-04.jpg" alt="">
              <span class="category">99+ books</span>
              <h4>Stella Blair</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  --}}

  <div class="section testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="owl-carousel owl-testimonials">
            <div class="item">
              <p>“Please, tell your friends or colleagues about {{ config('app.name') }}. Anyone can access the community and get free access to books and reading BookHut.”</p>
              <div class="author">
                <img src="/themes/scholar/images/testimonial-author.jpg" alt="">
                <span class="category">Publisher</span>
                <h4>Esther Jannet</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>Testimonials</h6>
            <h2>What people say?</h2>
            <p>Experience reading anywhere and anytime with your folks at your convenience and imagine the feel and smell of reading in a serene woody hut as it once was.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section events">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Schedule</h6>
            <h2>Upcoming Events</h2>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="/themes/scholar/images/books/book2.png" alt=""/>
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Book Launch</span>
                    <h4>The whisper of roses & ashes</h4>
                  </li>
                  <li>
                    <span>Date:</span>
                    <h6>10th July 2024</h6>
                  </li>
                  <li>
                    <span>Duration:</span>
                    <h6>5 Hours</h6>
                  </li>
                  <li>
                    <span>Price:</span>
                    <h6>$120</h6>
                  </li>
                </ul>
                <a href="#"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-6  align-self-center">
          <div class="section-heading">
            <h6>Contact Us</h6>
            <h2>Feel free to contact us anytime</h2>
            <p>Thank you for using eBookquet. We are always happy to assist you if you need help with your account.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-us-content">
            <form id="contact-form" action="#contact/aspn" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="name" id="name" placeholder="Full Name" autocomplete="on" required>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-mail" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" id="message" placeholder="Message ..."></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                    <button type="submit" id="form-submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection