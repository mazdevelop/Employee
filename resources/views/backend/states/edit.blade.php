@extends('layouts.dashboard')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                <div> {{ __('Update') }}</div>
                <a href="{{ route('state.index') }}" class="btn btn-outline-primary">back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('state.update', $state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <select name="country_id" id="country_id" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}" {{ $country->id == $state->country_id ? 'selected' :''}}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$state->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="m-2 p-2">
                <form action="{{ route('state.destroy', $state->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        Delete {{ $state->name }}
                    </button>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
        </div>
    </div>
    
</div>
@endsection