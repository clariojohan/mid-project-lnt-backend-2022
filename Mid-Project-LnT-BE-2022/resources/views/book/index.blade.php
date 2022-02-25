@extends('layouts.app') @push('style')
<link
    rel="stylesheet"
    type="text/css"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
/>
@endpush @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('message'))
            <p
                class="btn btn-success btn-block btn-sm custom_message text-left"
            >
                {{ session()->get('message') }}
            </p>
            @endif

            <legend style="color: green; font-weight: bold">
                LARAVEL 7.X CRUD EXAMPLE - CODECHIEF
                <a
                    href="{{ route('book.add') }}"
                    style="
                        float: right;
                        display: block;
                        color: white;
                        background-color: green;
                        padding: 1px 5px 1px 5px;
                        text-decoration: none;
                        border-radius: 5px;
                        font-size: 17px;
                    "
                >
                    ADD BOOK</a
                >
            </legend>

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">Book Title</th>
                        <th class="text-center">Book Author</th>
                        <th class="text-center">Pages</th>
                        <th class="text-center">Year</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr class="text-center">
                        <td class="text-center">{{ $book->bookTitle }}</td>
                        <td class="text-center">{{ $book->bookAuthor }}</td>
                        <td class="text-center">{{ $book->pages }}</td>
                        <td class="text-center">{{ $book->year }}</td>
                        <td class="text-center">
                            <a
                                href="{{ route('book.edit', $book->bookTitle) }}"
                                class="btn btn-sm btn-outline-danger py-0"
                                >Edit</a
                            >
                            <a
                                href="{{ route('book.view', $book->bookTitle) }}"
                                class="btn btn-sm btn-outline-danger py-0"
                                >View</a
                            >
                            <a
                                href=""
                                onclick="if(confirm('Do you want to delete this book?'))event.preventDefault(); document.getElementById('delete-{{$book->bookTitle}}').submit();"
                                class="btn btn-sm btn-outline-danger py-0"
                                >Delete</a
                            >
                            <form
                                id="delete-{{$book->bookTitle}}"
                                method="post"
                                action="{{route('book.delete', $book->bookTitle)}}"
                                style="display: none"
                            >
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <p>No book found!</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
