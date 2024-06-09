@extends('layouts.app')

@section('body')
    <section>
        <div class="container py-5">
            <form action="#" method="POST">
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@merrygroup.com" value="{{ old('email') }}" autocomplete="off" autofocus>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="******">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 d-grid">
                        <button type="submit" class="btn btn-primary rounded-2 text-white">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection