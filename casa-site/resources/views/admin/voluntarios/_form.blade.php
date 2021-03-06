@if ($errors->any())
    <p class="error">Campos com * são obrigatórios!</p>
@endif
<div class="input-field">
    <label for="nome">Nome*</label>
    <input class="{{ $errors->has('name') ? 'error' : '' }}" type="text" name="name" value="{{ isset($registro->name) ? $registro->name : old('name') }}" placeholder="Digite aqui seu nome">
    <p class="error">{{ $errors->first('name') }}</p>
</div>
<div class="input-field">
    <label for="cpf">CPF*</label>
    <input class="{{ $errors->has('cpf') ? 'error' : '' }}" type="text" name="cpf" value="{{ isset($registro->cpf) ? $registro->cpf : old('cpf') }}" placeholder="Digite aqui seu cpf">
    <p class="error">{{ $errors->first('cpf') }}</p> 
</div>
<div class="input-field">
    <label for="profissao">Profissão*</label>
    <input class="{{ $errors->has('profissao') ? 'error' : '' }}" type="text" name="profissao" value="{{ isset($registro->profissao) ? $registro->profissao : old('profissao') }}" placeholder="Digite aqui sua profissão">
    <p class="error">{{ $errors->first('profissao') }}</p>
</div>
<div class="input-field">
    <label for="descricao">Descrição*</label>
    <textarea class="{{ $errors->has('descricao') ? 'error' : '' }}" type="text" name="descricao" placeholder="Descreva você mesmo">{{ isset($registro->descricao) ? $registro->descricao : old('descricao') }}</textarea>
    <p class="error">{{ $errors->first('descricao') }}</p>
</div>
<div class="input-field">
    <label for="foto">Foto do voluntario</label>
    <input class="{{ $errors->has('foto') ? 'error' : '' }}" type="file" name="foto">
    <p class="error">{{ $errors->first('foto') }}</p>
</div>
@if(@isset($registro->foto))
    <div class="input-field">
        <img src="{{ asset($registro->foto) }}" alt="">
    </div>    
@endisset
<div class="input-field">
    <label for="email">Email*</label>
    <input class="{{ $errors->has('email') ? 'error' : '' }}" type="text" name="email" value="{{ isset($registro->email) ? $registro->email : old('email') }}" placeholder="Digite aqui seu email">
    <p class="error">{{ $errors->first('email') }}</p>
</div>
<div class="input-field">
    <label for="telefone">Telefone/Celular</label>
    <input class="{{ $errors->has('telefone') ? 'error' : '' }}" type="text" name="telefone" value="{{ isset($registro->telefone) ? $registro->telefone : old('telefone') }}" placeholder="Digite aqui seu telefone">
    <p class="error">{{ $errors->first('telefone') }}</p>
</div>

@if(!Auth::guest()) <!-- Garantir por validation que essa parte do codigo nao seja enviada sem autenticação -->
<div class="input-field">
    <label for="password">Senha de acesso*</label>
    <input class="{{ $errors->has('password') ? 'error' : '' }}" type="password" name="password" value="" placeholder="Digite aqui sua nova senha de acesso">
    <p class="error">{{ $errors->first('password') }}</p>
</div>
<div class="input-field">
    <label for="password_confirmation">Confirmação de senha de acesso*</label>
    <input class="{{ $errors->has('password_confirmation') ? 'error' : '' }}" type="password" name="password_confirmation" value="" placeholder="Digite a senha novamente para confirmar">
    <p class="error">{{ $errors->first('password_confirmation') }}</p>
</div>
<label class="input-checkbox" for="aprovado">Aprovar esse voluntário da ONG?
    <input type="checkbox" name="aprovado" {{ isset($registro->aprovado) && $registro->aprovado == true ? 'checked' : ''}} value="true">
    <span class="checkmark"></span>
</label>
<label class="input-checkbox" for="admin">Ele deve ser administrador do site?
    <input type="checkbox" name="admin" {{ isset($registro->admin) && $registro->admin == true ? 'checked' : ''}} value="true">
    <span class="checkmark"></span>
</label>
@endif

