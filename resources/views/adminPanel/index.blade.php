@extends('layouts.mainLayout')

@section('content')


<button onclick="window.location='/machines'" class="btn btn-primary"> Machines </button>
<button onclick="window.location='/categories'" class="btn btn-primary"> Categories </button>
<button onclick="window.location='/subCategories'" class="btn btn-primary"> SubCategories </button>

<br> <br>

{!! Form::open(['url'=>'/search', 'method'=> 'post' , 'enctype'=> 'multipart/form-data']) !!}

    {!!Form::text('query','',['class'=>'form-control','placeholder'=>'Search','required'=>'required'])!!}


{!! Form::submit('Search',['class'=>'btn btn-success']) !!}

<br><br><br>


@isset($resultMachines)

<h3> Search Results </h3>

    @foreach($resultMachines as $machine)

        <?php

            $picture = App\picture::where('machineID', $machine->id)->first();
        ?>

        <div onclick="window.location.href='/machine/{{$machine->id}}'" style="outline:1px solid black;">
            <img  src="/images/machines/{{$picture->image}}" alt="error Picture missing" width="100" height="100">
            {{$machine->name}}
        </div>

        <br> <br>

    @endforeach

@endisset






@endsection
