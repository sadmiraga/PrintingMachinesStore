@extends('layouts.mainLayout');
@section('content')
<div class="bg-color">
    <div class="contact-page-hero">
        <img src="/images/contact-hero.jpg" alt="hero">
        <h1>Get in touch</h1>
        <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...
        </p>
    </div>
    <div class="contact-box-wraper">
        <div class="contact-box">
            <i class="fa fa-phone" aria-hidden="true" style="font-size: 50px; padding-bottom:24px"></i>
            <span class="contact-box-item-title">Talk to Us</span>
            <span class="contact-box-item-blurb">
                Interested in our machine or you have any problems? Just pick up the phone
                to chat with a
                member of our team.</span>
            <span class="contact-box-item-number">+386 31 790 586</span>
        </div>

        <div class="contact-box">
            <i class="fa fa-comments-o" aria-hidden="true" style="font-size: 50px; padding-bottom:24px"></i>
            <span class="contact-box-item-title">Contact Customer Support</span>
            <span class="contact-box-item-blurb">
                Sometimes you need a little help from your friends. Or a NK support rep. Don’t worry… we’re here for
                you</span>
            <button class="contact-box-item-button">Contact Support</button>
        </div>
    </div>

    <div class="contact-page-header-section">
        <h1>Connect with our office</h1>
    </div>
    <div class="google-map-wraper">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2753.584566976981!2d15.105529215840997!3d46.35778888139304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476567284cdade01%3A0xcb884d5a5ae91c38!2sLjubljanska%20cesta%205a%2C%203320%20Velenje!5e0!3m2!1sen!2ssi!4v1603291171490!5m2!1sen!2ssi"
            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
    </div>

    <div class="container">
        <form id="contact" action="" method="post">
            <h3>Contact Customer Support</h3>
            <h4>Contact us today, and get reply with in 24 hours!</h4>
            <fieldset>
                <input placeholder="Your name" type="text" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Your Email Address" type="email" tabindex="2" required>
            </fieldset>
            <fieldset>
                <input placeholder="Your Phone Number" type="tel" tabindex="3" required>
            </fieldset>
            <fieldset>
                <input placeholder="Your Web Site starts with http://" type="url" tabindex="4" required>
            </fieldset>
            <fieldset>
                <textarea placeholder="Type your Message Here...." tabindex="5" required></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </fieldset>
        </form>


    </div>
</div>

@endsection