<x-layout-guest pageTitle="Recuperar Senha">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <!-- logo -->
                <div class="text-center mb-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="200px">
                </div>
                <!-- forgot password -->
                <div class="card p-5">
                    @if (!session('status'))
                    <p class="text-danger">Por favor, insira o seu email para recuperar a senha.</p>
                    <p>Para recuperar a sua senha, por favor indique o seu email. Irá receber um email com um link
                        para
                        recuperar a senha.</p>
                    <form action="{{ route('password.email') }}" method="post" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                            <div class=" text-danger">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}">Já sei a minha senha?</a>
                            <button type="submit" class="btn btn-primary px-4">Enviar email</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="text-center p-5">
                    <p class="text-success">Um email foi enviado para o seu endereço de email com um link para recuperar a sua senha.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary px-4">Voltar ao Login</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    </x-layout-app>