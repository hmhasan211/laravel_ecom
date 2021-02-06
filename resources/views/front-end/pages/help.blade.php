@extends('front-end.master')
@section('title')
    Help
@endsection
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Contact</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- contact -->
    <div class="about">
        <div class="w3_agileits_contact_grids">
            <div class="col-md-6 w3_agileits_contact_grid_left">
                <div class="agile_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.8245873690466!2d91.82510379062717!3d22.360251293015146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd884b695a007%3A0xbbc3af4d3baae5eb!2sMehdibag%20Heights%2C%20O.R.%20Nizam%20Rd%2C%20Chittagong!5e0!3m2!1sen!2sbd!4v1607054617406!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                </div>
                <div class="agileits_w3layouts_map_pos">
                    <div class="agileits_w3layouts_map_pos1">
                        <h3>Contact Info</h3>
                        <p>863 Mehdibag, Chittagong.</p>
                        <ul class="wthree_contact_info_address">
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">hamidhasan@gmail.com</a></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>+(0123) 232 232</li>
                        </ul>
                        <div class="w3_agile_social_icons w3_agile_social_icons_contact">
                            <ul>
                                <li><a href="https://web.facebook.com/diplomatic.hasan/" class="icon icon-cube agile_facebook"></a></li>
                                <li><a href="#" class="icon icon-cube agile_rss"></a></li>
                                <li><a href="#" class="icon icon-cube agile_t"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 w3_agileits_contact_grid_right">
                <h2 class="w3_agile_header">Leave a<span> Message</span></h2>

                <form action="{{route('customer.help.save')}}" method="post">
                    @csrf
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="text" id="input-25" name="name" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-25">
							<span class="input__label-content input__label-content--ichiro">Your Name</span>
						</label>
					</span>
                    <span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="email" id="input-26" name="email" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-26">
							<span class="input__label-content input__label-content--ichiro">Your Email</span>
						</label>
					</span>
                    <textarea name="message" placeholder="Your message here..." required=""></textarea>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- contact -->
@endsection
