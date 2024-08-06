@extends('layouts.master')
@section('content')

  <div class="hero-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h2>Contact Us</h2>
        </div>
      </div>
    </div>
  </div>

  <div 
    class="section contact-us" 
    id="shapeless"
  >
    <div class="container">
      <div class="row">
        <div class="col-lg-6  align-self-center">
          <div class="section-heading">
            <h6>Let's Talk</h6>
            <h2>Got a word? We are ready to listen</h2>
            <p class="mb-5">
                <span class="d-block mb-2"><b>Office Address:</b> 9 Twins Obasa Street, Gbagada, 105102 Lagos, Nigeria.</span>
                <span class="d-block mb-2"><b>Helpline:</b> +234 903 1995 380</span>
                <span class="d-block mb-2"><b>E-mail:</b> info@ebookquet.com</span>
            </p>

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

  <div 
    class="section googlemap"
   >
    {{-- <iframe frameborder="0" src="https://www.google.com/maps/embed/v1/streetview?pano=F%3A-gVtvWrACv2k%2FVnh0Vg8Z8YI%2FAAAAAAABLWA%2Fa-AT4Wb8MD8&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&location=-33.8675%2C151.2070"></iframe> --}}

    <iframe src="https://www.google.com/maps/embed?pb=!4v1721119069719!6m8!1m7!1s8Qy89devmQGu0PIW1RFvcw!2m2!1d6.554580570151362!2d3.386092975347479!3f200.1709943652537!4f1.7885978001564808!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

@endsection