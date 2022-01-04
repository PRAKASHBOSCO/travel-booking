@extends('Plugin.PageBuilder::layouts.builder')

@php
    enqueue_scripts([
        'jquery-ui',
        'nested-sort-js',
        'gmz-option',
        'gmz-dropzone'
    ]);
    enqueue_styles([
        'jquery-ui',
        'gmz-option',
        'gmz-dropzone'
    ]);
    $page_id = request()->post('id');
@endphp

@section('content')
    {{-- main --}}
    <main class="container-fluid container-wrapper">
        <div class="builder">
            <div class="row no-gutters">
                <div class="col-lg-3">
                    <div class="builder__sidebar">
                        <div class="heading">
                            iBooking Builder
                        </div>
                        <div class="block-render" data-action="{{url('builder-get-blocks')}}">
                            @include('Frontend::components.loader')
                        </div>
                        <div class="block-settings" data-action="{{url('builder-get-block-settings')}}"></div>
                        <div class="row-settings" data-action="{{url('builder-get-row-settings')}}"></div>

                        <div class="action">
                            <div class="d-flex justify-content-around w-100">
                                @php
                                    $page = get_post(request()->get('id'), 'page');
                                @endphp
                                <a class="btn btn-link bd-view-page" target="_blank" href="{{get_page_permalink($page->post_slug)}}">{{__('VIEW PAGE')}}</a>
                                <button class="bd-save-page btn btn-success" data-action="{{url('builder-save-page')}}" data-page-id="{{$page_id}}">{{__('SAVE CHANGE')}}</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="builder__content">
                    @include('Frontend::components.header')
                    <div class="builder__render sortable" id="builder-render">
                        @if(!empty($data))
                            @foreach($data as $rows)
                                @if(!empty($rows))
                                    @php
                                        $row_settings = isset($rows['settings']) ? $rows['settings'] : [];
                                        if(!empty($row_settings)){
                                            $row_settings = json_decode($row_settings, true);
                                        }
                                        $row_class = isset($row_settings['sectionID']) ? 'gmz-' . $row_settings['sectionID'] : '';
                                        $row_id = isset($row_settings['sectionID']) ? $row_settings['sectionID'] : '';
                                    @endphp
                                <section class="__row-wrapper {{$row_class}}" data-id="{{$row_id}}">
                                    <div class="bd-overlay">
                                        <div class="action">
                                            <div class="move ui-sortable-handle"><i class="far fa-arrows"></i></div>
                                            <div class="edit"><i class="fal fa-pen"></i></div>
                                            <div class="delete"><i class="far fa-times"></i></div>
                                        </div>
                                    </div>
                                    <div class="bd-container-section">
                                        <div class="row __row ui-sortable" data-settings="{{ json_encode($row_settings) }}">
                                        @foreach($rows['columns'] as $cols)
                                            <div class="{{isset($cols['column']) ? $cols['column'] : ''}} __column ui-sortable-handle" data-columns="{{isset($cols['column']) ? $cols['column'] : ''}}">
                                                <div class="__column-inner ui-droppable @if(!empty($cols['elements'])) has-block @endif">
                                                    @if(!empty($cols['elements']))
                                                        @foreach($cols['elements'] as $el)
                                                            <div class="__block ui-draggable ui-draggable-handle __block-in-render" data-params="{{isset($el['params']) ? $el['params'] : ''}}">
                                                            @php
                                                            if(!empty($el)){
                                                                $els = json_decode($el['settings'], true);
                                                                $default_fields = $els['class']::inst()->getFields();
                                                                foreach ($default_fields as $df){
                                                                    if(!isset($els[$df['id']])){
                                                                        $els[$df['id']] = '';
                                                                    }
                                                                }
                                                            }
                                                            @endphp
                                                            <div id="{{$els['id']}}_{{$els['time']}}">
                                                                <div class="element-remove"><i class="far fa-times"></i></div>
                                                                @include('Plugin.PageBuilder::elements.' . $els['id'], ['params' => $els, 'data_settings' => true])
                                                            </div>
                                                    </div>
                                                        @endforeach
                                                    @else
                                                        <span><i class="far fa-plus"></i></span>
                                                    @endif
                                                </div>
                                                <div class="add-element"><i class="far fa-plus"></i></div>
                                            </div>
                                        @endforeach
                                    </div>
                                    </div>
                                </section>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="builder__add-row-wrapper">
                        <div class="builder__add-row">
                        <span class="gmz-add-row"><i class="far fa-plus"></i></span>
                        <div class="__layout">
                            <div class="close"><i class="far fa-times"></i></div>
                            <p>{{__('SELECT YOUR STRUCTURE')}}</p>
                            <ul>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M100,0V50H0V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M49,0V50H0V0Z M100,0V50H51V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M32,0V50H0V0Z M66,0V50H34V0Z M100,0V50H68V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M23.5,0V50H0V0Z M49,0V50H25.5V0Z M74.5,0V50H51V0Z M100,0V50H76.5V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M32.6667,0V50H0V0Z M100,0V50H34.6667V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M65.3333,0V50H0V0Z M100,0V50H67.3333V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M24,0V50H0V0Z M50,0V50H26V0Z M100,0V50H52V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M48,0V50H0V0Z M74,0V50H50V0Z M100,0V50H76V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M24,0V50H0V0Z M74,0V50H26V0Z M100,0V50H76V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M18.4,0V50H0V0Z M38.8,0V50H20.4V0Z M59.2,0V50H40.8V0Z M79.6,0V50H61.2V0Z M100,0V50H81.6V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M15,0V50H0V0Z M32,0V50H17V0Z M49,0V50H34V0Z M66,0V50H51V0Z M83,0V50H68V0Z M100,0V50H85V0Z"></path></svg></li>
                                <li><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 50"><path d="M16,0V50H0V0Z M82,0V50H18V0Z M100,0V50H84V0Z"></path></svg></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    @include('Frontend::components.footer')
                    </div>
                </div>
            </div>
            @include('Plugin.PageBuilder::layouts')
        </div>
    </main>
    @include('Backend::components.modal')
@endsection

