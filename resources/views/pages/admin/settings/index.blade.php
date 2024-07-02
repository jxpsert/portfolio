@extends('pages.admin.layout')

@section('title', __('Settings'))

@section('content')
    <h1>{{ __('Settings') }}</h1>

    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th>{{ __('settings.key') }}</th>
                <th>{{ __('settings.value') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
                <tr>
                    <td>
                        {{ __('settings.' . $setting->key) }}
                    </td>
                    <td>
                        <input class="form-control bg-light setting" type="text" id="{{ $setting->key }}"
                            name="{{ $setting->key }}" value="{{ $setting->value }}">
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    {{ __('settings.photo') }}
                </td>
                <td>
                    <input class="form-control bg-light setting" accept=".png" type="file" id="photo" name="photo">
                    {{ __('Current') }}: <img src="{{ asset('storage/assets/photo.png') }}" class="setting-image mt-2">
                </td>
            </tr>
        </tbody>
    </table>

    <button id="btn-save" class="btn btn-primary">{{ __('Save') }}</button>

    <script>
        const saveButton = document.querySelector('#btn-save');
        saveButton.addEventListener('click', async () => {
            const settings = document.querySelectorAll('.setting');
            const data = Array.from(settings).reduce((acc, setting) => {
                acc[setting.id] = setting.value;
                return acc;
            }, {});

            const body = new FormData();
            body.append('photo', document.querySelector('#photo').files[0]);
            Object.entries(data).forEach(([key, value]) => {
                body.append(key, value);
            });

            const response = await fetch('{{ route('admin.settings.set') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                body: body
            });

            if (response.ok) {
                saveButton.classList.add('btn-success');
                saveButton.innerText = '{{ __('Saved') }}';

                document.querySelectorAll('.setting-image').forEach(image => {
                    image.src = image.src + '#' + new Date().getTime();
                });

                setTimeout(() => {
                    saveButton.classList.remove('btn-success');
                    saveButton.innerText = '{{ __('Save') }}';
                }, 2000);
            } else {
                alert('{{ __('Error saving settings') }}');
            }
        });
    </script>
@endsection
