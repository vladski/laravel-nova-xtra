@php
  $i = 0;
@endphp
@while(!empty($items[$i]))
    @if($items[$i]['type'] == 'group')

        <h4 class="nova-xtra-navigation-group ml-8 mb-4 text-xs text-70 uppercase tracking-wide">
            @isset($items[$i]['icon'])
            <div class="absolute w-5 -ml-8 -mt-1">{!! $items[$i]['icon'] !!}</div>
            @endisset
            {{ $items[$i]['name'] }}
        </h4>

    @elseif(in_array($items[$i]['type'], ['page','link','route']))
        @if(!isset($items[$i-1]) or !in_array($items[$i-1]['type'], ['page','link','route']))
            <ul class="nova-xtra-navigation list-reset mb-8">
        @endif
                <li class="leading-tight mb-4 ml-8 text-sm">

                    @if($items[$i]['type'] == 'page')
                        <router-link tag="a" :to="{name:'nova-xtra-page', params:{slug:'{{ $items[$i]['slug'] }}'}}" class="text-white text-justify no-underline dim">
                            {!! $items[$i]['name'] !!}
                        </router-link>

                    @elseif($items[$i]['type'] == 'route')
                        <router-link tag="a" :to="{name:'{{ $items[$i]['routeName'] }}', params: {{ json_encode($items[$i]['routeParams']) }} }" class="text-white text-justify no-underline dim">
                            {!! $items[$i]['name'] !!}
                        </router-link>

                    @else
                        <a href="{{ $items[$i]['href'] }}" class="text-white text-justify no-underline dim">
                            {!! $items[$i]['name'] !!}
                        </a>
                    @endif
                </li>
        @if(!isset($items[$i+1]) or !in_array($items[$i+1]['type'], ['page','link','route']))
            </ul>
        @endif
    @endif
    @php
        $i++;
    @endphp
@endwhile
