<x-app-layout>
    <form action={{  route("films.store")}} method="POST"  id="createform" enctype="multipart/form-data" class="text-white flex flex-col gap-4 w-96 m-auto my-8">
        @csrf
        <input name="title" value="{{ old('title') }}" placeholder="Titulo" class="text-black">
        @error("title")
            <span> PERO TU ERES TONTO O ERES TONTO?
            {{-- <div>{{ $message }}</div> --}}
        @enderror
        <input id="description" name="description" placeholder="Resumen" value="{{ old('resumen') }}" class="text-black">
        <input id="release_year" name="release_year" placeholder="Año de lanzamiento" class="text-black">
        <input id="ticket_price" name="ticket_price" placeholder="Precio" class="text-black">
        <label for="file" class="bg-blue-800 p-4 inline-block rounded-2xl">Elige el video</label>
        <input id="file" type="file" name="videofile" class="hidden" onchange="previewFile()">
        <video id="preview" class="w-64 h-64 hidden" controls></video>

        <select>
            @foreach ($generos as $genero)
                <option id="genero{{$genero->id}}" value={{ $genero->name }} onclick="selectGenero({{$genero->id}}, '{{$genero->name}}')">{{ $genero->name }}</option>
            @endforeach
        </select>

        <div id="generos" class="flex gap-1"></div>

        <hr>
        <input type="submit" value="CREAR LIBRO" class="bg-blue-600 p-4 inline-block rounded-2xl">
    </form>
</x-app-layout>


<script>
    let generosList = [];

    function previewFile(){
        const preview = document.getElementById('preview');
        const file = document.getElementById('file').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function(){
            preview.classList.remove('hidden');
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    let seleccionados = [];

    function selectGenero(id, name) {
    // Verifica si el id ya existe en el array
        if (!seleccionados.includes(id)) {
            seleccionados.push(id);

            var newSpan = document.createElement("span");
            newSpan.innerText = name;
            newSpan.setAttribute('id', "span_genero_"+id);

            var newButton = document.createElement("button");
            newButton.setAttribute('id', id)
            newButton.innerText = "x";
            newSpan.appendChild(newButton);
            newButton.addEventListener("click", function () {
                eliminarGenero(this.id);
            });
            newSpan.classList = "bg-blue-800 p-2 rounded-xl";
            newButton.classList = "bg-red-600 ml-2 p-2 rounded-md";
            generos.appendChild(newSpan);

            const newInput = document.createElement("input");
            newInput.name = "generos[]";
            newInput.value = id;
            newInput.type = "hidden";
            newInput.setAttribute('id', "input_genero_"+id);
            createform.appendChild(newInput);
        }
    }


    function eliminarGenero(id){
        document.querySelector(`#span_genero_${id}`).remove();
        document.querySelector(`#input_genero_${id}`).remove();
        seleccionados = seleccionados.filter((item) => item != id);
    }


</script>
