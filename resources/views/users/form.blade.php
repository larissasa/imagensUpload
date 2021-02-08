<div class="form-group">
    <label for="nome" class="col-lg-2 control-label">{{ __('Nome') }}</label>
    <div class="col-lg-6">
        <input type="text" name="name" maxlength="191" value="{{ $user->name ?? old('name')  }}" placeholder="{{ __('Nome') }}" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-lg-2 control-label">{{ __('E-mail') }}</label>
    <div class="col-lg-6">
        <input type="text" name="email" maxlength="191" value="{{ $user->email ?? old('email')  }}" placeholder="{{ __('E-mail') }}" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-lg-2 control-label">{{ __('Senha') }}</label>
    <div class="col-lg-6">
        <input type="password" name="password" maxlength="191" value="" placeholder="{{ __('Senha') }}" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="tipo" class="col-lg-2 control-label">{{ __('Perfil') }}</label>
    <div class="col-lg-6">
        <select name="profile" class="form-control">
            <option value="admin" {{$user->profile == 'admin'  ? 'selected' : ''}}>Administrador</option>
            <option value="user" {{$user->profile == 'user'  ? 'selected' : ''}}>Usuário</option>
        </select>
    </div>
</div>

