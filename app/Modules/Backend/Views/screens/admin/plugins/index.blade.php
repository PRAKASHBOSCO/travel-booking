@extends('Backend::layouts.master')

@section('title', __('Plugins'))

@php
    admin_enqueue_styles([
        'gmz-datatables',
        'gmz-dt-global',
        'gmz-dt-multiple-tables',
        'footable'
    ]);
    admin_enqueue_scripts([
       'gmz-datatables',
       'gmz-table',
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
                            <h4>{{__('Plugins')}}</h4>
                        </div>
                    </div>
                </div>

                @if(!empty($plugins) && !isset($error))

                    <div class="table-responsive plugin-wrapper mb-1 mt-4">
                        <table id="gmz_table" class="multi-table table table-striped table-bordered table-hover non-hover w-100" data-plugin="footable">
                            <thead>
                            <tr>
                                <th data-breakpoints="xs sm md">{{__('Thumbnail')}}</th>
                                <th>
                                   {{__('Name')}}
                                </th>
                                <th data-breakpoints="xs">{{__('Status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($plugins as $key => $val)
                                    <tr class="@if(isset($installed[$key])) installed @endif">
                                        <td class="img-wrapper">
                                            <div class="">
                                                <img src="{{$val['preview']}}" class="img-fluid" alt="preview"/>
                                            </div>
                                        </td>
                                        <td>
                                            <form class="gmz-form-action gmz-plugin-form d-flex" action="{{dashboard_url('install-plugin')}}" method="POST" data-loader="body">
                                                <div class="aoverlay"></div>
                                                @include('Backend::components.loader')
                                                <input type="hidden" name="plugin" value="{{$key}}" />
                                                <input type="hidden" name="version" value="{{$val['version']}}" />
                                                <input type="hidden" name="action" value="@if(isset($installed[$key])) remove @else install @endif" />
                                                <div class="d-block">
                                                    <h6 class="name">{{$val['name']}}</h6>
                                                    <p class="text-black-50 description"><i>{{$val['description']}}</i></p>
                                                    @if(!isset($installed[$key]))
                                                            <small class="version">{{__('Version')}}: <b>{{$val['version']}}</b></small>
                                                    @else
                                                        @if($installed[$key] != $val['version'])
                                                            <div class="d-flex">
                                                                <small class="version">{{__('Current')}}: <b>{{$installed[$key]}}</b></small>
                                                                <small class="ml-3 mb-0 text-danger version">{!! sprintf(__('Available version: %s'), '<b>' . $val['version']) . '</b>' !!}</small>
                                                            </div>
                                                        @else
                                                                <small class="version">{{__('Version')}}: <b>{{$val['version']}}</b></small>
                                                        @endif
                                                    @endif

                                                    <div class="td-action">
                                                        @if(isset($installed[$key]))
                                                            @if($installed[$key] != $val['version'])
                                                                <button name="update" type="submit" class="btn-plugin-update">{{__('Update')}}</button>
                                                            @endif
                                                        <button type="submit" name="remove" class="btn-plugin-deactive">{{__('Deactive')}}</button>
                                                        @else
                                                            <button type="submit" name="install" class="btn-plugin-active">{{__('Active')}}</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            @if(isset($installed[$key]))
                                                <div class="text-success"><b>{{__('Installed')}}</b></div>
                                            @else
                                                <div class="text-danger"><b>{{__('Not Install')}}</b></div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @php
                        $non_installed = [];
                    @endphp
                @else
                    @if(isset($error))
                        <div class="alert alert-warning mt-3 mb-0">
                            {{$error}}
                        </div>
                    @else
                        <i class="mt-2 d-block">{{__('No plugins')}}</i>
                    @endif
                @endif
            </div>
        </div>
    </div>
@stop

