@extends('dashboard.layouts.app')


@section('content')
<x-data-table  :dataTable="$dataTable" title="index users" />
    @endsection

