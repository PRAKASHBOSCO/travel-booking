    @extends('Backend::layouts.master')

@section('title', __('All Pages'))

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
                            <h4>{{__('All Testimonials')}}</h4>
                            <a href="{{dashboard_url('new-testimonials')}}" class="btn btn-success">{{__('Add New')}}</a>
                        </div>
                    </div>
                </div>
            </div>

            @php get_filter_status('page'); @endphp

            <div class="table-responsive mb-4 mt-4">
                @if($allPosts->total() > 0)
                <table class="multi-table table table-striped table-bordered table-hover non-hover w-100" data-plugin="footable">
                    <thead>
                    <tr>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Designation')}}</th>
                        <th>{{__('Discription')}}</th>
                        <th>{{__('Profile Img')}}</th>
                        <th data-breakpoints="xs sm">{{__('Status')}}</th>
                        <th class="text-center">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allPosts->items() as $key => $item)
                        @php
                            $post_title = get_translate($item->category_name);
                            $params = [
                                'postID' => $item->id,
                                'postHashing' => gmz_hashing($item->id)
                            ];
                        @endphp
                    <tr>
                        <td class="d-flex align-items-center">
                           {{ucfirst($item->name)}}
                            <!-- <div>
                                <h6 class="mb-0"><a href="{{get_category_permalink($item->category_slug,'brew_club')}}">{{$post_title}}</a></h6>
                                <div class="quick-action">
                                    <a href="{{dashboard_url('edit-testimonials/' . $item->id)}}">{{__('Edit')}}</a>
                                    <a class="text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="{{dashboard_url('delete-testimonials')}}" data-params="{{base64_encode(json_encode($params))}}" data-remove-el="tr">{{__('Delete')}}</a>
                                    <a href="{{get_category_permalink($item->category_slug,'brew_club')}}">{{__('View')}}</a>
                                </div>
                            </div> -->
                        </td>
                        <td>{{ucfirst($item->designation)}}</td>
                        <td>{{ucfirst($item->description)}}</td>
                        <td> @if(!empty($item->profile_img))
                                @php
                                    $img = get_attachment_url($item->profile_img, [50, 50]);
                                @endphp
                                @if(!empty($img))
                                    <img src="{{url($img)}}" class="img-fluid mr-2 mw-5" alt="{{$post_title}}" />
                                @endif
                            @endif</td>

                        <!-- <td> {{ucfirst($item->profile_img)}}</td> -->
                        <td>{{ucfirst($item->status)}}</td>

                        <td class="text-center">
                            <div class="dropdown custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <a class="dropdown-item" href="{{get_testimonials_permalink($item->category_slug,'brew_club')}}">{{__('View')}}</a>
                                    <a class="dropdown-item" href="{{dashboard_url('edit-testimonials/' . $item->id)}}">{{__('Edit')}}</a>
                                    <a class="dropdown-item text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="{{dashboard_url('delete-testimonials')}}" data-params="{{base64_encode(json_encode($params))}}" data-remove-el="tr">{{__('Delete')}}</a>
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

