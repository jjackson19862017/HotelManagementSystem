<x-admin-master>

    @section('content')
        <ul>
            @forelse ($audits as $audit)
                <li>
                    @lang('article.updated.metadata', $audit->getMetadata())

                    @foreach ($audit->getModified() as $attribute => $modified)
                        <ul>
                            <li>@lang('article.'.$audit->event.'.modified.'.$attribute, $modified) </li>
                        </ul>
                    @endforeach
                </li>
            @empty
                <p>@lang('article.unavailable_audits')</p>
            @endforelse
        </ul>


            @foreach ($hotels as $audit)

            <p>On {{$audit->}}</p>

                    <tr>
                        <td>{{$audit->user->name}}</td>
                        <td>{{$audit->event}}</td>
                        <td>{{$audit->user->name}}</td>
                    </tr>
            @endforeach



    @endsection


</x-admin-master>
