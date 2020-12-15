@extends('layouts.app')

@section('content')

<style>

	*{
		margin: 0;
		padding: 0;
	}

	body{
	}

	.nav_tabs{
		width: 600px;
		height: 450px;
		margin: 100px auto;
		background-color: #fff;
		position: relative;
	}

	.nav_tabs ul{
		list-style: none;
	}

	.nav_tabs ul li{
		float: left;
	}

	.tab_label{
		display: block;
		width: 300px;
		background-color: #363b48;
		padding: 25px;
		font-size: 20px;
		color:#fff;
		cursor: pointer;
		text-align: center;
	}


	.nav_tabs .rd_tab { 
	display:none;
	position: absolute;
}

.nav_tabs .rd_tab:checked ~ label { 
	background-color: #086BAB;
	color:#fff;}

.tab-content{
	border-top: solid 5px #086BAB;
	background-color: #fff;
	display: none;
	position: absolute;
	height: 320px;
	width: 600px;
	left: 0;	
}

.rd_tab:checked ~ .tab-content{
	display: block;
}
.tab-content article{

}
</style>
<nav class="nav_tabs">
			<ul>
				<li>
					<input type="radio" id="aluno" class="rd_tab" name="tabs" checked>
					<label for="aluno" class="tab_label">Aluno</label>
					<div class="tab-content">
						<article>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="curso" class="col-md-4 col-form-label text-md-right">{{ __('Curso') }}</label>
                                        <div class="col-md-6">
                                            <select id="curso">
                                                <option></option>
                                                <option value="edif">Edificações</option>
                                                <option value="info">Informática</option>
                                                <option value="meca">Mecatrônica</option>
                                                <option value="engen">Engenharia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label> 
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label> 
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registre-se') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
						</article>
					</div>
				</li>
				<li>
					<input type="radio" name="tabs" class="rd_tab" id="tab2">
					<label for="tab2" class="tab_label">Professor</label>
					<div class="tab-content">
						<article>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Área de Atuação') }}</label>
                                        <div class="col-md-6">
                                            <input id="area" type="area" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area">
                                            @error('area')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label> 
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label> 
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registre-se') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
						</article>
					</div>

				</li>
			</ul>
		</nav>
@endsection
