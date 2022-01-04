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
                                <label for="company-name">COMPANY NAME<span class="required">*</span> </label>
                                <input type="text" name="company_name" class="form-control onlyalphabetsspace gmz-validation" minlength="3" maxlength="32" required data-validation="required" id="company_name" />
                                    <!-- <span class="error" role="alert">
                                        <strong>The first name field is required.</strong>
                                    </span> -->
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="first-name">{{__('CONTACT PERSON')}}</label>
                                <input type="text" required name="first_name" class="form-control onlyalphabetsspace" id="last-name" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="phone">{{__('CONTACT NO')}}<span class="required">*</span> </label>
                                <input type="text" name="phone" class="form-control gmz-validation numberonly" minlength="10" maxlength="10" required data-validation="required" id="phone" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">{{__('EMAIL')}}<span class="required">*</span> </label>
                                <input type="text" name="email" class="form-control spacenotallow gmz-validation " pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" data-validation="required" id="email" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="address_proof_img">{{__('ADDRESS PROOF UPLOAD')}}<span class="required">*</span> </label>
                                <input type="file" name="address_proof_img"accept="image/png, image/jpeg" class="form-control gmz-validation" required data-validation="required" id="address_proof_img" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="logo_img">{{__('UPLOAD LOGO')}}<span class="required">*</span> </label>
                                <input type="file" name="logo_img"accept="image/png, image/jpeg" class="form-control gmz-validation" required data-validation="required" id="logo_img" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="gst">{{__('GST NO')}}<span class="required">*</span> </label>
                                <input type="no" name="gst" class="form-control gmz-validation onlynumbers" required data-validation="required" id="gst" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="pan">{{__('PAN NO')}}<span class="required">*</span> </label>
                                <input type="no" name="pan" class="form-control gmz-validation only" required data-validation="required" id="pan" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="website_url">WEBSITE URL<span class="required">*</span> </label>
                                <input type="text" name="website_url" class="form-control onlyalphabetsspace required gmz-validation" data-validation="required" id="website_url" />
                            </div>

                            <div class="form-group  col-lg-6">
                                <label for="address">{{__('ADDRESS')}}<span class="required">*</span> </label>
                                <textarea name="address" rows="3" class="form-control onlyalphabetsspace" id="address"></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="pin_code">PIN CODE<span class="required">*</span> </label>
                                <input type="text" name="pin_code" class="form-control numberonly gmz-validation" minlength="6" maxlength="6" data-validation="required" id="pin_code" />
                            </div>

                            <div class="form-group  col-lg-6">
                                <label for="password">{{__('PASSWORD')}}<span class="required">*</span> </label>
                                <input type="password" name="password" class="form-control  gmz-validation" data-validation="required" id="password" />
                            </div>

                        </div>



                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="agree" value="1">
                                {!! sprintf(__('I accept %s'), '<a href="'. get_term_link() .'" class="link">'. __('Terms and Conditions') .'</a>') !!}
                            </label>

                            <div class="g-recaptcha" data-sitekey="6LdskVIdAAAAAKLQJmrret41qO5zUZ5Q8ytfo5V1">
                                @if($errors->has('g-recaptcha-response'))

                                <span class="invalid-feedback" style="display:block"></span>

                                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="gmz-message"></div>
                        <button type="submit" class="btn btn-primary">{{__('SUBMIT REQUEST')}}</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 partner-form__right">
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){  
     $(".onlyalphabetsspace").keypress(function(event){
         var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 121) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
        });
     $(".onlyalphabetsspace").keypress(function(event){  
            if (this.value.length === 0 && event.which === 32) {
                event.preventDefault();
            }
        });
     $('.numberonly').keypress(function (e) {   
            var charCode = (e.which) ? e.which : event.keyCode   
            if (String.fromCharCode(charCode).match(/[^0-9]/g))  
                return false;  
        }); 
     $(".onlynumbers").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#errmsg").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
        });
      var validateEmail = function(elementValue) {
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      return emailPattern.test(elementValue);
      } 

     $('.email').keyup(function() { 
    var value = $(this).val();
    var valid = validateEmail(value); 
    if (!valid) { 
        $(this).css('color', 'red'); 
        $(':input[type="submit"]').prop('disabled', true);
    } else {  
        $(this).css('color', '#000');
        $(':input[type="submit"]').prop('disabled', false); 
    } 
  });
 });
        
</script>
<!-- <script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script> -->