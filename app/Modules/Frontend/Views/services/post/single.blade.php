@extends('Frontend::layouts.master')

@section('title', get_translate($post['post_title']))
@section('class_body', 'single-post')

@php
    $post_content = get_translate($post['post_content']);
    $post_title = get_translate($post['post_title']);
@endphp

@section('content')
    @if(!empty($post['thumbnail_id']))
        @php
            $thumbnail = get_attachment_url($post['thumbnail_id']);
        @endphp
        <div class="feature-image">
            <img src="{{url($thumbnail)}}" alt="{{$post_title}}" />
        </div>
    @endif
    @php
        the_breadcrumb($post, 'pages');
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pb-5">
                <h1 class="post-title">
                    {{$post_title}}
                </h1>
                <div class="blog">
                <ul>
                   <li>
                       
                          <i class="fas fa-user"></i> {{get_user_name($post['author'])}}
                      
                   </li>
                   <li>
                      
                           <i class="fas fa-calendar"></i>  {{date(get_date_format(), strtotime($post['created_at']))}}
                       
                   </li>
                   
                    <li>
                        @php
                            $number_comment = get_comment_number($post['id'], 'post');
                        @endphp
                        
                            <i class="fas fa-comments"></i> 
                           {{$number_comment}}
                       
                        
                    </li>
                </ul>
            </div>
                <div>
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

                        <p class="post-cat"><em> {{__('Categories')}}: </em>
                                                   {!! implode(', ', $cates) !!}
                                                  </p>
                           
                        @endif
                    @endif
                </div>
                @if(!empty($post_content))
                    <section class="description">
                        <div class="section-content">
                            {!! balance_tags($post_content) !!}
                        </div>
                    </section>
                @endif

                @if(!empty($post['post_tag']))
                    @php
                        $tag_str = explode(',', $post['post_tag']);
                        $tags = [];
                    @endphp
                    @foreach($tag_str as $tag)
                        @php
                            $term = get_term('id', $tag);
                            if(!is_null($term)){
                                array_push($tags, '<a class="tag-item" href="'. url('tag/' . $term->term_name) .'">'. esc_html(get_translate($term->term_title)) .'</a>');
                            }
                        @endphp
                    @endforeach
                    @if(!empty($tags))
                        <div class="post-tags">
                            {{__('Tags ')}}{!! implode(' ', $tags) !!}
                        </div>
                    @endif
                @endif
                @include('Frontend::services.post.comment')
            </div>
            <div class="col-lg-3">
                <div class="siderbar-single">
                @include('Frontend::services.post.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop

<script type="text/javascript">
    
    
</script>