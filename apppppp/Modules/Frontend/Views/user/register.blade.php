@extends('Frontend::layouts.user')

@php
    admin_enqueue_styles('gmz-checkbox');
@endphp

@section('content')
    <h1 class="">{{__('Register')}}</h1>
    <p class="signup-link register">{{__('Already have an account?')}} <a href="{{url('login')}}">{{__('Log in')}}</a></p>
    <form class="text-left gmz-form-action account-form" action="{{url('register')}}" method="POST">
                @include('Frontend::components.loader')
                <div class="form">
                    <input type="hidden" name="isfr" value="1" />
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="last_name-field" class="field-wrapper input">
                                <label for="title">TITLE</label>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->


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
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                                <input id="first_name" name="first_name" type="text" class="form-control gmz-validation" data-validation="required" placeholder="Name">
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
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                                <input id="phone" name="phone" type="text" class="form-control gmz-validation" data-validation="required" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="address-field" class="field-wrapper input">
                                <label for="last_name">{{__('ADDRESS')}}</label>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                                <input id="address" name="address" type="text" class="form-control gmz-validation" data-validation="required" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="pin-field" class="field-wrapper input">
                                <label for="pin_code">{{__('PIN CODE')}}</label>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->


                                <input id="pin_code" name="pin_code" type="number" class="form-control gmz-validation" data-validation="required" placeholder="Pin Code">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="country-field" class="field-wrapper input">
                                <label for="title">COUNTRY</label>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                                <select id="last_name" name="title" class="form-control gmz-validation" data-validation="required">
                                    <option id="last_name" value="Mr."> India</option>
                                    <option id="last_name" value="Mrs."> Pakistan</option>
                                    <option id="last_name" value="Miss"> America</option>
                                    <option id="last_name" value="Ms."> Chaina</option>
                                    <option id="last_name" value="Dr."> Lundon</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="state-field" class="field-wrapper input">
                                <label for="title">STATE</label>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                                <select id="last_name" name="title" class="form-control gmz-validation" data-validation="required">
                                    <option id="last_name" value="Mr."> Uttar Pradesh.</option>
                                    <option id="last_name" value="Mrs."> Bihar</option>
                                    <option id="last_name" value="Miss"> Delhi</option>
                                    <option id="last_name" value="Ms.">Panjab.</option>
                                    <option id="last_name" value="Dr."> Kolkata.</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div id="hobbies-field" class="field-wrapper input">
                                <label for="title">HOBBIES</label>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                                <select id="last_name" name="title" class="form-control gmz-validation" data-validation="required">
                                    <option id="last_name" value="Mr."> Lorem ipsum dolor .</option>
                                    <option id="last_name" value="Mr."> Lorem ipsum dolor .</option>
                                    <option id="last_name" value="Mr."> Lorem ipsum dolor .</option>
                                    <option id="last_name" value="Mr."> Lorem ipsum dolor .</option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="email-field" class="field-wrapper input ">
                        <label for="remail">{{__('EMAIL')}}</label>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                        <input id="remail" name="email" type="text" value="" class="form-control gmz-validation" data-validation="required" placeholder="Email">
                    </div>

                    <div id="password-field" class="field-wrapper input mb-2">
                        <div class="d-flex justify-content-between">
                            <label for="rpassword">{{__('PASSWORD')}}</label>
                            <a href="#gmz-reset-popup" class="forgot-pass-link gmz-box-popup" data-effect="mfp-zoom-in">{{__('Forgot Password?')}}</a>
                        </div>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                        <input id="rpassword" name="password" type="password" class="form-control gmz-validation" data-validation="required" placeholder="Password">
                        <div class="view-password">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->

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
@endsection