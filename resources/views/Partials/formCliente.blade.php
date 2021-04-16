    @csrf
    <input type="text" name="id" id="id" placeholder="id" value="{{ $cliente->id ?? old('id') }}"> 
    <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $cliente->nome ??old('nome') }}"> 
    <input type="text" name="dtnascimento" id="dtnascimento" placeholder="Data Nascimento" value="{{ $cliente->dtnascimento ??old('dtnascimento') }}"> 
    <button type="submit">Enviar</button>
    