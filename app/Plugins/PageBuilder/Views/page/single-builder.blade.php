@php
    $post_content = str_replace('[gmz_page_builder]', '', $post_content);
    $post_content = json_decode(maybe_unserialize($post_content), true);
@endphp
@section('content')
    <div class="bd-wrap">
    @foreach($post_content as $rows)
        @if(!empty($rows))
            @php
                $row_settings = isset($rows['settings']) ? $rows['settings'] : [];
                $classSection = '';
                $cssID = '';
                $classContainer = 'container';
                $classRow = 'row';
                if(!empty($row_settings)):
                    $settings = json_decode($row_settings, true);
                    //get classes
                    $classSection = render_css_page($settings);
                    if(!empty($settings['cssClass'])){
                       $classSection .= ' ' . $settings['cssClass'];
                    }
                    $classSection = trim($classSection);
                    //get id
                    if(!empty($settings['cssID'])){
                       $cssID = trim($settings['cssID']);
                    }
                    //container
                    if (isset($settings['contentWidth']) && $settings['contentWidth'] == 'fullwidth'){
                       $classContainer = 'container-fluid';
                    }
                    //no-gap
                    if (isset($settings['columnGap']) && $settings['columnGap'] == 'no-gap'){
                       $classRow .= ' no-gutters';
                    }
                endif;
            @endphp
            <section class="gmz-section {{$classSection}}" id="{{$cssID}}">
                <div class="{{$classContainer}}">
                    <div class="{{$classRow}}">
                        @foreach($rows['columns'] as $cols)
                            <div class="{{isset($cols['column']) ? $cols['column'] : ''}}">
                            @if(!empty($cols['elements']))
                                @foreach($cols['elements'] as $el)
                                    @php
                                        if(!empty($el['settings'])){
                                            $els = json_decode($el['settings'], true);
                                        }
                                    @endphp
                                    @include('Plugin.PageBuilder::elements.' . $els['id'], ['params' => $els])
                                @endforeach
                            @endif
                            </div>
                        @endforeach
                    </div>
                </div><!-- End Container -->
            </section>
        @endif
    @endforeach
    </div>
@stop