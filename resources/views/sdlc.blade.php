@extends('developerguide')

@section('title','SDLC')

@section('content')
    <ul>
        @foreach($steps as $step => $substeps)
            <li>{{$step}} - <ul>
                @foreach($substeps as $substep => $microsteps)
                    @if (is_array($microsteps))
                        <li>{{$substep}} - <ul>
                        @foreach($microsteps as $microstep => $nanosteps)
                            @if (is_array($nanosteps))
                                <li>{{$microstep}} - <ul>
                                @foreach($nanosteps as $nanostep => $atomsteps)
                                    @if (is_array($atomsteps))
                                        <li>{{$nanostep}} - <ul></ul></li>
                                    @else
                                        <li>{{$atomsteps}}</li>
                                    @endif
                                @endforeach
                                </ul>
                            @else
                                <li>{{$nanosteps}}</li>
                            @endif
                        @endforeach
                        </ul>
                    @else
                        <li>{{$microsteps}}</li>
                    @endif
                @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
