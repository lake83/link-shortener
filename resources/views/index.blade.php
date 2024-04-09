@extends('layouts.master')

@section('content')
    <div class="row content">
        <div class="col-md-6">
            <h1>Link shortener</h1>
            <form id="shorten-form" method="post" action="{{url('shorten')}}">
                @csrf
                <div class="form-group">
                    <input type="text" id="original_url" name="original_url" class="form-control @error('original_url') is-invalid @enderror" />
                    
                    @error('original_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            
            <div id="shortened-url" class="mt-5"></div>

        </div>
    </div>
@endsection
