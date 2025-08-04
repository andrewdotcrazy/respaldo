@csrf

<label for="">Title</label>
<input class="form-control" type="text" name="title" value="{{ old('title', $rol->name) }}">


<button type="submit" class="btn btn-success mt-2">Send</button>