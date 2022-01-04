<div class="block-settings-inner bd-setting">
    <div class="header">{{__('Settings Section')}}</div>
    <div class="content">
        <form class="form" action="{{url('builder-render-preview')}}">
            {{-- Margin --}}
            <div class="bd-sections-title">
                {{__('Layout')}}
            </div>
            {{--Margin Controler--}}
            <div class="bd-controller bd-margin-setting">
                <div class="bd-controller-title d-inline-block">{{__('Margin')}}</div>
                {{-- Responsive --}}
                <ul class="bd-responsive nav nav-pills">
                    <li class="bd-nav-item">
                        <a class="bd-nav-link active" data-toggle="pill" href="#margin-desktop"
                           title="{{__('Desktop')}}">
                            <i class="fad fa-desktop"></i>
                        </a>
                    </li>
                    <li class="bd-nav-item">
                        <a class="bd-nav-link" data-toggle="pill" href="#margin-tablet" title="{{__('Tablet')}}">
                            <i class="fad fa-tablet"></i>
                        </a>
                    </li>
                    <li class="bd-nav-item">
                        <a class="bd-nav-link" data-toggle="pill" href="#margin-mobile" title="{{__('Mobile')}}">
                            <i class="fad fa-mobile"></i>
                        </a>
                    </li>
                </ul>
                <div class="bd-label-input-group">
                    <span>{{__('Top')}}</span>
                    <span>{{__('Right')}}</span>
                    <span>{{__('Bottom')}}</span>
                    <span>{{__('Left')}}</span>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="margin-desktop">
                        <div class="input-group mb-3">
                            <input type="number" name="margin_desktop_top" id="top" class="form-control"
                                   placeholder="px">
                            <input type="number" name="margin_desktop_right" class="form-control" placeholder="Auto"
                                   disabled>
                            <input type="number" name="margin_desktop_bottom" class="form-control" placeholder="px">
                            <input type="number" name="margin_desktop_left" class="form-control" placeholder="Auto"
                                   disabled>
                        </div>
                    </div>
                    <div class="tab-pane" id="margin-tablet">
                        <div class="input-group mb-3">
                            <input type="number" name="margin_tablet_top" id="top" class="form-control"
                                   placeholder="px">
                            <input type="number" name="margin_tablet_right" class="form-control" placeholder="Auto"
                                   disabled>
                            <input type="number" name="margin_tablet_bottom" class="form-control" placeholder="px">
                            <input type="number" name="margin_tablet_left" class="form-control" placeholder="Auto"
                                   disabled>
                        </div>
                    </div>
                    <div class="tab-pane" id="margin-mobile">
                        <div class="input-group mb-3">
                            <input type="number" name="margin_mobile_top" id="top" class="form-control"
                                   placeholder="px">
                            <input type="number" name="margin_mobile_right" class="form-control" placeholder="Auto"
                                   disabled>
                            <input type="number" name="margin_mobile_bottom" class="form-control" placeholder="px">
                            <input type="number" name="margin_mobile_left" class="form-control" placeholder="Auto"
                                   disabled>
                        </div>
                    </div>
                </div>

            </div>

            {{--Padding Controler--}}
            <div class="bd-controller bd-padding-setting">
                <div class="bd-controller-title d-inline-block">{{__('Padding')}}</div>
                {{-- Responsive --}}
                <ul class="bd-responsive nav nav-pills">
                    <li class="bd-nav-item">
                        <a class="bd-nav-link active" data-toggle="pill" href="#padding-desktop"
                           title="{{__('Desktop')}}">
                            <i class="fad fa-desktop"></i>
                        </a>
                    </li>
                    <li class="bd-nav-item">
                        <a class="bd-nav-link" data-toggle="pill" href="#padding-tablet" title="{{__('Tablet')}}">
                            <i class="fad fa-tablet"></i>
                        </a>
                    </li>
                    <li class="bd-nav-item">
                        <a class="bd-nav-link" data-toggle="pill" href="#padding-mobile" title="{{__('Mobile')}}">
                            <i class="fad fa-mobile"></i>
                        </a>
                    </li>
                </ul>
                <div class="bd-label-input-group">
                    <span>{{__('Top')}}</span>
                    <span>{{__('Right')}}</span>
                    <span>{{__('Bottom')}}</span>
                    <span>{{__('Left')}}</span>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="padding-desktop">
                        <div class="input-group mb-3">
                            <input type="number" name="padding_desktop_top" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_desktop_right" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_desktop_bottom" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_desktop_left" min="0" class="form-control"
                                   placeholder="px">
                        </div>
                    </div>
                    <div class="tab-pane" id="padding-tablet">
                        <div class="input-group mb-3">
                            <input type="number" name="padding_tablet_top" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_tablet_right" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_tablet_bottom" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_tablet_left" min="0" class="form-control"
                                   placeholder="px">
                        </div>
                    </div>
                    <div class="tab-pane" id="padding-mobile">
                        <div class="input-group mb-3">
                            <input type="number" name="padding_mobile_top" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_mobile_right" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_mobile_bottom" min="0" class="form-control"
                                   placeholder="px">
                            <input type="number" name="padding_mobile_left" min="0" class="form-control"
                                   placeholder="px">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content Width --}}
            <div class="bd-controller bd-controller--inline">
                <div class="bd-controller-title d-inline-block">
                    {{__('Content width')}}
                </div>
                <select name="content_width" id="content-width" class="form-control">
                    <option value="boxed">{{__('Boxed')}}</option>
                    <option value="fullwidth">{{__('Full Width')}}</option>
                </select>
            </div>
            {{-- Column Gap --}}
            <div class="bd-controller bd-controller--inline">
                <div class="bd-controller-title d-inline-block">
                    {{__('Column Gap')}}
                </div>
                <select name="column_gap" id="column-gap" class="form-control">
                    <option value="default">{{__('Default')}}</option>
                    <option value="no-gap">{{__('No Gap')}}</option>
                </select>
            </div>

            <div class="form-group mt-4">
                <label>{{__('Css ID')}}</label>
                <input type="text" class="form-control" name="css_id" id="css-id" pattern="-?[ _a-zA-Z]+[ _a-zA-Z0-9-]*"
                       placeholder="e.g: my-id"/>
            </div>

            <div class="form-group">
                <label>{{__('Css Class')}}</label>
                <input type="text" class="form-control" name="css_class" id="css-class"
                       pattern="-?[ _a-zA-Z]+[ _a-zA-Z0-9-]*" placeholder="e.g: my-class-1 my-class-2"/>
            </div>

            <div class="bd-sections-title">
                {{__('Styles')}}
            </div>
            <div class="bd-controller">
                <div class="bd-controller-title">
                    {{__('Background Color')}}
                </div>
            </div>
            <div class="bd-controller bd-controller--inline">
                <div>
                    <label class="sr-only" for="background_color"></label>
                    <input type="color" id="background_color" name="background_color" class="border-0 p-0 bg-transparent"
                           value="#FDF4EC" style="height: 30px;" title="{{__('Choose a color')}}">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="bgc_transparent" name="bgc_transparent"
                           checked>
                    <label class="custom-control-label text-muted" for="bgc_transparent">{{__('Transparent')}}</label>
                </div>
            </div>


            <div class="bd-sections-title">
                {{__('Responsive')}}
            </div>
            <div class="bd-controller bd-controller--inline">
                <div class="bd-controller-title">
                    {{__('Hide On Desktop')}}
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="hide-desktop" name="hide_desktop">
                    <label class="custom-control-label" for="hide-desktop"></label>
                </div>
            </div>
            <div class="bd-controller bd-controller--inline">
                <div class="bd-controller-title">
                    {{__('Hide On Tablet')}}
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="hide-tablet" name="hide_tablet">
                    <label class="custom-control-label" for="hide-tablet"></label>
                </div>
            </div>
            <div class="bd-controller bd-controller--inline">
                <div class="bd-controller-title">
                    {{__('Hide On Mobile')}}
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="hide-mobile" name="hide_mobile">
                    <label class="custom-control-label" for="hide-mobile"></label>
                </div>
            </div>
            <div class="bd-controller bd-controller--inline">
                <div class="bd-controller-title">
                    {{__('Reverse Columns (Mobile)')}}
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="reverse-columns-mobile"
                           name="reverse_columns_mobile">
                    <label class="custom-control-label" for="reverse-columns-mobile"></label>
                </div>
            </div>

        </form>
    </div>
</div>