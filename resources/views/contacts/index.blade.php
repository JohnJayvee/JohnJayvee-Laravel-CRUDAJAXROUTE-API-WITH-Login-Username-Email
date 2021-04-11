@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Contacts</h1>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Job Title</td>
                        <td>City</td>
                        <td>Country</td>
                        <td colspan="3" style="text-align: center;">Action</td>
                        <td hidden></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->job_title }}</td>
                            <td>{{ $contact->city }}</td>
                            <td>{{ $contact->country }}</td>
                            <td white-space: pre;>
                                <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-warning">Show</a>
                            </td>

                            <td>
                                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('contact.destroy', $contact->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            <td hidden></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
            </div>
        @endsection
        <div class="col-sm-12">

            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div>
            <a style="margin: 19px;" href="{{ route('contact.create') }}" class="btn btn-primary">New contact</a>
        </div>
