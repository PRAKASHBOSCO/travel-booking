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
<section class="hero-slider" style="min-height: 350px" @if(isset($data_settings)) data-settings="{{json_encode($params)}}" @endif>
   @php
      $slider = isset($params['gallery']) ? $params['gallery'] : '';
      $galleries = [];
      if(!empty($slider)){
          $slider = explode(',', $slider);
          if(!empty($slider)){
              foreach($slider as $item){
                  $url = get_attachment_url($item, [1920, 768]);
                  if(!empty($url)){
                      array_push($galleries, $url);
                  }
              }
          }
      }
      $text_slider = isset($params['heading']) ? get_translate($params['heading']) : '';
   @endphp
   <div class="container-fluid no-gutters p-0">
       <div data-fields="gallery">
          @if(!empty($galleries))
             <div class="slider" data-plugin="slick">
                @foreach($galleries as $item)
                   <div class="item">
                      <img src="{{url($item)}}" alt="home slider">
                   </div>
                @endforeach
             </div>
          @endif
       </div>

      <div class="search-center">
         <div class="container">
            @if(!empty($text_slider))
               <p class="search-center__title" data-fields="heading">{{$text_slider}}</p>
            @endif
             @if(isset($params['services']) && !empty($params['services']))
                <div class="search-form-wrapper" data-fields="services">
                    <ul class="nav nav-tabs" id="searchFormTab" role="tablist">
                        @php $i = 0; @endphp
                        @foreach($params['services'] as $k => $v)
                            <li class="nav-item">
                                <a class="nav-link @if($i == 0) active @endif" id="{{$v['service']}}-search-tab" data-toggle="tab" href="#{{$v['service']}}-search" role="tab" aria-controls="{{$v['service']}}-search" aria-selected="true"><i class="{{$v['icon']}}"></i> {{get_translate($v['name'])}}</a>
                            </li>
                            @php $i++; @endphp
                        @endforeach
                    </ul>
                    <div class="tab-content" id="searchFormTab">
                        @php $i = 0; @endphp
                        @foreach($params['services'] as $k => $v)
                            <div class="tab-pane fade show @if($i == 0) active @endif {{$v['service']}}-search-form" id="{{$v['service']}}-search" role="tabpanel" aria-labelledby="{{$v['service']}}-search-tab">
                                @include('Frontend::services.'. $v['service'] .'.search-form')
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
             @endif
         </div>
      </div>
   </div>
</section>
