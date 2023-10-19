<h1>Se connecter</h1>
 <div class="card">
    <div class="card-body">
        <form action="{{route('auth.login')}}" method="POST" class="vstack gap-3">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                @error('message')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('message')
                    {{$message}}
                @enderror    
            </div>
            <button class="btn btn-primary">Se connecter</button>
        </form>
    </div>
 </div>