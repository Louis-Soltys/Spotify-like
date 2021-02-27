    <section id='container'>
    <h1>New Song</h1>
    
    @include("partials._errors")
    <form method='post' action="/songs" enctype="multipart/form-data">
        @csrf

        <input type='text' name='titre' placeholder="Le titre" value="{{old('title')}}"/>
        <input type='file' name='song' placeholder="song"/>
        <input type='submit'>
    </form>
    </section>
