@extends('Frontend::layouts.master')

@section('title', $title)
@section('class_body', 'page-archive')

@php
    $feature_image = get_option('blog_feature_image');
    $feature_image = get_attachment_url($feature_image);
@endphp


@section('content')
    @if(!empty($feature_image))
        <div class="feature-image">
            <img src="{{url($feature_image)}}" alt="blog page" />
        </div>
    @endif
    @php
        if(!isset($type)){
            $type = '';
        }
        the_breadcrumb([], 'term', ['type' => $type, 'title' => $title]);
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pb-5">
                <h2 class="archive-title">
                    @if(isset($type) && !empty($type))
                        @if($type == 'category')
                            {{sprintf(__('Category: %s'), $title)}}
                        @endif
                        @if($type == 'tag')
                                {{sprintf(__('Tag: %s'), $title)}}
                        @endif
                    @else
                        {{$title}}
                    @endif
                </h2>
                @if(!$posts->isEmpty())
                    <div class="row">
                        @foreach($posts as $post)
                            @php
                                $post_title = get_translate($post['post_title']);
                            @endphp
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="post-item car-item car-item--grid">
                                <div class="thumbnail post-img">
                                    <a href="{{get_post_permalink($post['post_slug'])}}">
                                    @if(!empty($post['thumbnail_id']))
                                        @php
                                            $thumbnail = get_attachment_url($post['thumbnail_id'], [840, 400])
                                        @endphp
                                        @if(!empty($thumbnail))
                                            <img src="{{url($thumbnail)}}" class="img-responsive" alt="{{$post_title}}" />
                                        @else
                                          <img src="{{url('public/images/no_img.png')}}" class="img-responsive"  alt="{{$post_title}}" />

                                        @endif
                                    @else
                                    <img src="{{url('public/images/no_img.png')}}" class="img-responsive" alt="{{$post_title}}" />
                                    @endif


                                    <div class="date">{{date('dS M, Y', strtotime($post['created_at']))}}</div>
                                    </a>
                                </div>
                                <div class="info pb10">
                                    <h3 class="post-title">
                                        <a href="{{get_post_permalink($post['post_slug'])}}">{{$post_title}}</a>
                                    </h3>
                                    <p class="hotel-item__location"><div class="float:left;"><i class="fas fa-user mr-2"></i>{{sprintf(__('By %s'), get_user_name($post['author']))}}</div>


                                    </p>
                                   @if(!empty($post['post_category']))

                                            @php
                                                $cate_str = explode(',', $post['post_category']);
                                                $cates = [];
                                            @endphp
                                            @foreach($cate_str as $cate)
                                                @php
                                                    $term = get_term('id', $cate);
                                                    if(!is_null($term)){
                                                        array_push($cates, '<a href="'. url('category/' . $term->term_name) .'">'. get_translate($term->term_title) .'</a>');
                                                    }
                                                @endphp
                                            @endforeach
                                            @if(!empty($cates))
                                                <p class="post-cat"><em>{{__('Categories')}}:</em>
                                                    {{__('On ')}}{!! implode(', ', $cates) !!}
                                                  </p>
                                            @endif
                                           
                                        @endif
                                   
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {!! $posts->onEachSide(1)->links() !!}
                @else
                    <div class="alert alert-warning mt-4">{{__('No posts found!')}}</div>
                @endif
            </div>
            <div class="col-lg-3">
                <div class="siderbar-single">
                    @include('Frontend::services.post.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop

