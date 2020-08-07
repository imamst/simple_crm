@extends('layouts.app')

@section('title')
    Add New Agent
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Add New Agent</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content-area br-4">
                    <div class="widget-one">
                        <form class="form-vertical" method="POST" action="{{route('agents.store')}}">
                        @csrf
                        <div class="form">
                            @include('agent.form')
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection