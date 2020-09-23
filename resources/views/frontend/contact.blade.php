@extends('frontend.layouts.master')


@section('content')

<!--Slider Start-->
<div class="map-load">
    <div id="map"></div>
</div>
<!--Slider End-->


    <section class="contact-sec" id="contact-sec">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 contact-description wow slideInLeft" data-wow-delay=".8s">
                    <div class="contact-detail wow fadeInLeft">
                        <div class="ex-detail">
                            <span class="fly-text">CONTACT US</span>
                            <h4 class="large-heading">
                                <span class="heading-1">Get</span>
                                <span class="heading-2">In Touch</span>
                            </h4>
                        </div>
                        <p class="small-text text-center text-md-left">
                            Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.
                        </p>
                        <div class="row location-details text-center text-md-left">
                            <div class="col-12 col-md-6 country-1">
                                <h4 class="heading-text text-left">United States</h4>
                                <ul>
                                    <li><i class="fas fa-mobile-alt"></i><a href="#">+(34) 609 33 17 54</a></li>
                                    <li><i class="fas fa-envelope"></i><a href="#">email@website.com</a></li>
                                    <li><i class="fas fa-map-marker"></i><a href="#">201 Oak Street 27 Manchester, USA</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 couuntry-1">
                                <h4 class="heading-text text-left">Australia</h4>
                                <ul>
                                    <li><i class="fas fa-mobile-alt"></i><a href="#">+(34) 609 33 17 54</a></li>
                                    <li><i class="fas fa-envelope"></i><a href="#">email@website.com</a></li>
                                    <li><i class="fas fa-map-marker"></i><a href="#">201 Oak Street 27 Manchester, USA</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 contact-box text-center text-md-left wow slideInRight" data-wow-delay=".8s">
                    <div class="c-box wow fadeInRight">
                        <h4 class="small-heading">Leave Message</h4>
<!--                        <p class="small-text">Lorem ipsum is simply dummy text of the printing and typesetting industry. </p>-->
                        <form class="contact-form" id="contact-form-data">
                            <div class="row my-form">
                                <div class="col-md-12 col-sm-12">
                                    <div id="result"></div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" id="candidate_fname" name="firstName" placeholder="First Name" required="required">
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" id="candidate_lname" name="lastName" placeholder="Last Name" required="required">
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="email" class="form-control" id="user_email" name="userEmail" placeholder="Email" required="required">
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" id="user_subject" name="userSubject" placeholder="Subject" required="required">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" id="user_message" name="userMessage" placeholder="Message" rows="7" required="required"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn pink-gradient-btn-into-black user-contact contact_btn" type="button">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
