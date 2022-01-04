    @extends('Backend::layouts.master')

@section('title', __('All Tours'))

@php
    admin_enqueue_styles([
        'gmz-datatables',
        'gmz-dt-global',
        'gmz-dt-multiple-tables',
        'footable'
    ]);
    admin_enqueue_scripts([
        'gmz-datatables',
        'footable'
    ]);
@endphp

@section('content')

    <div class="layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>{{__('All Tours')}}</h4>
                            <a href="{{dashboard_url('new-tour')}}" class="btn btn-success">{{__('Add New')}}</a>
                        </div>
                    </div>
                </div>
            </div>

            @php get_filter_status('tour'); @endphp

            <div class="table-responsive mb-4 mt-4">
                @if($allPosts->total() > 0)
                <table class="multi-table table table-striped table-bordered table-hover non-hover w-100" data-plugin="footable">
                    <thead>
                    <tr>
                        <th>{{__('Name')}}</th>
                        <th data-breakpoints="xs sm md">{{__('Group Size')}}</th>
                        <th data-breakpoints="xs sm md">{{__('Type')}}</th>
                        <th data-breakpoints="xs sm">{{__('Price')}}</th>
                        <th data-breakpoints="xs">{{__('Status')}}</th>
                        <th class="text-center">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allPosts->items() as $key => $item)
                        @php
                            $post_title = get_translate($item->post_title);
                            $params = [
                                    'postID' => $item->id,
                                    'postHashing' => gmz_hashing($item->id)
                                ];
                        @endphp
                    <tr>
                        <td class="d-flex align-items-center">
                            @if(!empty($item->thumbnail_id))
                                @php
                                    $img = get_attachment_url($item->thumbnail_id, [50, 50]);
                                @endphp
                                @if(!empty($img))
                                    <a href="{{get_tour_permalink($item['post_slug'])}}" target="_blank">
                                    <img src="{{$img}}" class="img-fluid mr-2 mw-5" alt="{{$post_title}}" />
                                    </a>
                                @endif
                            @endif
                                <div>
                                    <h6 class="mb-0"><a href="{{get_tour_permalink($item['post_slug'])}}" target="_blank">{{$post_title}}</a></h6>
                                    <div class="quick-action">
                                        <a href="{{dashboard_url('edit-tour/' . $item->id)}}">{{__('Edit')}}</a>
                                        <a class="text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="{{dashboard_url('delete-tour')}}" data-params="{{base64_encode(json_encode($params))}}" data-remove-el="tr">{{__('Delete')}}</a>
                                        <a href="{{get_tour_permalink($item->post_slug)}}">{{__('View')}}</a>
                                    </div>
                                </div>
                        </td>
                        <td>
                            {{$item['group_size']}}
                        </td>
                        <td>
                            @php
                                $type = $item['tour_type'];
                                $term = get_term('id', $type);
                                if($term){
                                    echo get_translate($term->term_title);
                                }else{
                                    echo '---';
                                }
                            @endphp
                        </td>
                        <td>{{convert_price($item['adult_price'])}}</td>
                        <td>{{ucfirst($item->status)}}</td>
                        <td class="text-center">
                            <div class="dropdown custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <a class="dropdown-item" href="{{get_tour_permalink($item['post_slug'])}}" target="_blank">{{__('View')}}</a>
                                    <a class="dropdown-item" href="{{dashboard_url('edit-tour/' . $item->id)}}">{{__('Edit')}}</a>
                                    <a class="dropdown-item text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="{{dashboard_url('delete-tour')}}" data-params="{{base64_encode(json_encode($params))}}" data-remove-el="tr">{{__('Delete')}}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="gmz-pagination">
                    {!! $allPosts->links() !!}
                </div>

                @else
                    <div class="alert alert-warning">{{__('No data')}}</div>
                @endif
            </div>
        </div>
    </div>
@stop
