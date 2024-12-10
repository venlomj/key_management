@if ($errors->any())
    <x-kogeka.alert type="danger">
        <x-kogeka.list>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-kogeka.list>
    </x-kogeka.alert>
@endif
