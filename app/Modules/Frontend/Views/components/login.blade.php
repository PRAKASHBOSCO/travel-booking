<div class="white-popup mfp-with-anim mfp-hide gmz-popup-form" id="gmz-login-popup">
    <div class="popup-inner">
        <h4 class="popup-title">{{__('Sign In')}}</h4>
        <div class="popup-content">
            <form class="text-left gmz-form-action account-form" action="{{url('login')}}" method="POST">
                @include('Frontend::components.loader')
                <div class="form">
                    <input type="hidden" name="isfr" value="1" />
                    <div id="username-field" class="field-wrapper input">
                        <label for="username">{{__('EMAIL')}}</label>
                        <i class="fal fa-user-alt"></i>
                        <input id="username" name="email" type="text" minlength="6" maxlength="50"   class="form-control spacenotallow gmz-validation" data-validation="required" placeholder="{{__('Your email')}}">
                    </div>

                    <div id="password-field" class="field-wrapper input mb-2">
                        <div class="d-flex justify-content-between">
                            <label for="password">{{__('PASSWORD')}}</label>
                            <a href="#gmz-reset-popup" class="forgot-pass-link gmz-box-popup" data-effect="mfp-zoom-in">{{__('Forgot Password?')}}</a>
                        </div>
                        <i class="fal fa-lock"></i>
                        <input id="password" name="password" type="password" class="form-control" data-validation="required" placeholder="{{__('Your password')}}">
                        <div class="view-password">
                            <i class="fal fa-eye view"></i>
                            <i class="fal fa-eye-slash not-view"></i>
                        </div>
                    </div>

                    <div class="gmz-message"></div>

                    <div class="d-sm-flex justify-content-between">
                        <div class="field-wrapper">
                            <button type="submit" class="btn btn-primary" value="">{{__('LOGIN')}}</button>
                        </div>
                    </div>

                    @if(is_social_login_enable('facebook') || is_social_login_enable('google'))
                    <div class="division">
                        <span>{{__('OR')}}</span>
                    </div>

                    <div class="social">
                        @if(is_social_login_enable('facebook'))
                        <a href="{{ url('/auth/redirect/facebook') }}" class="btn social-fb">
                            <i class="fab fa-facebook-f"></i>
                            <span class="brand-name">{{__('Facebook')}}</span>
                        </a>
                        @endif
                        @if(is_social_login_enable('google'))
                        <a href="{{ url('/auth/redirect/google') }}" class="btn social-github">
                            <i class="fab fa-google"></i>
                            <span class="brand-name">{{__('Google')}}</span>
                        </a>
                        @endif
                    </div>
                    @endif

                    <p class="signup-link">{{__('Not registered ?')}} <a href="#gmz-register-popup" class="gmz-box-popup" data-effect="mfp-zoom-in">{{__('Create an account')}}</a></p>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="white-popup mfp-with-anim mfp-hide gmz-popup-form" id="gmz-register-popup">
    <div class="popup-inner">
        <h4 class="popup-title">{{__('Sign Up')}}</h4>
        <div class="popup-content">
            <form class="text-left gmz-form-action account-form" action="{{url('register')}}" method="POST">
                @include('Frontend::components.loader')
                <div class="form">
                    <input type="hidden" name="isfr" value="1" />
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="last_name-field" class="field-wrapper input">
                                <label for="title">TITLE</label>
                                <i class="fal fa-male"></i>
                                <?php //$name_title = name_title();   
                                ?>
                                @php $title_names = DB::table('title')
                                ->select('*')
                                ->get(); @endphp
                                <select id="title_id" name="title_id" class="form-control gmz-validation" data-validation="required">
                                    @foreach($title_names as $title_name )
                                    <option value="{{ $title_name->id }}">{{ $title_name->title_name    }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="first_name-field" class="field-wrapper input">
                                <label for="first_name">{{__('NAME')}}<span class="required" style="color: red;">*</span></label>
                                <i class="fal fa-user"></i>
                                <input id="first_name" name="first_name" type="text" minlength="3" maxlength="32" class="onlyalphabetsspace form-control gmz-validation" data-validation="required" placeholder="Name">
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div id="last_name-field" class="field-wrapper input">
                                <label for="last_name">{{__('LAST NAME')}}</label>
                                <i class="fal fa-user-alt"></i>
                                <input id="last_name" name="last_name" type="text" class="form-control gmz-validation" data-validation="required" placeholder="Last Name">
                            </div>
                        </div> -->
                        <div class="col-lg-6">
                            <div id="phone-field" class="field-wrapper input">
                                <label for="last_name">{{__('CONTACT NO')}}<span class="required" style="color: red;">*</span></label>
                                <i class="fal fa-phone"></i>
                                <input id="phone" name="phone" type="text" minlength="10" maxlength="10" class="form-control numberonly gmz-validation" data-validation="required" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="address-field" class="field-wrapper input">
                                <label for="last_name">{{__('ADDRESS')}}</label>
                                <i class="fal fa-map-marker"></i>
                                <input id="address" name="address" type="text" class="form-control onlyalphabetsspace gmz-validation" data-validation="required" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="pin-field" class="field-wrapper input">
                                <label for="pin_code">{{__('PIN CODE')}}</label>
                                <i class="fal fa-map-pin"></i>

                                <input id="pin_code" name="pin_code" type="text" minlength="6" maxlength="6" class="form-control onlynumbers gmz-validation" data-validation="required" placeholder="Pin Code">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div id="country-field" class="field-wrapper input">
                                <label for="title">COUNTRY</label>
                               
                                   @php 
                                        
                                   $countries=DB::table('gmz_country')
                                   ->select('*')
                                   ->get();

                                    @endphp
                                <select id="country_name" name="country_name" class="form-control gmz-validation country-dropdown" data-validation="required">
                                @foreach($countries as $country )
                                <option value="{{ $country->id }}">{{ $country->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="state-field" class="field-wrapper input">
                                <label for="title">STATE</label>
                                   @php 
                                        
                                   $states=DB::table('gmz_states')
                                   ->select('*')
                                   ->get();

                                    @endphp
                                <select id="state_name" name="state_name" class="form-control gmz-validation state-dropdown" data-validation="required">
                                @foreach($states as $state )
                                <option value="{{ $state->id }}">{{ $state->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="hobbies" class="field-wrapper input">
                                <label for="hobbies">HOBBIES</label>
                                <i class="fal fa-heart"></i>

                                <select id="hobbies" name="hobbies" class="form-control gmz-validation" data-validation="required">
                                <option id="hobbies" value="Mr."> Lorem ipsum dolor .</option>
                                <option id="hobbies" value="Mr."> Lorem ipsum dolor .</option>
                                <option id="last_name" value="Mr."> Lorem ipsum dolor .</option> <option id="last_name" value="Mr."> Lorem ipsum dolor .</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="email-field" class="field-wrapper input ">
                        <label for="remail">{{__('EMAIL')}}</label>
                        <i class="fal fa-at"></i>
                        <input id="remail" name="email" type="text" value="" class="form-control spacenotallow email gmz-validation" data-validation="required" placeholder="Email">
                    </div>

                    <div id="password-field" class="field-wrapper input mb-2">
                        <div class="d-flex justify-content-between">
                            <label for="rpassword">{{__('PASSWORD')}}</label>
                            <a href="#gmz-reset-popup" class="forgot-pass-link gmz-box-popup" data-effect="mfp-zoom-in">{{__('Forgot Password?')}}</a>
                        </div>
                        <i class="fal fa-lock"></i>
                        <input id="rpassword" name="password" type="password" class="form-control gmz-validation" data-validation="required" placeholder="Password">
                        <div class="view-password">
                            <i class="fal fa-eye view"></i>
                            <i class="fal fa-eye-slash not-view"></i>
                        </div>
                    </div>

                    <div class="field-wrapper terms_condition">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary">
                                <input type="checkbox" name="agree_field" value="1" id="agree-term" class="new-control-input gmz-validation" data-validation="required">
                                <span class="new-control-indicator"></span><span>{!! sprintf(__('I agree to the <a href="%s"> terms and conditions </a>'), get_term_link()) !!}</span>
                            </label>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdskVIdAAAAAKLQJmrret41qO5zUZ5Q8ytfo5V1">
                            @if($errors->has('g-recaptcha-response'))

                            <span class="invalid-feedback" style="display:block"></span>

                            <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="gmz-message"></div>

                    <div class="d-sm-flex justify-content-between">
                        <div class="field-wrapper">
                            <button type="submit" class="btn btn-primary" value="">{{__('REGISTER')}}</button>
                        </div>
                    </div>

                    @if(is_social_login_enable('facebook') || is_social_login_enable('google'))
                    <div class="division">
                        <span>{{__('OR')}}</span>
                    </div>

                    <div class="social">
                        @if(is_social_login_enable('facebook'))
                        <a href="{{ url('/auth/redirect/facebook') }}" class="btn social-fb">
                            <i class="fab fa-facebook-f"></i>
                            <span class="brand-name">{{__('Facebook')}}</span>
                        </a>
                        @endif
                        @if(is_social_login_enable('google'))
                        <a href="{{ url('/auth/redirect/google') }}" class="btn social-github">
                            <i class="fab fa-google"></i>
                            <span class="brand-name">{{__('Google')}}</span>
                        </a>
                        @endif
                    </div>
                    @endif

                    <p class="signup-link">{{__('Already have an account?')}} <a href="#gmz-login-popup" class="gmz-box-popup" data-effect="mfp-zoom-in">{{__('Login')}}</a></p>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="white-popup mfp-with-anim mfp-hide gmz-popup-form" id="gmz-reset-popup">
    <div class="popup-inner">
        <h4 class="popup-title">{{__('Password Recovery')}}</h4>
        <div class="popup-content">
            <form class="text-left gmz-form-action account-form" action="{{url('password/email')}}" method="POST">
                @include('Frontend::components.loader')
                <div class="form">
                    <div id="email-field" class="field-wrapper input">
                        <div class="d-flex justify-content-between">
                            <label for="femail">{{__('EMAIL')}}</label>
                        </div>
                        <i class="fal fa-at"></i>
                        <input id="femail" name="email" type="text" class="form-control spacenotallow gmz-validation" data-validation="required" value="" placeholder="Email">
                    </div>

                    <div class="gmz-message"></div>

                    <div class="d-sm-flex justify-content-between pb-2">
                        <div class="field-wrapper">
                            <button type="submit" class="btn btn-primary" value="">{{__('RESET')}}</button>
                        </div>
                    </div>

                    <p>{{__('Enter your email and instructions will sent to you!')}}</p>

                </div>
            </form>
        </div>
    </div>
</div>

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
     $('.spacenotallow').on('keypress', function(e) {
        if (e.which == 32){
          return false;
        }
        }); 
     
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

<script>
    $(document).ready(function() {
    $('.country-dropdown').on('change', function() {
    var country_id = this.value;
    // alert(this.value);
    $(".state-dropdown").html('');
    $.ajax({
    url:"{{url('get-states-by-country')}}",
    type: "get",
    data: {
       country_id: country_id,
       _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
       $('.state-dropdown').html('<option value="">Select State</option>'); 
    $.each(result.states,function(key,value){
       $(".state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
       $('.city-dropdown').html('<option value="">Select State First</option>'); 
    }
    });
    });    
    });
</script>
