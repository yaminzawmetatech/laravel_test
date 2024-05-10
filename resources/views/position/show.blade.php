@extends('layout.layout')

@section('content')

    <h1>
        {{$position->name}}
        {{$position->description}}
        {{$position->department->name}}  
    </h1>


