@extends('layouts.master')
@section('content')

  <div class="hero-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h2>Knet Mart</h2>
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
          <a href="#!" data-filter=".design">Tales</a>
        </li>
        <li>
          <a href="#!" data-filter=".development">Love</a>
        </li>
        <li>
          <a href="#!" data-filter=".wordpress">Horror</a>
        </li>
      </ul>
      <div class="row event_box">
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-01.jpg" alt=""></a>
              <span class="category">100+ readers</span>
            </div>
            <div class="down-content">
              <span class="author">Stella Blair</span>
              <h4>Alice in wonderland</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6  development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-02.jpg" alt=""></a>
              <span class="category">500+ readers</span>
            </div>
            <div class="down-content">
              <span class="author">Cindy Walker</span>
              <h4>The tempest of sali ali</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design wordpress">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-03.jpg" alt=""></a>
              <span class="category">250+ readers</span>
            </div>
            <div class="down-content">
              <span class="author">David Hutson</span>
              <h4>Sweet silence</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-04.jpg" alt=""></a>
              <span class="category">150+ readers</span>
            </div>
            <div class="down-content">
              <span class="author">Stella Blair</span>
              <h4>Roses on Ashes</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-05.jpg" alt=""></a>
              <span class="category">299+ readers</span>
            </div>
            <div class="down-content">
              <span class="author">Sophia Rose</span>
              <h4>Keeping up with the sky</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="/themes/scholar/images/courses/course-06.jpg" alt=""></a>
              <span class="category">200+ readers</span>
            </div>
            <div class="down-content">
              <span class="author">David Hutson</span>
              <h4>The drums of motherland</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection