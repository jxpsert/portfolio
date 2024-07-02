@props(['experience'])
<li class="timeline-point {{ $experience->end ? '' : 'current' }}">
    <span>{{ \Carbon\Carbon::parse($experience->start)->isoFormat('MMM Y') }} -
        {{ $experience->end ? \Carbon\Carbon::parse($experience->end)->isoFormat('MMM Y') : strtolower(__('Present')) }}</span>
    <div class="experience-card">
        <div class="row">
            <div class="col-12 col-md-2 my-auto"><a href="{{ $experience->company->url }}" target="_blank"
                    class="image-link" title="naar HC Support"><img alt="Bedrijfslogo"
                        src="{{ asset('storage/assets/logos/' . $experience->company->id . '.png') }}"
                        class="experience-card-logo"></a></div>
            <div class="col"><span class="fs-4 fw-bold">{{ $experience->title }}</span><br><span
                    class="fs-6">{{ $experience->company->name }} ·
                    {{ $experience->city }}, {{ __('countries.' . $experience->country) }}</span>
                <ul class="horizontal fst-italic skills-list">
                    @foreach ($experience->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if ($experience->description)
            <div id="description-job-{{ $experience->id }}" class="description ms-0 ps-0 ms-md-5 ps-md-5"><span
                    onclick="toggleDescription('description-job-{{ $experience->id }}')">{{ __('More information') }}
                    <i class="bi bi-chevron-down"></i></span>
                <p>{{ $experience->description }}</p>
            </div>
        @endif
    </div>
</li>
