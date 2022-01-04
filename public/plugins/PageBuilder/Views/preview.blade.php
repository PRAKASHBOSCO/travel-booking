@php
    if(!isset($params)){
        $params = [];
        $params['id'] = $data['id'];
        $params['class'] = $data['class'];
        $params['time'] = $data['time'];
        if(!empty($data['fields'])){
            foreach ($data['fields'] as $key => $item){
                if(isset($data[$item['id']]) && !empty($data[$item['id']])){
                   $params[$item['id']] = $data[$item['id']];
                }else{
                    if(isset($item['std'])){
                        $params[$item['id']] = $item['std'];
                        if($item['type'] == 'checkbox'){
                            $params[$item['id']] = explode(',', $params[$item['id']]);
                        }
                    }else{
                        $params[$item['id']] = '';
                    }
                }
            }
        }
    }
@endphp
@if(isset($only_inner))
    {!! $data['class']::inst()->getHTML($params) !!}
@else
    <div id="{{$data['id']. '_' . $data['time']}}">
        <div class="element-remove"><i class="far fa-times"></i></div>
        {!! $data['class']::inst()->getHTML($params) !!}
    </div>
@endif
