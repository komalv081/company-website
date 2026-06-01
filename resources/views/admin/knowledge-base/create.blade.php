<h1>Upload Knowledge Document</h1>

<form
    action="/admin/knowledge-base"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <input
        type="text"
        name="title"
        placeholder="Document Title">

    <br><br>

    <input
        type="file"
        name="file">

    <br><br>

    <button type="submit">
        Upload
    </button>

</form>