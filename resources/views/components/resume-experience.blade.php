@props(['experience'])
<li class="ta-s">
    <div>
        <h3 class="mb-0 mt-0">{{ $experience->title }}</h3>
        <span class="font-serif">{{ $experience->company->name }}@if ($experience->city)
                &nbsp;&centerdot;&nbsp;{{ $experience->city }}
            @endif
        </span>
        <p>{{ $experience->description }}</p>
    </div>
    <div class="ta-e">
        <span>
            {{ \Carbon\Carbon::parse($experience->start)->isoFormat('MMM Y') }}<br />
            @if ($experience->end)
                {{ strtolower(__('Until')) }}
                @if ($experience->end > \Carbon\Carbon::now() && $experience->type == 'education')
                    <span class="fst-italic" title="{{ __('Expected') }}">
                        {{ \Carbon\Carbon::parse($experience->end)->isoFormat('MMM Y') }}
                    </span>
                @else
                    {{ \Carbon\Carbon::parse($experience->end)->isoFormat('MMM Y') }}
                @endif
            @else
                {{ strtolower(__('Present')) }}
            @endif
        </span>
    </div>
</li>
