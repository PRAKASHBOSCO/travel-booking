@extends('Frontend::layouts.master')

@section('title', __('Become A Partner'))
@section('class_body', 'page become-partner')

@php
enqueue_styles([
'slick',
'daterangepicker'
]);
enqueue_scripts([
'slick',
'moment',
'daterangepicker'
]);
@endphp

@section('content')
@php
the_breadcrumb([], 'page', [
'title' => __('Become A Partner')
]);
@endphp
<section class="partner-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 partner-form__left">
                <div class="become-form">
                    <h2 class="title">{{__('Become A Partner')}}</h2>
                    <form class="gmz-form-action" action="{{url('become-a-partner')}}" method="POST">
                        @include('Frontend::components.loader')
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="first-name">COMPANY NAME<span class="required">*</span> </label>
                                <input type="text" name="first_name" class="form-control gmz-validation" data-validation="required" id="first-name" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="last-name">{{__('CONTACT PERSON')}}</label>
                                <input type="text" name="last_name" class="form-control" id="last-name" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="phone">{{__('CONTACT NO')}}<span class="required">*</span> </label>
                                <input type="no" name="phone" class="form-control gmz-validation" data-validation="required" id="phone" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">{{__('EMAIL')}}<span class="required">*</span> </label>
                                <input type="text" name="email" class="form-control gmz-validation" data-validation="required" id="email" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">{{__('ADDRESS PROOF UPLOAD')}}<span class="required">*</span> </label>
                                <input type="file" name="id_proof" class="form-control gmz-validation" data-validation="required" id="email" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">{{__('UPLOAD LOGO')}}<span class="required">*</span> </label>
                                <input type="file" name="id_proof" class="form-control gmz-validation" data-validation="required" id="email" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="phone">{{__('GST NO')}}<span class="required">*</span> </label>
                                <input type="no" name="gst" class="form-control gmz-validation" data-validation="required" id="gst" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="phone">{{__('PAN NO')}}<span class="required">*</span> </label>
                                <input type="no" name="pan" class="form-control gmz-validation" data-validation="required" id="pan" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="first-name">WEBSITE URL<span class="required">*</span> </label>
                                <input type="text" name="website_url" class="form-control gmz-validation" data-validation="required" id="website_url" />
                            </div>

                            <div class="form-group  col-lg-6">
                                <label for="address">{{__('ADDRESS')}}<span class="required">*</span> </label>
                                <textarea name="address" rows="2" class="form-control " id="address"></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="pin_code">PIN CODE<span class="required">*</span> </label>
                                <input type="number" name="pin_code" class="form-control gmz-validation" data-validation="required" id="pin_code" />
                            </div>

                            <div class="form-group  col-lg-6">
                                <label for="password">{{__('PASSWORD')}}<span class="required">*</span> </label>
                                <input type="password" name="password" class="form-control gmz-validation" data-validation="required" id="password" />
                            </div>

                        </div>



                        <div class="form-group">
                            
                            <div class="g-recaptcha" data-sitekey="6LdskVIdAAAAAKLQJmrret41qO5zUZ5Q8ytfo5V1">
                                @if($errors->has('g-recaptcha-response'))

                                <span class="invalid-feedback" style="display:block"  data-validation="required"></span>

                                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                @endif
                            </div>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="agree" value="1">
                                {!! sprintf(__('I accept %s'), '<a href="'. get_term_link() .'" class="link">'. __('Terms and Conditions') .'</a>') !!}
                            </label>

                        </div>
                        <div class="gmz-message"></div>
                        <button type="submit" class="btn btn-primary">{{__('SUBMIT REQUEST')}}</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 partner-form__right">
                <div class="become-intro">
                    <h3>{{__('Why partner on iBooking?')}}</h3>
                    <p>{{__('Join our community and start uploading your properties. We make it simple and secure to host travelers.')}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="icon-box">
    <div class="container">
        <h2 class="title">{{__('How does it work?')}}</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="item">
                    <div class="number">1</div>
                    <h4 class="main-text">{{__('Set up your property')}}</h4>
                    <p class="sub-text">{{__('Explain what’s unique, show off with photos, and set the right price')}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item">
                    <div class="number">2</div>
                    <h4 class="main-text">{{__('Get the perfect match')}}</h4>
                    <p class="sub-text">{{__('We’ll connect you with travelers from home and abroad')}}</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="item">
                    <div class="number">3</div>
                    <h4 class="main-text">{{__('Start earning')}}</h4>
                    <p class="sub-text">{{__('We’ll help you collect payment, deduct a commission, and send you the balance')}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why-be-partner">
    <div class="container">
        <h2 class="title">{{__('Why be a Partner?')}}</h2>
        <div class="item">
            <div class="left">
                <img src="{{asset('html/assets/image/page/why-to-partner1.svg')}}" alt="why-to-partner" />
            </div>
            <div class="right">
                <h4 class="main-text">
                    {{__('Earn an additional income')}}
                </h4>
                <p class="sub-text">{{__('Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.')}}</p>
            </div>
        </div>
        <div class="item">
            <div class="left">
                <img src="{{asset('html/assets/image/page/why-to-partner2.svg')}}" alt="why-to-partner" />
            </div>
            <div class="right">
                <h4 class="main-text">
                    {{__('Open your network')}}
                </h4>
                <p class="sub-text">{{__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.')}}</p>
            </div>
        </div>
        <div class="item">
            <div class="left">
                <img src="{{asset('html/assets/image/page/why-to-partner3.svg')}}" alt="why-to-partner" />
            </div>
            <div class="right">
                <h4 class="main-text">
                    {{__('Practice your language')}}
                </h4>
                <p class="sub-text">{{__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.')}}</p>
            </div>
        </div>
    </div>
</section>
@stop
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<!-- <script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script> -->