@php
    $i = 0;
    $group = [];
@endphp
<div class="nxtra-navigation">
@while(!empty($items[$i]))

    @if($items[$i]['type'] == 'group' && $items[$i]['count']) {{-- group with items --}}
        @php
            $group = $items[$i];
        @endphp
        <h4 class="nxtra-navigation-group ml-8 mb-4 pr-4 text-xs text-70 uppercase tracking-wide relative cursor-default
            @if($items[$i]['collapsible']) hover:text-80 cursor-pointer @endif
            @if($items[$i]['collapsible'] && $items[$i]['collapsed']) collapsed @endif"
            @if($items[$i]['collapsible']) onclick="Nxtra.toggleSibling(this);" @endif
        >
            @isset($items[$i]['icon'])
            <div class="absolute w-5 -ml-8 -mt-1">{!! $items[$i]['icon'] !!}</div>
            @endisset
            {{ $items[$i]['label'] }}
            @if($items[$i]['collapsible'])
                <svg class="expanded absolute pin-r pin-t w-5 -mt-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M5 15l7-7 7 7"></path></svg>
                <svg class="collapsed absolute pin-r pin-t w-5 -mt-1"fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 9l-7 7-7-7"></path></svg>
                @endif
        </h4>

    @elseif(in_array($items[$i]['type'], ['page','link','route']))

        @if(!isset($items[$i-1]) or !in_array($items[$i-1]['type'], ['page','link','route']))
            <ul class="nxtra-navigation-list list-reset mb-8
                @if(!empty($group['collapsible']) && !empty($group['collapsed'])) hidden @endif"
                data-navigation-group="{{ $group['label'] ?? '' }}"
                data-navigation-num="{{ $i }}">
        @endif
                <li class="leading-tight mb-4 ml-8 text-sm">

                    @if($items[$i]['type'] == 'page')
                        <router-link tag="a" :to="{name:'nova-xtra-page', params:{slug:'{{ $items[$i]['slug'] }}'}}" class="text-white text-justify no-underline dim">
                            @if(!empty($items[$i]['icon']))
                                <div class="flex items-start">
                                    <div class="w-4 h-2 mr-1">{!! $items[$i]['icon'] !!}</div>
                                    <div>{!! $items[$i]['label'] !!}</div>
                                </div>
                            @else
                                {!! $items[$i]['label'] !!}
                            @endif
                        </router-link>

                    @elseif($items[$i]['type'] == 'route')
                        <router-link tag="a" :to="{name:'{{ $items[$i]['routeName'] }}', params: {{ json_encode($items[$i]['routeParams']) }} }" class="text-white text-justify no-underline dim">
                            @if(!empty($items[$i]['icon']))
                                <div class="flex items-start">
                                    <div class="w-4 h-2 mr-1">{!! $items[$i]['icon'] !!}</div>
                                    <div>{!! $items[$i]['label'] !!}</div>
                                </div>
                            @else
                                {!! $items[$i]['label'] !!}
                            @endif
                        </router-link>

                    @elseif($items[$i]['type'] == 'link')
                        <a href="{{ $items[$i]['href'] }}" class="text-white text-justify no-underline dim">
                            @if(!empty($items[$i]['icon']))
                                <div class="flex items-start">
                                    <div class="w-4 h-2 mr-1">{!! $items[$i]['icon'] !!}</div>
                                    <div>{!! $items[$i]['label'] !!}</div>
                                </div>
                            @else
                                {!! $items[$i]['label'] !!}
                            @endif
                        </a>
                    @endif
                </li>
        @if(!isset($items[$i+1]) or !in_array($items[$i+1]['type'], ['page','link','route']))
            </ul >
        @endif
    @endif
    @php
        $i++;
    @endphp
@endwhile
</div>
