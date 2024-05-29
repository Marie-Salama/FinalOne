<!-- login.blade.php -->

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">

    @error('email')
        <div>{{ $message }}</div>
    @enderror

    @error('password')
        <div>{{ $message }}</div>
    @enderror
</form>

