@php

    $id = $data['id'] . '_' . $data['time'];
    if(!isset($show)){
        $show = true;
    }

@endphp
<div class="block-settings-inner">
    <div class="header">{{__('Settings: ')}}{{$data['block_name']}}</div>
    <div class="content">
        <form class="form bd-form-settings form-translation" action="{{url('builder-render-preview')}}" enctype="multipart/form-data"
        >
            @php render_flag_option(); @endphp
            <input type="hidden" name="id" value="{{$data['id']}}" />
            <input type="hidden" name="class" value="{{$data['class']}}" />
            <input type="hidden" name="time" value="{{$data['time']}}" />
            <input type="hidden" name="lang" value="" />
            @if(!empty($data['fields']))
                <div class="row">
                    @php
                        $default_field = get_option_default_fields();
                    @endphp
                   @foreach ($data['fields'] as $_key => $field)
                        @php
                            $field = array_merge( $default_field, $field );

                            if($field['type'] == 'list_item'){
                                $data = [];
                                if(isset($settings[$field['id']])){
                                    $data = $settings[$field['id']];
                                }
                                $data = maybe_unserialize($data);
                                $field['value'] = $data;
                            }elseif($field['type'] == 'checkbox'){
                                $data = isset($settings[$field['id']]) ? $settings[$field['id']] : '';
                                if(!empty($data)){
                                    $data = explode(',', $data);
                                }else{
                                    $data = [];
                                }
                                $field['value'] = $data;
                            }elseif(isset($settings[$field['id']])){
                                $valueTemp = $settings[$field['id']];
                                if(is_array($valueTemp)){
                                    $valueTemp = implode(',', $valueTemp);
                                }
                                $field['value'] = $valueTemp;
                            }
                        @endphp
                        @include('Backend::settings.fields.render', [
                            'field' => $field
                        ])
                    @endforeach
                </div>
            @else
                <small><i>{{__('No form fields')}}</i></small>
            @endif
        </form>
    </div>
</div>
@php
    return false;
@endphp
