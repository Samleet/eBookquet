@extends('layouts.master')
@section('content')

  <div class="hero-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h2>BookHuts</h2>
        </div>
      </div>
    </div>
  </div>

  <section class="section courses m-0">
    <div class="container">
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

@endsection