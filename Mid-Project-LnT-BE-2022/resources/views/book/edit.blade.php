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
                    href="{{ route('book.list') }}"
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
                    BOOK LIST</a
                >
            </legend>

            <form action="{{ route('book.update',$book->slug) }}" method="post">
                @csrf @method('patch')

                <div class="form-group">
                    <label for="">Book Title</label>
                    <input
                        type="text"
                        class="form-control"
                        name="book-title"
                        value="{{ $book->bookTitle }}"
                    />
                    <p style="color: red">
                        {{ $errors->has('bookTitle') ?  $errors->first('bookTitle') : '' }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Book Author</label>
                    <input
                        type="text"
                        class="form-control"
                        name="book-author"
                        value="{{ $book->bookAuthor }}"
                    />
                    <p style="color: red">
                        {{ $errors->has('bookAuthor') ?  $errors->first('bookAuthor') : '' }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Book Pages</label>
                    <input
                        type="text"
                        class="form-control"
                        name="book-pages"
                        value="{{ $book->pages }}"
                    />
                    <p style="color: red">
                        {{ $errors->has('pages') ?  $errors->first('pages') : '' }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Book Year</label>
                    <input
                        type="text"
                        class="form-control"
                        name="book-year"
                        value="{{ $book->publishYear }}"
                    />
                    <p style="color: red">
                        {{ $errors->has('publishYear') ?  $errors->first('publishYear') : '' }}
                    </p>
                </div>

                <div class="form-group" style="margin-top: 24px">
                    <input
                        type="submit"
                        class="btn btn-success"
                        value="Update"
                    />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
