@if(is_enable_service(GMZ_SERVICE_HOTEL))
    @php
        enqueue_scripts('match-height');
        $property_types = isset($params['property_type']) ? $params['property_type'] : [];
        $type_value = '';
        if(!empty($property_types) && is_array($property_types)){
            if($property_types[0] == '' || $property_types[0] == 'all'){
                $type_value = 'all';
                $property_types = get_terms('name', 'property-type', 'full');
            }
        }else{
            $type_value = 'all';
            $property_types = get_terms('name', 'property-type', 'full');
        }
        $search_url = url('hotel-search');
        $title = isset($params['title']) ? $params['title'] : '';
        $description = isset($params['description']) ? $params['description'] : '';
    @endphp
    @if(!empty($property_types))
        <section class="hotel-type" @if(isset($data_settings)) data-settings="{{json_encode($params)}}" @endif>
            <div class="py-40">
                <h2 class="section-title mb-20" data-fields="title">{{get_translate($title)}}</h2>
                <p class="section-description mb-20" data-fields="description">{{get_translate($description)}}</p>
                <div class="list-of-property-type" data-fields="property_type">
                    <div class="row">
                        @foreach($property_types as $item)
                            @php
                                if($type_value == 'all'){
                                    $term = $item;
                                }else{
                                    $term = get_term('id', $item);
                                }

                                $img = get_attachment_url($term->term_image, [250, 150]);
                                $term_title = get_translate($term->term_title);
                                $search_url = add_query_arg(['property_type' => $term->id], $search_url);
                            @endphp
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="hotel-type__item" data-plugin="matchHeight">
                                    @if(!empty($img))
                                        <div class="hotel-type__thumbnail">
                                            <a href="{{$search_url}}">
                                                <img class="_image-hotel" src="{{$img}}" alt="{{$term_title}}">
                                            </a>
                                        </div>
                                    @endif
                                    <div class="hotel-type__info">
                                        <h3 class="hotel-type__name"><a href="{{$search_url}}">{{$term_title}}</a></h3>
                                        <div class="hotel-type__description">
                                            {{get_translate($term->term_description)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
