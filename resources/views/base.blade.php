@extends('layout')

@include('partials.side-bar')
<main class="relative left-[280px] ">
    @include('partials.nav-bar')
    @yield('section')
</main>

