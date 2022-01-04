{{--@push('styles')--}}
@foreach($styles as $key => $val)
    @if($val['queue'])
        @php
            $v = '';
            if(!empty($val['v'])){
                $v = '?v=' . $val['v'];
            }
        @endphp
        <link rel="stylesheet" href="{{$val['url'] . $v}}">
    @endif
@endforeach
{{--@endpush--}}
